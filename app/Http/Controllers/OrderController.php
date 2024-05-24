<?php

namespace App\Http\Controllers;

use App\Models\OrderProcessing;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_last_name' => 'required|string|max:255',
            'client_contacts' => 'required|string|max:255',
            'order_detail' => 'required|string',
            'acceptance_status' => 'nullable|string|max:255',
            'execution_status' => 'nullable|string|max:255',
        ]);

        $order = OrderProcessing::create($validatedData);

        // Повернення результату
        return response()->json(['message' => 'Order processed successfully', 'order' => $order], 201);
    }
}
