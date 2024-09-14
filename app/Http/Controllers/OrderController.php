<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function saveOrder(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,manufacturer_id',
            'car_model' => 'required|string|max:255',
            'low_price' => 'required|numeric|min:1500',
            'high_price' => 'required|numeric|min:500000',
            'min_year' => 'required|numeric|min:1954',
            'max_year' => 'required|numeric|max:2024',
            'order_details' => 'nullable|string',
        ]);

        $order = Order::create($validatedData);

        // Опціонально: повернення успішного повідомлення або перенаправлення на іншу сторінку
         return redirect()->back()->with('success', 'Дякуємо за замовлення! Незабаром з вами зв\'яжеться наш менеджер.');
    }
}
