<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function show($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        return response()->json($city);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            // Add validation rules for other fields here
        ]);

        $city = City::create($request->all());

        return response()->json($city, 201);
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->update($request->all());

        return response()->json($city);
    }

    public function destroy($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->delete();

        return response()->json(['message' => 'City deleted']);
    }
}
