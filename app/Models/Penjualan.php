<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = ['pelanggan_id', 'tanggal', 'totalharga'];
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class,'pelanggan_id');
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class,'penjualan_id');
    }
}
