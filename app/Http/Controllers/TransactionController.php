<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('nama_produk')->get();

        $transactions = Transaction::with('product')
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact(
            'products',
            'transactions'
        ));
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

                return back()
                    ->withErrors([
                        'jumlah' => 'Stok tidak mencukupi.'
                    ])
                    ->withInput();

            }

            $product->stok -= $validated['jumlah'];
        }

        $product->save();

        Transaction::create($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil disimpan.');
    }
}