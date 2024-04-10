<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingLot;

class ParkingLotController extends Controller
{
    public function index()
    {
        $parkingLots = ParkingLot::all();
        return response()->json($parkingLots);
    }

    public function show($id)
    {
        $parkingLot = ParkingLot::find($id);
        if (!$parkingLot) {
            return response()->json(['message' => 'Parking lot not found'], 404);
        }
        return response()->json($parkingLot);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'house_number' => 'required',
            'street_id' => 'required',
        ]);

        $parkingLot = ParkingLot::create($request->all());

        return response()->json($parkingLot, 201);
    }

    public function update(Request $request, $id)
    {
        $parkingLot = ParkingLot::find($id);
        if (!$parkingLot) {
            return response()->json(['message' => 'Parking lot not found'], 404);
        }

        $this->validate($request, [
            'house_number' => 'required',
            'street_id' => 'required',
        ]);

        $parkingLot->update($request->all());

        return response()->json($parkingLot);
    }

    public function destroy($id)
    {
        $parkingLot = ParkingLot::find($id);
        if (!$parkingLot) {
            return response()->json(['message' => 'Parking lot not found'], 404);
        }

        $parkingLot->delete();

        return response()->json(['message' => 'Parking lot deleted']);
    }
}
