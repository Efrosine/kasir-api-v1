<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\Product;

class TransactionDetailController extends Controller
{
    // Menambahkan detail transaksi
    public function store($transaction_id, Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find transaction by ID
        $transactionDetail = TransactionDetail::create([
            'transaction_id' => $transaction_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'sub_total' => $this->getProductSubTotal($request->product_id, $request->quantity),
        ]);

        return response()->json($transactionDetail, 201);
    }

    // Helper function to calculate sub-total for the transaction detail
    private function getProductSubTotal($product_id, $quantity)
    {
        $product = Product::find($product_id);
        return $product->price * $quantity;
    }
}
