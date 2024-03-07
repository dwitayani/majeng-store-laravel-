<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama' => 'Pelanggan 1',
            'alamat' => 'Alamat Pelanggan 1',
            'telepon' => '08123456789',
        ]);

        Pelanggan::create([
            'nama' => 'Pelanggan 2',
            'alamat' => 'Alamat Pelanggan 2',
            'telepon' => '08123456788',
        ]);

        Pelanggan::create([
            'nama' => 'Pelanggan 3',
            'alamat' => 'Alamat Pelanggan 3',
            'telepon' => '08123456787',
        ]);

        Pelanggan::create([
            'nama' => 'Pelanggan 4',
            'alamat' => 'Alamat Pelanggan 4',
            'telepon' => '08123456786',
        ]);

        Pelanggan::create([
            'nama' => 'Pelanggan 5',
            'alamat' => 'Alamat Pelanggan 5',
            'telepon' => '08123456785',
        ]);
    }
}
