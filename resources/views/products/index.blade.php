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

            @forelse ($products as $product)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $product->kode_produk }}</td>

                    <td>{{ $product->nama_produk }}</td>

                    <td>{{ $product->satuan }}</td>

                    <td>{{ $product->stok }}</td>

                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>

                    <td>

                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Data produk belum tersedia.

                    </td>

                </tr>
            @endforelse

        </tbody>

        <div class="d-flex justify-content-end">

            {{ $products->links() }}

        </div>

    </table>
@endsection
