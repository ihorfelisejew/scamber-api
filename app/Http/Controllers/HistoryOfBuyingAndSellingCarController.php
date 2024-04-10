<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryOfBuyingAndSellingCar;

class HistoryOfBuyingAndSellingCarController extends Controller
{
    public function index()
    {
        $operations = HistoryOfBuyingAndSellingCar::all();
        return response()->json($operations);
    }

    public function show($id)
    {
        $operation = HistoryOfBuyingAndSellingCar::find($id);
        if (!$operation) {
            return response()->json(['message' => 'Operation not found'], 404);
        }
        return response()->json($operation);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // Add validation rules for other fields here
        ]);

        $operation = HistoryOfBuyingAndSellingCar::create($request->all());

        return response()->json($operation, 201);
    }

    public function update(Request $request, $id)
    {
        $operation = HistoryOfBuyingAndSellingCar::find($id);
        if (!$operation) {
            return response()->json(['message' => 'Operation not found'], 404);
        }

        $operation->update($request->all());

        return response()->json($operation);
    }

    public function destroy($id)
    {
        $operation = HistoryOfBuyingAndSellingCar::find($id);
        if (!$operation) {
            return response()->json(['message' => 'Operation not found'], 404);
        }

        $operation->delete();

        return response()->json(['message' => 'Operation deleted']);
    }
}
