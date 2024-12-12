<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    // Membuat transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'payment_method' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,product_id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::create([
            'customer_id' => $request->customer_id,
            'transaction_date' => Carbon::now(),
            'payment_method' => $request->payment_method,
            'total_amount' => 0, // Total amount will be calculated later
        ]);

        $totalAmount = 0;
        
        // Insert transaction details and calculate total amount
        foreach ($request->products as $productData) {
            $product = Product::find($productData['product_id']);
            $subTotal = $product->price * $productData['quantity'];

            TransactionDetail::create([
                'transaction_id' => $transaction->transaction_id,
                'product_id' => $product->product_id,
                'quantity' => $productData['quantity'],
                'sub_total' => $subTotal,
            ]);

            $totalAmount += $subTotal;
        }

        // Update the total amount in transaction
        $transaction->update(['total_amount' => $totalAmount]);

        return response()->json($transaction, 201);
    }

    // Memproses pembayaran transaksi
    public function processPayment($id, Request $request)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // Assume the payment is processed here
        $transaction->update([
            'payment_method' => $request->payment_method,
            'transaction_date' => Carbon::now(), // Update payment date
        ]);

        return response()->json(['message' => 'Payment processed successfully', 'transaction' => $transaction]);
    }
}
