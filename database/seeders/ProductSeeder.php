<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Smartphone', 'description' => 'Latest Android smartphone', 'price' => 250.00, 'stock' => 50, 'category_id' => 1],
            ['name' => 'Laptop', 'description' => 'High-performance laptop', 'price' => 800.00, 'stock' => 30, 'category_id' => 1],
            ['name' => 'T-shirt', 'description' => 'Cotton T-shirt in various colors', 'price' => 20.00, 'stock' => 100, 'category_id' => 2],
            ['name' => 'Jeans', 'description' => 'Denim jeans for casual wear', 'price' => 40.00, 'stock' => 75, 'category_id' => 2],
            ['name' => 'Blender', 'description' => 'Electric blender for kitchen use', 'price' => 60.00, 'stock' => 40, 'category_id' => 3],
            ['name' => 'Microwave Oven', 'description' => 'Compact microwave oven', 'price' => 100.00, 'stock' => 20, 'category_id' => 3],
            ['name' => 'Rice', 'description' => '1kg pack of organic rice', 'price' => 3.00, 'stock' => 200, 'category_id' => 4],
            ['name' => 'Canned Tuna', 'description' => 'Can of tuna fish', 'price' => 2.50, 'stock' => 150, 'category_id' => 4],
            ['name' => 'Novel', 'description' => 'Bestselling fiction novel', 'price' => 15.00, 'stock' => 80, 'category_id' => 5],
            ['name' => 'Notebook', 'description' => 'Notebook with 200 pages', 'price' => 5.00, 'stock' => 120, 'category_id' => 5],
        ]);
    }
}
