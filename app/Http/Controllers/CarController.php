<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Manufacturer;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('client.sell-car', compact('manufacturers'));
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
