<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drive;

class DriveController extends Controller
{
    public function index()
    {
        $drives = Drive::all();
        return response()->json($drives);
    }

    public function show($id)
    {
        $drive = Drive::find($id);
        if (!$drive) {
            return response()->json(['message' => 'Drive not found'], 404);
        }
        return response()->json($drive);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_drive' => 'required',
            // Add validation rules for other fields here
        ]);

        $drive = Drive::create($request->all());

        return response()->json($drive, 201);
    }

    public function update(Request $request, $id)
    {
        $drive = Drive::find($id);
        if (!$drive) {
            return response()->json(['message' => 'Drive not found'], 404);
        }

        $drive->update($request->all());

        return response()->json($drive);
    }

    public function destroy($id)
    {
        $drive = Drive::find($id);
        if (!$drive) {
            return response()->json(['message' => 'Drive not found'], 404);
        }

        $drive->delete();

        return response()->json(['message' => 'Drive deleted']);
    }
}
