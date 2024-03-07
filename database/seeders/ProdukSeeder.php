<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkData = [
            [
                'namaProduk'=>'Baskom',
                'harga'=>'5000',
                'stok'=>'10'
            ],[
                'namaProduk'=>'Panci',
                'harga'=>'15000',
                'stok'=>'10'
            ],[
                'namaProduk'=>'Snak',
                'harga'=>'2000',
                'stok'=>'20'
            ],[
                'namaProduk'=>'Minuman',
                'harga'=>'5000',
                'stok'=>'30'
            ]
        ];

        foreach($produkData as $key => $val)
        {
            Produk::create($val);
        }
    }
}
