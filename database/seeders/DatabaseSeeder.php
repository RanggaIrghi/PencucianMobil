<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Syabil',
            'email' => 'syabil@wash.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('layanans')->insert([
            [
                'nama_layanan' => 'Cuci Interior',
                'harga' => 10000,
                'deskripsi' => 'Vacuum dan pembersihan dalam',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Cuci Lengkap',
                'harga' => 20000,
                'deskripsi' => 'Luar dalam bersih',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Premium Detailing',
                'harga' => 30000,
                'deskripsi' => 'Waxing dan coating',
                'created_at' => now(), 'updated_at' => now(),
            ]
        ]);
    }
}