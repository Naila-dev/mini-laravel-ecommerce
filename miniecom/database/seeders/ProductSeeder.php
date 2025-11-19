<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Stylish T-Shirt',
                'description' => 'A comfortable and stylish t-shirt made from 100% organic cotton.',
                'price' => 25.99,
                'image' => 'products/tshirt.jpg',
                'is_available' => true,
            ],
            [
                'name' => 'Premium Jeans',
                'description' => 'High-quality denim jeans, perfect for any occasion.',
                'price' => 59.99,
                'image' => 'products/jeans.jpg',
                'is_available' => true,
            ],
            [
                'name' => 'Classic Hat',
                'description' => 'A classic hat to complete your look.',
                'price' => 19.99,
                'image' => 'products/hat.jpg',
                'is_available' => true,
            ],
            [
                'name' => 'Leather Belt',
                'description' => 'A durable and stylish leather belt.',
                'price' => 34.99,
                'image' => 'products/belt.jpg',
                'is_available' => true,
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Lightweight and comfortable running shoes.',
                'price' => 79.99,
                'image' => 'products/shoes.jpg',
                'is_available' => false,
            ],
            [
                'name' => 'Warm Scarf',
                'description' => 'A warm scarf for cold days.',
                'price' => 22.50,
                'image' => 'products/scarf.jpg',
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
