<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'namaLengkap'=>'Mas Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'alamat'=>'cianjur',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],[
                'namaLengkap'=>'Mas Petugas',
                'username'=>'petugas',
                'email'=>'petugas@gmail.com',
                'alamat'=>'cianjur',
                'role'=>'petugas',
                'password'=>bcrypt('123456')
            ]
        ];

        foreach($userData as $key => $val)
        {
            User::create($val);
        }
    }
}
