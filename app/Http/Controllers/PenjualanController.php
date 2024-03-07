<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::latest()->paginate(5);
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggan', 'produks'));
    }



    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'produk_id' => 'required|exists:produk,id',
            'jml_pesan' => 'required|integer|min:1',
            'totalharga' => 'required|numeric|min:0',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Cek apakah ada entri penjualan dengan pelanggan_id dan tanggal yang sama
            $existingPenjualan = Penjualan::where('tanggal', $request->tanggal)
                ->where('pelanggan_id', $request->pelanggan_id)
                ->first();

            if ($existingPenjualan) {
                // Jika ada, tambahkan totalharga baru ke entri tersebut
                $existingPenjualan->totalharga += $request->totalharga * 1000;
                $existingPenjualan->save();
                $penjualanId = $existingPenjualan->id;
            } else {
                // Jika tidak ada, buat entri baru untuk penjualan
                $penjualan = Penjualan::create([
                    'tanggal' => $request->tanggal,
                    'pelanggan_id' => $request->pelanggan_id,
                    'totalharga' => $request->totalharga * 1000,
                ]);
                $penjualanId = $penjualan->id;
            }

            // Simpan data detail penjualan
            DetailPenjualan::create([
                'penjualan_id' => $penjualanId,
                'produk_id' => $request->produk_id,
                'jumlahproduk' => $request->jml_pesan,
                'subtotal' => $request->totalharga * 1000,
            ]);

            // Kurangi stok produk
            $produk = Produk::find($request->produk_id);
            $produk->stok -= $request->jml_pesan;
            $produk->save();

            // Commit transaksi database
            DB::commit();

            return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan penjualan: ' . $e->getMessage());
        }
    }


    public function show($pelanggan_id)
    {
        // Cari penjualan berdasarkan pelanggan_id
        $penjualan = Penjualan::where('pelanggan_id', $pelanggan_id)->first();

        // Jika penjualan tidak ditemukan, kembalikan not found
        if (!$penjualan) {
            return abort(404);
        }

        // Cari detail penjualan berdasarkan penjualan_id
        $detailPenjualan = DetailPenjualan::where('penjualan_id', $penjualan->id)->get();

        // Tampilkan view detail penjualan
        return view('penjualan.show', compact('penjualan', 'detailPenjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        $pelanggan = Pelanggan::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'tanggal' => 'required',
            'totalharga' => 'required'
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan updated successfully');
    }

    public function destroy($id)
    {
        // Temukan entri penjualan
        $penjualan = Penjualan::findOrFail($id);

        // Hapus entri terkait dari tabel detail_penjualan
        $penjualan->detailPenjualan()->delete();

        // Hapus entri penjualan
        $penjualan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('penjualan.index')->with('success', 'Penjualan dan catatan detail terkait berhasil dihapus.');
    }
}
