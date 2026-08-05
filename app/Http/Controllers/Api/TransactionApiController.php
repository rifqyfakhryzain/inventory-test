<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionApiController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar transaksi',
            'data' => $transactions,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($validated['jenis'] == 'masuk') {

            $product->stok += $validated['jumlah'];

        } else {

            if ($validated['jumlah'] > $product->stok) {

                return response()->json([
                    'success' => false,
                    'message' => 'Stok tidak mencukupi.'
                ], 422);

            }

            $product->stok -= $validated['jumlah'];
        }

        $product->save();

        $transaction = Transaction::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil disimpan',
            'data' => $transaction
        ], 201);
    }
}