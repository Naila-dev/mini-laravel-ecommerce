<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Stylish T-Shirt',
            'description' => 'A comfortable and stylish t-shirt made from 100% organic cotton.',
            'price' => 25.99,
            'image' => 'images/tshirt.jpg',
            'is_available' => true,
        ]);

        Product::create([
            'name' => 'Premium Jeans',
            'description' => 'High-quality denim jeans, perfect for any occasion.',
            'price' => 59.99,
            'image' => 'images/jeans.jpg',
            'is_available' => true,
        ]);
    }
}