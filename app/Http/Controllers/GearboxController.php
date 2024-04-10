<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gearbox;

class GearboxController extends Controller
{
    public function index()
    {
        $gearboxes = Gearbox::all();
        return response()->json($gearboxes);
    }

    public function show($id)
    {
        $gearbox = Gearbox::find($id);
        if (!$gearbox) {
            return response()->json(['message' => 'Gearbox not found'], 404);
        }
        return response()->json($gearbox);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_gearbox' => 'required',
            // Add validation rules for other fields here
        ]);

        $gearbox = Gearbox::create($request->all());

        return response()->json($gearbox, 201);
    }

    public function update(Request $request, $id)
    {
        $gearbox = Gearbox::find($id);
        if (!$gearbox) {
            return response()->json(['message' => 'Gearbox not found'], 404);
        }

        $gearbox->update($request->all());

        return response()->json($gearbox);
    }

    public function destroy($id)
    {
        $gearbox = Gearbox::find($id);
        if (!$gearbox) {
            return response()->json(['message' => 'Gearbox not found'], 404);
        }

        $gearbox->delete();

        return response()->json(['message' => 'Gearbox deleted']);
    }
}
