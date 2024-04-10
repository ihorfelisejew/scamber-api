<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProcessing;

class OrderProcessingController extends Controller
{
    public function index()
    {
        $orders = OrderProcessing::all();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = OrderProcessing::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required',
            'client_last_name' => 'required',
            'client_contacts' => 'required',
            'order_detail' => 'required',
            'acceptance_status' => 'required',
            'execution_status' => 'required',
        ]);

        $order = OrderProcessing::create($request->all());

        return response()->json($order, 201);
    }

    public function update(Request $request, $id)
    {
        $order = OrderProcessing::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $this->validate($request, [
            'client_name' => 'required',
            'client_last_name' => 'required',
            'client_contacts' => 'required',
            'order_detail' => 'required',
            'acceptance_status' => 'required',
            'execution_status' => 'required',
        ]);

        $order->update($request->all());

        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = OrderProcessing::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted']);
    }
}
