<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BantuanSeeder extends Seeder
{
    public function run()
    {
        DB::table('bantuan')->insert([
            [
                'judul' => 'Panduan Penggunaan Aplikasi',
                'slug' => Str::slug('Panduan Penggunaan Aplikasi'),
                'ringkas' => 'Berikut adalah panduan penggunaan aplikasi kami.',
                'isi' => 'Ini adalah panduan lengkap untuk memahami dan menggunakan aplikasi kami.',
                'img' => null,
                'keyword' => 'panduan, aplikasi, penggunaan',
                'status' => '1',
                'views' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Cara Menghubungi Layanan Pelanggan',
                'slug' => Str::slug('Cara Menghubungi Layanan Pelanggan'),
                'ringkas' => 'Inilah cara mudah menghubungi layanan pelanggan kami.',
                'isi' => 'Kami menyediakan beberapa cara untuk menghubungi layanan pelanggan kami.',
                'img' => null,
                'keyword' => 'layanan pelanggan, kontak, bantuan',
                'status' => '1',
                'views' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
