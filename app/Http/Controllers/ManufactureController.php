<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;

class ManufactureController extends Controller
{
    public function index()
    {
        $manufactures = Manufacture::all();
        return response()->json($manufactures);
    }

    public function show($id)
    {
        $manufacture = Manufacture::find($id);
        if (!$manufacture) {
            return response()->json(['message' => 'Manufacture not found'], 404);
        }
        return response()->json($manufacture);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_manufacture' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        $manufacture = Manufacture::create($request->all());

        return response()->json($manufacture, 201);
    }

    public function update(Request $request, $id)
    {
        $manufacture = Manufacture::find($id);
        if (!$manufacture) {
            return response()->json(['message' => 'Manufacture not found'], 404);
        }

        $this->validate($request, [
            'name_of_manufacture' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        $manufacture->update($request->all());

        return response()->json($manufacture);
    }

    public function destroy($id)
    {
        $manufacture = Manufacture::find($id);
        if (!$manufacture) {
            return response()->json(['message' => 'Manufacture not found'], 404);
        }

        $manufacture->delete();

        return response()->json(['message' => 'Manufacture deleted']);
    }
}
