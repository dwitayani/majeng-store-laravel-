@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <h1>Edit Pelanggan</h1>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}">
        </div>

        <div class="form-group">
            <label for="NIK">NIK:</label>
            <input type="text" class="form-control" id="NIK" name="NIK" value="{{ $pelanggan->NIK }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}">
        </div>

        <div class="form-group">
            <label for="telepon">Telepon:</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $pelanggan->telepon }}">
        </div>
        <div class="form-group">
            <label for="foto_diri">Foto Diri:</label>
            <input type="file" class="form-control" id="foto_diri" name="foto_diri">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
