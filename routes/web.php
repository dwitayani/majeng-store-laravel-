<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenggunaController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest'])->group(function (){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
    
});

Route::get('/home', function () {
    return redirect('/dashboard');
});


Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard.index');
    Route::get('/dashboard/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/dashboard/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/logout',[SesiController::class,'logout']);
    

    
    // Pelanggan
    Route::resource('/pelanggan', PelangganController::class);
    // Produk
    Route::resource('/produk', ProdukController::class);
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/getharga/{id}', function ($id) {
        $produk = Produk::findOrFail($id);
        return $produk->harga;
    });

    // Penjualan
    Route::resource('/penjualan', PenjualanController::class);    
    Route::post('/produk/search', [ProdukController::class, 'search'])->name('produk.search');

    //pengguna
    Route::resource('/pengguna', PenggunaController::class)->middleware('userAkses:admin');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // detailPenjualan
    Route::resource('detailpenjualan', DetailPenjualanController::class);    
});

