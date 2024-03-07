<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaProduk' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');

        // Lakukan validasi stok produk
        $produkErrors = [];
        foreach ($request->id as $key => $id) {
            $jumlah = $request->jumlahproduk[$key];
            $produk = Produk::findOrFail($id);

            if ($jumlah > $produk->stok) {
                $produkErrors[] = $produk->namaProduk . ' (Stok tersedia: ' . $produk->stok . ')';
            }
        }

        // Jika ada error pada validasi stok produk, kembalikan dengan pesan error
        if (!empty($produkErrors)) {
            return redirect()->back()->withErrors(['stok' => implode(', ', $produkErrors) . ' stok kurang.'])->withInput();
        }

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Simpan penjualan
            $penjualan = Penjualan::create([
                'pelanggan_id' => $request->pelanggan_id,
                'tanggal' => $request->tanggal,
                'totalharga' => 0,
            ]);

            // Simpan detail penjualan dan kurangi stok produk
            foreach ($request->produk_id as $key => $produkId) {
                $jumlah = $request->jumlahproduk[$key];
                $produk = Produk::findOrFail($produkId);

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $produkId,
                    'jumlahproduk' => $jumlah,
                    'subtotal' => $produk->harga * $jumlah,
                ]);

                // Kurangi stok produk
                $produk->stok -= $jumlah;
                $produk->save();
            }

            // Commit transaksi database
            DB::commit();

            // Redirect atau kembalikan respons yang sesuai setelah penyimpanan berhasil
            return redirect()->back()->with('success', 'Penjualan berhasil disimpan.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, batalkan transaksi dan kembalikan respons dengan notifikasi
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan penjualan.');
        }
    }


    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
    
    public function getPrice($id)
    {
        $product = Produk::findOrFail($id);
        return $product->harga;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        // Lakukan pencarian produk berdasarkan keyword
        $produk = Produk::where('namaProduk', 'like', '%' . $keyword . '%')->get();

        // Kembalikan data produk dalam bentuk HTML (biasanya dalam bentuk view partial)
        return view('produk.search_result', compact('produk'));
    }
}
