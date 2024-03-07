<!-- resources/views/penjualan/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Buat Penjualan Baru</h1>

    <form method="POST" action="{{ route('penjualan.store') }}">
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
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="pelanggan_id">Pelanggan:</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        {{-- Pilih Produk --}}
        <div class="form-group">
            <label for="produk_id">Produk:</label>
            <select name="produk_id" id="produk_id" class="form-control">
                <option value="">Pilih Produk</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->namaProduk }} - {{ $produk->stok }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" name="harga" id="harga" class="form-control" readonly>
        </div>
        
        <div class="form-group">
            <label for="jml_pesanan">Jumlah Pemesanan:</label>
            <input type="text" name="jml_pesan" id="jml_pesan" class="form-control" oninput="hitungTotalHarga()">
        </div>
        <div class="form-group">
            <label for="totalharga">Total Harga:</label>
            <input type="text" name="totalharga" id="totalharga" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        // Fungsi untuk menghitung total harga berdasarkan harga produk dan jumlah pesanan
        function hitungTotalHarga() {
            var selectedOption = document.getElementById('produk_id').selectedOptions[0];
            var hargaProduk = selectedOption.getAttribute('data-harga');
            var jumlahPesan = document.getElementById('jml_pesan').value;
            var totalHarga = parseInt(hargaProduk) * parseInt(jumlahPesan);

            // Update nilai input harga dan total harga dengan format rupiah
            document.getElementById('harga').value = formatRupiah(hargaProduk);
            document.getElementById('totalharga').value = formatRupiah(totalHarga.toString());
        }

        // Fungsi untuk format rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var hasil = ribuan.join('.').split('').reverse().join('');
            return hasil;
        }

        // Jalankan fungsi hitungTotalHarga saat memilih produk
        document.getElementById('produk_id').addEventListener('change', function() {
            hitungTotalHarga();
        });

        // Panggil fungsi hitungTotalHarga saat halaman dimuat untuk pertama kali
        hitungTotalHarga();
    </script>
@endsection
