<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaction_details')->insert([
            ['transaction_id' => 1, 'product_id' => 1, 'quantity' => 1, 'sub_total' => 250.00],
            ['transaction_id' => 2, 'product_id' => 2, 'quantity' => 1, 'sub_total' => 800.00],
            ['transaction_id' => 3, 'product_id' => 3, 'quantity' => 2, 'sub_total' => 40.00],
            ['transaction_id' => 4, 'product_id' => 5, 'quantity' => 2, 'sub_total' => 120.00],
            ['transaction_id' => 5, 'product_id' => 9, 'quantity' => 1, 'sub_total' => 15.00],
        ]);
    }
}
