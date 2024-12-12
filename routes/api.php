<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 // **CRUD untuk Produk**
 Route::get('/products', [ProductController::class, 'index']); // Menampilkan semua produk
 Route::get('/products/{id}', [ProductController::class, 'show']); // Menampilkan produk berdasarkan ID
 Route::post('/products', [ProductController::class, 'store']); // Menambahkan produk baru
 Route::put('/products/{id}', [ProductController::class, 'update']); // Mengupdate produk berdasarkan ID
 Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Menghapus produk berdasarkan ID

 // **Transaksi dan Memproses Pembayaran**
 Route::post('/transactions', [TransactionController::class, 'store']); // Membuat transaksi baru (untuk kasir memproses pembelian)
 Route::post('/transactions/{id}/pay', [TransactionController::class, 'processPayment']); // Memproses pembayaran transaksi
 Route::post('/transactions/{transaction_id}/details', [TransactionDetailController::class, 'store']); // Menambahkan detail produk pada transaksi
