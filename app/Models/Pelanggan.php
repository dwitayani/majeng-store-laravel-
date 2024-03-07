<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama','NIK', 'alamat', 'telepon', 'foto_diri'];

    // Jika Pelanggan memiliki relasi dengan Penjualan, tambahkan relasi di sini
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class,'id');
    }
}
