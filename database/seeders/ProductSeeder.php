<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Sample data for products
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description for Product 1',
                'price' => 19.99,
                'stock' => 100,
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 29.99,
                'stock' => 50,
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for Product 3',
                'price' => 39.99,
                'stock' => 75,
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description for Product 4',
                'price' => 49.99,
                'stock' => 20,
            ],
            [
                'name' => 'Product 5',
                'description' => 'Description for Product 5',
                'price' => 59.99,
                'stock' => 10,
            ],
        ];

        // Insert sample data into the products table
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}