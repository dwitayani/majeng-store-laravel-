@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <h1>
        Detail Pelanggan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text">
                @if ($pelanggan->foto_diri)
                    <img src="{{ asset('storage/photos/' . $pelanggan->foto_diri) }}" alt="{{ $pelanggan->nama }}" style="max-width: 100px;"
                        class="rounded">
                @else
                    N/A
                @endif
            </p>
            <p class="card-text">NIK: {{ $pelanggan->NIK }}</p>
            <p class="card-text">Alamat: {{ $pelanggan->alamat }}</p>
            <p class="card-text">Telepon: {{ $pelanggan->telepon }}</p>
        </div>
    </div>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
