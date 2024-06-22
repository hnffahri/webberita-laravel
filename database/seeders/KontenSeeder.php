<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konten')->insert([
            [
                'admin_id' => 1,
                'kategori_id' => 1,
                'judul' => 'Introduction to Laravel',
                'slug' => 'introduction-to-laravel',
                'ringkas' => 'This is a brief introduction to Laravel framework.',
                'isi' => 'This is the full content of the introduction to Laravel framework.',
                'img' => 'banner1.jpg',
                'vidio' => null,
                'keyword' => 'Laravel, PHP, Framework',
                'status' => '1',
                'views' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => 2,
                'kategori_id' => 2,
                'judul' => 'Healthy Living Tips',
                'slug' => 'healthy-living-tips',
                'ringkas' => 'Brief tips on living a healthy life.',
                'isi' => 'Full content on tips for a healthy living.',
                'img' => 'banner2.jpg',
                'vidio' => null,
                'keyword' => 'Health, Tips, Lifestyle',
                'status' => '1',
                'views' => 200,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
