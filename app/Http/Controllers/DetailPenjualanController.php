<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualan,id',
            'produk_id' => 'required|exists:produk,id',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        // Check stok produk tersedia
        $produk = Produk::find($request->produk_id);
        if ($produk->stok < $request->jumlah) {
            return response()->json(['error' => 'Stok produk tidak cukup'], 422);
        }

        // Kurangi stok produk
        $produk->stok -= $request->jumlah;
        $produk->save();

        // Simpan detail penjualan dengan penjualan_id yang diberikan
        $detailPenjualan = new DetailPenjualan;
        $detailPenjualan->penjualan_id = $request->penjualan_id;
        $detailPenjualan->produk_id = $request->produk_id;
        $detailPenjualan->harga = $request->harga;
        $detailPenjualan->jumlah = $request->jumlah;
        $detailPenjualan->subtotal = $request->subtotal;
        $detailPenjualan->save();

        return response()->json(['success' => 'Detail pembelian berhasil disimpan'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPenjualan $detailPenjualan)
    {
        //
    }
}
