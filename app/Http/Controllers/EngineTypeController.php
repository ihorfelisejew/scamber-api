<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EngineType;

class EngineTypeController extends Controller
{
    public function index()
    {
        $engineTypes = EngineType::all();
        return response()->json($engineTypes);
    }

    public function show($id)
    {
        $engineType = EngineType::find($id);
        if (!$engineType) {
            return response()->json(['message' => 'Engine type not found'], 404);
        }
        return response()->json($engineType);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type_of_engine' => 'required',
            // Add validation rules for other fields here
        ]);

        $engineType = EngineType::create($request->all());

        return response()->json($engineType, 201);
    }

    public function update(Request $request, $id)
    {
        $engineType = EngineType::find($id);
        if (!$engineType) {
            return response()->json(['message' => 'Engine type not found'], 404);
        }

        $engineType->update($request->all());

        return response()->json($engineType);
    }

    public function destroy($id)
    {
        $engineType = EngineType::find($id);
        if (!$engineType) {
            return response()->json(['message' => 'Engine type not found'], 404);
        }

        $engineType->delete();

        return response()->json(['message' => 'Engine type deleted']);
    }
}
