@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4>Tambah Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('produk.store') }}" method="POST">

                @csrf

                @include('produk.form')

            </form>

        </div>

    </div>
@endsection
