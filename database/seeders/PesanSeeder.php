<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pesan')->insert([
            [
                'nama' => 'Jamal',
                'email' => 'jamal@example.com',
                'judul_pesan' => 'Berikut adalah panduan penggunaan aplikasi kami.',
                'pesan' => 'Ini adalah panduan lengkap untuk memahami dan menggunakan aplikasi kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mikasa',
                'email' => 'mikasa@example.com',
                'judul_pesan' => 'Berikut adalah panduan penggunaan aplikasi kami.',
                'pesan' => 'Ini adalah panduan lengkap untuk memahami dan menggunakan aplikasi kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Eren',
                'email' => 'eren@example.com',
                'judul_pesan' => 'Berikut adalah panduan penggunaan aplikasi kami.',
                'pesan' => 'Ini adalah panduan lengkap untuk memahami dan menggunakan aplikasi kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Levi',
                'email' => 'levi@example.com',
                'judul_pesan' => 'Berikut adalah panduan penggunaan aplikasi kami.',
                'pesan' => 'Ini adalah panduan lengkap untuk memahami dan menggunakan aplikasi kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
