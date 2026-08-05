@extends('layouts.app')

@section('content')
    <div class="text-center">

        <h2 class="mb-4">
            Selamat Datang di Inventory App
        </h2>

        <p class="text-muted mb-5">
            Silakan pilih menu yang ingin dikelola.
        </p>

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4>📦 Produk</h4>

                        <p>Kelola data produk.</p>

                        <a href="{{ route('produk.index') }}" class="btn btn-primary w-100">
                            Kelola Produk
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4>📑 Transaksi</h4>

                        <p>Kelola transaksi stok.</p>

                        <a href="{{ route('transaksi.index') }}" class="btn btn-success w-100">
                            Kelola Transaksi
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
