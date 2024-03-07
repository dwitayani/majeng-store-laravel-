@extends('layouts.app')

@section('title', 'Detail pengguna')

@section('content')
    <h1>
        Detail Pengguna</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pengguna->username }}</h5>
            <p class="card-text">
                @if ($pengguna->foto_diri)
                    <img src="{{ asset('storage/photos/' . $pengguna->foto_diri) }}" alt="{{ $pengguna->username }}" style="max-width: 100px;"
                        class="rounded">
                @else
                    N/A
                @endif
            </p>
            <p class="card-text">email: {{ $pengguna->email }}</p>
            <p class="card-text">Nama Lengkap: {{ $pengguna->namaLengkap }}</p>
            <p class="card-text">Role: {{ $pengguna->role }}</p>
        </div>
    </div>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
