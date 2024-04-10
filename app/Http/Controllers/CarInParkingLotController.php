<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarInParkingLot;

class CarInParkingLotController extends Controller
{
    public function index()
    {
        $carsInParkingLot = CarInParkingLot::all();
        return response()->json($carsInParkingLot);
    }

    public function show($id)
    {
        $carInParkingLot = CarInParkingLot::find($id);
        if (!$carInParkingLot) {
            return response()->json(['message' => 'Car in parking lot not found'], 404);
        }
        return response()->json($carInParkingLot);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'car_id' => 'required',
            'parking_lot_id' => 'required',
        ]);

        $carInParkingLot = CarInParkingLot::create($request->all());

        return response()->json($carInParkingLot, 201);
    }

    public function update(Request $request, $id)
    {
        $carInParkingLot = CarInParkingLot::find($id);
        if (!$carInParkingLot) {
            return response()->json(['message' => 'Car in parking lot not found'], 404);
        }

        $carInParkingLot->update($request->all());

        return response()->json($carInParkingLot);
    }

    public function destroy($id)
    {
        $carInParkingLot = CarInParkingLot::find($id);
        if (!$carInParkingLot) {
            return response()->json(['message' => 'Car in parking lot not found'], 404);
        }

        $carInParkingLot->delete();

        return response()->json(['message' => 'Car in parking lot deleted']);
    }
}
