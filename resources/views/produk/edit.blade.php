@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <h1>Edit Produk</h1>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="namaProduk">Nama Produk:</label>
            <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="{{ $produk->namaProduk }}">
        </div>

        <div class="form-group">
            <label for="harga">Satuan:</label>
            <input type="text" class="form-control" id="satuan" name="harga" value="{{ $produk->satuan }}">
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}">
        </div>

        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection