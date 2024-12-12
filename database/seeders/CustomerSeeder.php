<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            ['first_name' => 'John', 'last_name' => 'Doe', 'phone_number' => '081234567890', 'email' => 'john@example.com'],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'phone_number' => '082345678901', 'email' => 'jane@example.com'],
            ['first_name' => 'Michael', 'last_name' => 'Brown', 'phone_number' => '083456789012', 'email' => 'michael@example.com'],
            ['first_name' => 'Emily', 'last_name' => 'Johnson', 'phone_number' => '084567890123', 'email' => 'emily@example.com'],
            ['first_name' => 'Chris', 'last_name' => 'Davis', 'phone_number' => '085678901234', 'email' => 'chris@example.com'],
        ]);
    }
}
