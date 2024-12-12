<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'description' => 'All electronic devices'],
            ['name' => 'Fashion', 'description' => 'Clothing and accessories'],
            ['name' => 'Home Appliances', 'description' => 'Appliances for home use'],
            ['name' => 'Groceries', 'description' => 'Food and daily necessities'],
            ['name' => 'Books', 'description' => 'Books and stationery'],
        ]);
    }
}
