<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seo')->insert([
            'judul' => 'Web Berita',
            'deskripsi' => 'Temukan berita terbaru, paling aktual, dan terpercaya hanya di Webberita, sumber informasi terdepan yang menyajikan berita dengan akurasi tinggi dan analisis mendalam.',
            'keyword' => 'news, hot news, viral, berita viral',
        ]);
    }
}
