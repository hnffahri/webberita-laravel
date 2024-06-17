<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sosmed')->insert([
            'facebook' => 'https://facebook.com/webberita',
            'instagram' => 'https://instagram.com/webberita',
            'twitter' => 'https://twitter.com/webberita',
            'tiktok' => 'https://tiktok.com/@webberita',
        ]);
    }
}
