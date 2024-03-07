@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div style="background: #61876E; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
        <h1 style="color: #f8f5f5; margin-bottom:20px">Daftar Produk</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari...." aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-success" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i>Tambah Produk</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produk as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->namaProduk }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ $p->harga }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>
                        <a href="{{ route('produk.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
