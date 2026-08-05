@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Daftar Produk</h3>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            Tambah Produk
        </a>

    </div>

    <div class="row mb-3">

        <div class="col-md-4">

            <form action="{{ route('products.index') }}" method="GET">

                <div class="input-group">

                    <input type="text" name="search" class="form-control" placeholder="Cari kode / nama produk..."
                        value="{{ $search }}">

                    <button class="btn btn-outline-secondary">
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>
    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Harga</th>
                <th width="170">Aksi</th>
            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>
@endsection
