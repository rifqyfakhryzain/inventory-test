<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar produk',
            'data' => $products,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    public function show(Product $produk)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail produk',
            'data' => $produk,
        ]);
    }

    public function update(Request $request, Product $produk)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk,' . $produk->id,
            'nama_produk' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $produk->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk
        ]);
    }

    public function destroy(Product $produk)
    {
        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}