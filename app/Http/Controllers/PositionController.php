<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return response()->json($positions);
    }

    public function show($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }
        return response()->json($position);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_position' => 'required',
        ]);

        $position = Position::create($request->all());

        return response()->json($position, 201);
    }

    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }

        $this->validate($request, [
            'name_of_position' => 'required',
        ]);

        $position->update($request->all());

        return response()->json($position);
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }

        $position->delete();

        return response()->json(['message' => 'Position deleted']);
    }
}
