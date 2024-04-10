<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarInShowroom;

class CarInShowroomController extends Controller
{
    public function index()
    {
        $carsInShowroom = CarInShowroom::all();
        return response()->json($carsInShowroom);
    }

    public function show($id)
    {
        $carInShowroom = CarInShowroom::find($id);
        if (!$carInShowroom) {
            return response()->json(['message' => 'Car in showroom not found'], 404);
        }
        return response()->json($carInShowroom);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'car_id' => 'required',
            'showroom_id' => 'required',
        ]);

        $carInShowroom = CarInShowroom::create($request->all());

        return response()->json($carInShowroom, 201);
    }

    public function update(Request $request, $id)
    {
        $carInShowroom = CarInShowroom::find($id);
        if (!$carInShowroom) {
            return response()->json(['message' => 'Car in showroom not found'], 404);
        }

        $carInShowroom->update($request->all());

        return response()->json($carInShowroom);
    }

    public function destroy($id)
    {
        $carInShowroom = CarInShowroom::find($id);
        if (!$carInShowroom) {
            return response()->json(['message' => 'Car in showroom not found'], 404);
        }

        $carInShowroom->delete();

        return response()->json(['message' => 'Car in showroom deleted']);
    }
}
