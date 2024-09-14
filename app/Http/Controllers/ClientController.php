<?php

namespace App\Http\Controllers;

use App\Models\CarOrder;
use App\Models\City;
use App\Models\Client;
use App\Models\Manufacturer;
use App\Models\TestDrive;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'login' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Пароль невірний']);
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->date_of_birth = $request->date_of_birth;
        $user->passport_number = $request->passport_number;
        $user->date_of_issue = $request->date_of_issue;
        $user->identification_code = $request->identification_code;
        $user->save();

        return back()->with('status', 'Профіль успішно оновлено');
    }

    public function index(Request $request)
    {
        $uniqueCities = City::whereHas('showrooms')->pluck('city_name');
        $activeCity = $request->session()->get('activeCity', $uniqueCities->first());

        if ($activeCity == 'Вся Україна') {
            $activeCity = $uniqueCities->first();
            $request->session()->put('activeCity', $activeCity);
        }

        $cars = $this->getCarsForHomepage($activeCity);
        $manufacturers = $this->getManufacturers();

        return view('home', [
            'uniqueCities' => $uniqueCities,
            'activeCity' => $activeCity,
            'cars' => $cars,
            'manufacturers' => $manufacturers,
        ]);
    }

    public function catalogPage(Request $request, $city = null, $manufactureName = null)
    {
        $request->session()->put('activeCity', 'Вся Україна');
        $uniqueCities = City::whereHas('showrooms')->pluck('city_name');
        $activeCity = $city ?? $request->session()->get('activeCity', "Вся Україна");

        $cars = $this->getAllCars($activeCity, $manufactureName);
        $manufacturers = $this->getManufacturers();

        return view('catalog', [
            'uniqueCities' => $uniqueCities,
            'activeCity' => $activeCity,
            'cars' => $cars,
            'manufacturers' => $manufacturers,
            'selectedManufacturer' => $manufactureName,
        ]);
    }

    public function processCatalogForm($carId)
    {
        $car = Car::findOrFail($carId);

        session()->put('selected_car', $car);

        return redirect()->route('car.details.view', [
            'manufacture_name' => $car->manufacturer->manufacture_name,
            'car_model' => $car->model,
            'year_of_manufacture' => $car->year_of_manufacture,
        ]);
    }

    public function showCarDetail($manufacture_name, $model, $year)
    {
        $uniqueCities = City::whereHas('showrooms')->pluck('city_name');
        $activeCity = $uniqueCities->first();

        $car = session()->get('selected_car');
        if (!$car) {
            abort(404, 'Дані про автомобіль не знайдено');
        }

        return view('car-details', [
            'uniqueCities' => $uniqueCities,
            'activeCity' => $activeCity,
            'car' => $car
        ]);
    }

    public function setCity(Request $request)
    {
        $city = $request->input('city');
        $request->session()->put('activeCity', $city);

        return redirect()->route('home');
    }

    private function getCarsForHomepage($city)
    {
        $query = Car::query();

        if ($city && $city !== 'Вся Україна') {
            $query->whereHas('carsInShowrooms.showroom.city', function ($query) use ($city) {
                $query->where('city_name', $city);
            })->orWhereHas('carsInParkingLots.parkingLot.city', function ($query) use ($city) {
                $query->where('city_name', $city);
            });
        }

        return $query->with('manufacturer')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    }

    private function getAllCars($city, $manufactureName = null)
    {
        $query = Car::query();

        if ($city && $city !== 'Вся Україна') {
            $query->where(function ($query) use ($city) {
                $query->whereHas('carsInShowrooms.showroom.city', function ($query) use ($city) {
                    $query->where('city_name', $city);
                })->orWhereHas('carsInParkingLots.parkingLot.city', function ($query) use ($city) {
                    $query->where('city_name', $city);
                });
            });
        }

        if ($manufactureName) {
            $query->whereHas('manufacturer', function ($query) use ($manufactureName) {
                $query->where('manufacture_name', $manufactureName);
            });
        }

        return $query->with('manufacturer')
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    }

    public function getManufacturers()
    {
        $manufacturers = Manufacturer::all();

        // $users = Worker::all();

        // foreach ($users as $user) {
        //     $user->password = Hash::make($user->password);
        //     $user->save();
        // }
        return $manufacturers;
    }

    public function storeTestDrive(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'date_of_event' => 'required|date_format:Y-m-d',
            'time_of_event' => 'required|date_format:H:i',
            'car_id' => 'required'
        ]);

        $testDrive = new TestDrive();
        $testDrive->client_name = $validatedData['client_name'];
        $testDrive->phone_number = $validatedData['phone_number'];
        $testDrive->date_of_event = Carbon::parse($validatedData['date_of_event'] . ' ' . $validatedData['time_of_event']);
        $testDrive->car_id = $validatedData['car_id'];

        $testDrive->save();
        if ($testDrive) {
            return redirect()->back()->with('success', 'Ваша заявка на тест-драйв успішно відправлена!');
        } else {
            return redirect()->back()->with('error', 'Щось пішло не так. Спробуйте ще раз.');
        }
    }

    public function storeCarOrder(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'date_of_event' => 'required|date_format:Y-m-d',
            'time_of_event' => 'required|date_format:H:i',
            'car_id' => 'required'
        ]);

        $carOrder = new CarOrder();
        $carOrder->client_name = $validatedData['client_name'];
        $carOrder->phone_number = $validatedData['phone_number'];
        $carOrder->date_of_event = Carbon::parse($validatedData['date_of_event'] . ' ' . $validatedData['time_of_event']);
        $carOrder->car_id = $validatedData['car_id'];

        $carOrder->save();
        if ($carOrder) {
            return redirect()->back()->with('success', 'Ваша заявка на тест-драйв успішно відправлена!');
        } else {
            return redirect()->back()->with('error', 'Щось пішло не так. Спробуйте ще раз.');
        }
    }
}
