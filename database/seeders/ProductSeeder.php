<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description 1',
            'price' => 100,
            'category_id' => 1,
            'user_id' => 2,
            'image' => 'default.jpg',
        ]);
        Product::create([
            'name' => 'Product 2',
            'description' => 'Description 2',
            'price' => 200,
            'category_id' => 2,
            'user_id' => 3,
            'image' => 'default.jpg',
        ]);
        Product::create([
            'name' => 'Product 3',
            'description' => 'Description 3',
            'price' => 300,
            'category_id' => 3,
            'user_id' => 4,
            'image' => 'default.jpg',
        ]);
        Product::create([
            'name' => 'Product 4',
            'description' => 'Description 4',
            'price' => 400,
            'category_id' => 4,
            'user_id' => 5,
            'image' => 'default.jpg',
        ]);

    }
}
