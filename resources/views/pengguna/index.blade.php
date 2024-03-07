@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <div style="background: #61876E; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
        <h1 style="color: #f8f5f5; margin-bottom:20px">Daftar Pengguna (Khusus Admin)</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="cari...." aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-success" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>

    <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i>Registrasi
        pengguna</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>

                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat</th>
                <th scope="col">Role</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengguna as $p)
                <tr>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->namaLengkap }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->role }}</td>
                    <td>
                        @if ($p->foto_diri)
                            <img src="{{ asset('storage/photos/' . $p->foto_diri) }}" alt="{{ $p->username }}"
                                style="max-width: 50px;" class="rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pengguna.show', $p->id) }}" class="btn btn-info btn-sm"><i
                                class="fa-regular fa-eye"></i></a>
                        <form action="{{ route('pengguna.destroy', $p->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
