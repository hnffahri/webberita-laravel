<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tentang')->insert([
            'logo' => 'logo.png',
            'tentang_kami' => 'Kami adalah perusahaan yang bergerak di bidang teknologi, berkomitmen untuk menyediakan solusi inovatif untuk pelanggan kami. Visi kami adalah menjadi pemimpin pasar dalam industri ini.',
        ]);
    }
}
