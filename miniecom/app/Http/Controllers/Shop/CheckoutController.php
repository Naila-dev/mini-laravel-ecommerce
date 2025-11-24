<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    // Save order to database
    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total'   => $total,
            'status'  => 'pending',
        ]);

        // Save order items
        foreach ($cart as $item) {
            $order->orderItems()->create([
                'product_id' => $item['id'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('orders.show', $order->id)
                         ->with('success', 'Order placed successfully.');
    }
}
