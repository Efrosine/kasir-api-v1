<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        return response()->json(Product::all());
    }

    // Menampilkan produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        
        return response()->json($product);
    }

    // Menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $product = Product::create($request->all());
        
        return response()->json($product, 201);
    }

    // Mengupdate produk berdasarkan ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'name' => 'string|max:100',
            'description' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
            'category_id' => 'exists:categories,category_id',
        ]);

        $product->update($request->all());

        return response()->json($product);
    }

    // Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
