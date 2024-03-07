@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <h1>Tambah Produk</h1>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="namaProduk">Nama Produk:</label>
            <input type="text" class="form-control" id="namaProduk" name="namaProduk">
        </div>
        <div class="form-group">
            <label for="satuan">Satuan:</label>
            <input type="text" class="form-control" id="satuan" name="satuan">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga">
        </div>

        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" class="form-control" id="stok" name="stok">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
