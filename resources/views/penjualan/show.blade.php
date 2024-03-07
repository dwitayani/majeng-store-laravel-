@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Kembali</a>

                <h1>Detail Penjualan Pelanggan: {{ $penjualan->pelanggan->nama }}</h1>
                <p>Tanggal: {{ \Carbon\Carbon::parse($penjualan->tanggal)->format('d-m-Y') }}</p>
                
                <h3>Detail Pesanan:</h3>
                <a class="btn btn-primary" href="{{ route('penjualan.edit',$penjualan->id) }}">Edit</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailPenjualan as $key => $detail)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $detail->produk->namaProduk }}</td>
                                <td>{{ $detail->jumlahproduk }}</td>
                                <td>{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-right"><h3>Total Harga: Rp. {{ number_format($penjualan->totalharga, 0, ',', '.') }} ,-</h3></p>
            </div>
        </div>
    </div>
@endsection
