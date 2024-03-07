<!-- resources/views/penjualan/index.blade.php -->

@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">                
                <div style="background: #61876E; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
                    <h1 style="color: #f8f5f5; margin-bottom:20px">Daftar Penjualan</h1>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="cari...." aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                <a href="{{ route('penjualan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>  Tambah Penjualan</a>       
                <table class="table mt-3 table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $key => $penjualan)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $penjualan->pelanggan->nama }}</td>
                                <td>{{ $penjualan->tanggal }}</td>
                                <td>{{ number_format($penjualan->totalharga, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('penjualan.destroy',$penjualan->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('penjualan.show',$penjualan->pelanggan_id) }}">Show</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah akan menghapus data belanja {{ $penjualan->pelanggan->nama }}')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
