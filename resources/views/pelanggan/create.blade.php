@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <h1>Tambah Pelanggan</h1>

    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required="required">
        </div>
        <div class="form-group">
            <label for="NIK">NIK:</label>
            <input type="text" class="form-control" id="NIK" name="NIK" required="required">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required="required">
        </div>

        <div class="form-group">
            <label for="telepon">Telepon:</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required="required">
        </div>
        <div class="form-group">
            <label for="foto_diri">Foto Diri:</label>
            <input type="file" class="form-control" id="foto_diri" name="foto_diri">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
