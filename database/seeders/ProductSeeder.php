<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'kode_produk' => 'KK001',
                'nama_produk' => 'Kaos Kaki Sekolah',
                'satuan' => 'pcs',
                'stok' => 100,
                'harga' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_produk' => 'KK002',
                'nama_produk' => 'Kaos Kaki Olahraga',
                'satuan' => 'pcs',
                'stok' => 75,
                'harga' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_produk' => 'KK003',
                'nama_produk' => 'Kaos Kaki Anak',
                'satuan' => 'pcs',
                'stok' => 50,
                'harga' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}