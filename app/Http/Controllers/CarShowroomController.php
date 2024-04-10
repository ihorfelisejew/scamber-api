<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarShowroom;

class CarShowroomController extends Controller
{
    public function index()
    {
        $carShowrooms = CarShowroom::all();
        return response()->json($carShowrooms);
    }

    public function show($id)
    {
        $carShowroom = CarShowroom::find($id);
        if (!$carShowroom) {
            return response()->json(['message' => 'Car showroom not found'], 404);
        }
        return response()->json($carShowroom);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_showroom' => 'required',
            'showroom_phone_number' => 'required',
            // Add validation rules for other fields here
        ]);

        $carShowroom = CarShowroom::create($request->all());

        return response()->json($carShowroom, 201);
    }

    public function update(Request $request, $id)
    {
        $carShowroom = CarShowroom::find($id);
        if (!$carShowroom) {
            return response()->json(['message' => 'Car showroom not found'], 404);
        }

        $carShowroom->update($request->all());

        return response()->json($carShowroom);
    }

    public function destroy($id)
    {
        $carShowroom = CarShowroom::find($id);
        if (!$carShowroom) {
            return response()->json(['message' => 'Car showroom not found'], 404);
        }

        $carShowroom->delete();

        return response()->json(['message' => 'Car showroom deleted']);
    }
}
