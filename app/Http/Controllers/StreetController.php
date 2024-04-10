<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Street;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::all();
        return response()->json($streets);
    }

    public function show($id)
    {
        $street = Street::find($id);
        if (!$street) {
            return response()->json(['message' => 'Street not found'], 404);
        }
        return response()->json($street);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'street_name' => 'required',
            'city_id' => 'required',
        ]);

        $street = Street::create($request->all());

        return response()->json($street, 201);
    }

    public function update(Request $request, $id)
    {
        $street = Street::find($id);
        if (!$street) {
            return response()->json(['message' => 'Street not found'], 404);
        }

        $this->validate($request, [
            'street_name' => 'required',
            'city_id' => 'required',
        ]);

        $street->update($request->all());

        return response()->json($street);
    }

    public function destroy($id)
    {
        $street = Street::find($id);
        if (!$street) {
            return response()->json(['message' => 'Street not found'], 404);
        }

        $street->delete();

        return response()->json(['message' => 'Street deleted']);
    }
}
