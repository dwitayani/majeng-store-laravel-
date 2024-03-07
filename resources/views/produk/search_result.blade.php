<!-- search_result.blade.php -->
@foreach($produk as $p)
<tr>
    <td>{{ $p->namaProduk }}</td>
    <td>{{ $p->harga }}</td>
    <td>{{ $p->stok }}</td>
    <td>
        <!-- Form untuk menambahkan produk ke pembelian -->
        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $p->id }}">
            <button type="submit" class="btn btn-success">Beli</button>
        </form>
    </td>
</tr>
@endforeach
