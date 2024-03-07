@extends('layouts.app')

@section('content')
    <div class="card-header">{{ __('Registrasi') }}</div>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">Username : </label>

            <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password :</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row">
            <label for="namaLengkap" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

            <div class="col-md-6">
                <textarea id="namaLengkap" type="text" class="form-control @error('namaLengkap') is-invalid @enderror" name="namaLengkap"
                    required autocomplete="namaLengkap" autofocus>{{ old('namaLengkap') }}</textarea>

                @error('namaLengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

            <div class="col-md-6">
                <select id="role" name="role" class="form-control">
                    <option value="admin" selected>Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

            <div class="col-md-6">
                <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    required autocomplete="alamat" autofocus>{{ old('alamat') }}</textarea>

                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="foto_diri" class="col-md-4 col-form-label text-md-right">Foto </label>
            <div class="col-md-6">
                <input id="foto_diri" type="file" class="form-control @error('foto_diri') is-invalid @enderror" name="foto_diri">
                
                @error('foto_diri')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection
