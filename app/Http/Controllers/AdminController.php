<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Produk;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalPenjualan = Penjualan::sum('totalharga');
        $totalCustomers = Pelanggan::count();
        $totalProduk = Produk::count();

        return view('dashboard', compact('totalPenjualan', 'totalCustomers', 'totalProduk'));
    }

    public function admin()
    {
        $totalPenjualan = Penjualan::sum('totalharga');
        $totalCustomers = Pelanggan::count();
        $totalProduk = Produk::count();
        return view('dashboard', compact('totalPenjualan', 'totalCustomers', 'totalProduk'));
    }

    public function petugas()
    {
        $totalPenjualan = Penjualan::sum('totalharga');
        $totalCustomers = Pelanggan::count();
        $totalProduk = Produk::count();
        return view('dashboard', compact('totalPenjualan', 'totalCustomers', 'totalProduk'));
    }
}
