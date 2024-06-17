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
            'deskripsi' => 'Kami adalah perusahaan yang bergerak di bidang teknologi, berkomitmen untuk menyediakan solusi inovatif untuk pelanggan kami. Visi kami adalah menjadi pemimpin pasar dalam industri ini',
            'keyword' => 'news, hot news, viral, berita viral',
        ]);
    }
}
