<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyType;

class BodyTypeController extends Controller
{
    public function index()
    {
        $bodyTypes = BodyType::all();
        return response()->json($bodyTypes);
    }

    public function show($id)
    {
        $bodyType = BodyType::find($id);
        if (!$bodyType) {
            return response()->json(['message' => 'BodyType not found'], 404);
        }
        return response()->json($bodyType);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_type' => 'required',
        ]);

        $bodyType = BodyType::create([
            'name_of_type' => $request->name_of_type,
        ]);

        return response()->json($bodyType, 201);
    }

    public function update(Request $request, $id)
    {
        $bodyType = BodyType::find($id);
        if (!$bodyType) {
            return response()->json(['message' => 'BodyType not found'], 404);
        }

        $this->validate($request, [
            'name_of_type' => 'required',
        ]);

        $bodyType->name_of_type = $request->name_of_type;
        $bodyType->save();

        return response()->json($bodyType);
    }

    public function destroy($id)
    {
        $bodyType = BodyType::find($id);
        if (!$bodyType) {
            return response()->json(['message' => 'BodyType not found'], 404);
        }

        $bodyType->delete();

        return response()->json(['message' => 'BodyType deleted']);
    }
}
