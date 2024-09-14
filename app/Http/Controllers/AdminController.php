<?php

namespace App\Http\Controllers;


use App\Models\CarOrder;
use App\Models\Order;
use App\Models\TestDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
        $user->save();

        return back()->with('status', 'Профіль успішно оновлено');
    }

    public function create()
    {

        $testDrives = TestDrive::with('car')
            ->where('status', 'unprocessed')
            ->get();

        $carOrders = CarOrder::with('car')
            ->where('status', 'unprocessed')
            ->get();

        $orders = Order::where('acceptance_status', 0)->get();

        return view('admin.feedback', [
            'testDrives' => $testDrives,
            'carOrders' => $carOrders,
            'orders' => $orders,
        ]);
    }

    public function updateStatusCarOrder(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:submitted,rejected'
        ]);

        $order = CarOrder::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.feedback')->with('status', 'Статус успішно змінено');
    }
    public function updateStatusTestDrive(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:submitted,rejected'
        ]);

        $order = TestDrive::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.feedback')->with('status', 'Статус успішно змінено');
    }

    public function updateOrderAcceptance(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:1,2'
        ]);

        $order = Order::findOrFail($id);
        $order->acceptance_status = $request->status;
        $order->save();

        return redirect()->route('admin.feedback')->with('status', 'Статус успішно змінено');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'manufacturer_id' => 'required|exists:manufacturers,manufacturer_id',
            'model' => 'required|string|max:255',
            'complete_set' => 'required|string|max:255',
            'year_of_manufacture' => 'required|integer',
            'price' => 'required|numeric',
            'car_mileage' => 'required|integer',
            'body_type' => 'required|string|max:255',
            'engine_type' => 'required|string|max:255',
            'engine_capacity' => 'required|numeric',
            'gearbox_type' => 'required|string|max:255',
            'drive_type' => 'required|string|max:255',
            'fuel_consumption' => 'required|numeric',
            'is_accident' => 'required|boolean',
            'VIN_code' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'other_desc' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('cars'), $photoName);
        }

        Car::create([
            'manufacturer_id' => $request->manufacturer_id,
            'model' => $request->model,
            'complete_set' => $request->complete_set,
            'year_of_manufacture' => $request->year_of_manufacture,
            'price' => $request->price,
            'car_mileage' => $request->car_mileage,
            'body_type' => $request->body_type,
            'engine_type' => $request->engine_type,
            'engine_capacity' => $request->engine_capacity,
            'gearbox_type' => $request->gearbox_type,
            'drive_type' => $request->drive_type,
            'fuel_consumption' => $request->fuel_consumption,
            'is_accident' => $request->is_accident,
            'VIN_code' => $request->VIN_code,
            'color' => $request->color,
            'other_desc' => $request->other_desc,
            'photo_url' => $photoName,
            'client_id' => Auth::user()->id, // Оновлено для отримання ID поточного користувача
            'offered_for_sale' => 0,
        ]);

        return redirect()->route('client.sell-car')->with('status', 'Заявка на продаж авто успішно подана!');
    }
}
