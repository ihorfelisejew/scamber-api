<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeOfContract;

class TypeOfContractController extends Controller
{
    public function index()
    {
        $contracts = TypeOfContract::all();
        return response()->json($contracts);
    }

    public function show($id)
    {
        $contract = TypeOfContract::find($id);
        if (!$contract) {
            return response()->json(['message' => 'Contract type not found'], 404);
        }
        return response()->json($contract);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $contract = TypeOfContract::create($request->all());

        return response()->json($contract, 201);
    }

    public function update(Request $request, $id)
    {
        $contract = TypeOfContract::find($id);
        if (!$contract) {
            return response()->json(['message' => 'Contract type not found'], 404);
        }

        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $contract->update($request->all());

        return response()->json($contract);
    }

    public function destroy($id)
    {
        $contract = TypeOfContract::find($id);
        if (!$contract) {
            return response()->json(['message' => 'Contract type not found'], 404);
        }

        $contract->delete();

        return response()->json(['message' => 'Contract type deleted']);
    }
}
