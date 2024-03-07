@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <h1>Detail Produk</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->namaProduk }}</h5>
            <p class="card-text">Satuan: {{ $produk->satuan }}</p>
            <p class="card-text">Harga: {{ $produk->harga }}</p>
            <p class="card-text">Stok: {{ $produk->stok }}</p>
        </div>
    </div>

    <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
