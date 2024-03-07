@extends('layouts.app')

@section('content')

                <h1>Edit Penjualan</h1>
                <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pelanggan_id">Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}" {{ $penjualan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $penjualan->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="totalharga">Total Harga</label>
                        <input type="text" name="totalharga" id="totalharga" class="form-control" value="{{ $penjualan->totalharga }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </form>

@endsection
