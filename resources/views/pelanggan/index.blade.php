@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
    <div style="background: #61876E; padding: 20px; border-radius: 10px; text-align: center; margin-bottom: 40px;">
        <h1 style="color: #f8f5f5; margin-bottom:20px">Daftar Pelanggan</h1>
        <div class="input-group mb-3">
            <input id="searchInput" type="text" class="form-control" placeholder="Cari pelanggan..." aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="searchButton" class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Pelanggan</a>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="searchResult">
            @forelse ($pelanggan as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->NIK }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->telepon }}</td>
                    <td>
                        @if ($p->foto_diri)
                            <img src="{{ asset('storage/photos/' .$p->foto_diri) }}" alt="{{ $p->nama }}" style="max-width: 50px;" class="rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var searchValue = $('#searchInput').val().toLowerCase().trim();
                var rows = $('#searchResult tr');

                rows.each(function() {
                    var nama = $(this).find('td:eq(0)').text().toLowerCase();
                    var NIK = $(this).find('td:eq(1)').text().toLowerCase();
                    var alamat = $(this).find('td:eq(2)').text().toLowerCase();
                    var telepon = $(this).find('td:eq(3)').text().toLowerCase();

                    if (nama.includes(searchValue) || NIK.includes(searchValue) || alamat.includes(searchValue) || telepon.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

    </script>
@endpush
