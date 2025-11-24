<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Show only the logged-in user's orders
        $orders = Order::where('user_id', Auth::id())
                       ->orderByDesc('id')
                       ->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)
                      ->where('user_id', Auth::id()) // prevents viewing other users' orders
                      ->firstOrFail();

        return view('orders.show', compact('order'));
    }
}
