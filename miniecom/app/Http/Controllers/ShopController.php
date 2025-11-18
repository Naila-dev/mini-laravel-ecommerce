<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show all available products
    public function index()
    {
        $products = Product::where('is_available', true)->get();

        return view('shop.index', compact('products'));
    }

    // Show single product
    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}

