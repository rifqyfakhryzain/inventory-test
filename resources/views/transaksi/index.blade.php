@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">
                    <h5>Input Transaksi</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('transaksi.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Produk</label>

                            <select name="product_id" class="form-select @error('product_id') is-invalid @enderror">

                                <option value="">-- Pilih Produk --</option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>

                                        {{ $product->kode_produk }} - {{ $product->nama_produk }}

                                    </option>
                                @endforeach

                            </select>

                            @error('product_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Jenis</label>

                            <select name="jenis" class="form-select @error('jenis') is-invalid @enderror">

                                <option value="">-- Pilih Jenis --</option>

                                <option value="masuk">Stok Masuk</option>

                                <option value="keluar">Stok Keluar</option>

                            </select>

                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Jumlah</label>

                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}">

                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Tanggal</label>

                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', date('Y-m-d')) }}">

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Keterangan</label>

                            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>

                        </div>

                        <button class="btn btn-primary w-100">

                            Simpan Transaksi

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h5>Daftar Transaksi</h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">

                        <thead class="table-dark">
                            <tr>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($transactions as $transaction)
                                <tr>

                                    <td>{{ $transaction->tanggal }}</td>

                                    <td>{{ $transaction->product->nama_produk }}</td>

                                    <td>
                                        @if ($transaction->jenis == 'masuk')
                                            <span class="badge bg-success">
                                                Masuk
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Keluar
                                            </span>
                                        @endif
                                    </td>

                                    <td>{{ $transaction->jumlah }}</td>

                                    <td>{{ $transaction->keterangan }}</td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        Belum ada transaksi.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                    <div class="mt-3">
                        {{ $transactions->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
