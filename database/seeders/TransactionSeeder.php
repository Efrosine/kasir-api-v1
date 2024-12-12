<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            ['customer_id' => 1, 'transaction_date' => Carbon::now(), 'total_amount' => 250.00, 'payment_method' => 'Cash'],
            ['customer_id' => 2, 'transaction_date' => Carbon::now()->subDays(1), 'total_amount' => 820.00, 'payment_method' => 'Credit Card'],
            ['customer_id' => 3, 'transaction_date' => Carbon::now()->subDays(2), 'total_amount' => 40.00, 'payment_method' => 'Debit Card'],
            ['customer_id' => 4, 'transaction_date' => Carbon::now()->subDays(3), 'total_amount' => 165.00, 'payment_method' => 'Cash'],
            ['customer_id' => 5, 'transaction_date' => Carbon::now()->subDays(4), 'total_amount' => 25.00, 'payment_method' => 'Bank Transfer'],
        ]);
    }
}
