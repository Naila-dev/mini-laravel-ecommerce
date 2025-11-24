<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('total');

        return view('admin.dashboard', compact('productCount', 'orderCount', 'totalRevenue'));
    }
}
