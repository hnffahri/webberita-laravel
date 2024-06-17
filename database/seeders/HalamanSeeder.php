<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('halaman')->insert([
            'syarat_ketentuan' => 'lorem ipsum is dolor',
            'kebijakan_privasi' => 'lorem ipsum is dolor',
        ]);
    }
}
