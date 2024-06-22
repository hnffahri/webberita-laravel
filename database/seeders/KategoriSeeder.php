<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama' => 'Teknologi',
                'slug' => Str::slug('Teknologi'),
                'warna' => '#ff5733',
            ],
            [
                'nama' => 'Pendidikan',
                'slug' => Str::slug('Pendidikan'),
                'warna' => '#33ff57',
            ],
            [
                'nama' => 'Kesehatan',
                'slug' => Str::slug('Kesehatan'),
                'warna' => '#3357ff',
            ],
            [
                'nama' => 'Olahraga',
                'slug' => Str::slug('Olahraga'),
                'warna' => '#ff33aa',
            ],
        ]);
    }
}
