<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    public function show($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->update($request->all());

        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted']);
    }
}
