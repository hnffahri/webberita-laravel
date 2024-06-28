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
            'facebook' => 'webberita',
            'instagram' => 'webberita',
            'twitter' => 'webberita',
            'tiktok' => 'webberita',
            'youtube' => 'webberita',
        ]);
    }
}
