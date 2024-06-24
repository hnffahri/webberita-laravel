<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BantuanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 16; $i++) {
            $judul = $faker->sentence;
            DB::table('bantuan')->insert([
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'ringkas' => $faker->paragraph,
                'isi' => $faker->text,
                'img' => null,
                'keyword' => implode(', ', $faker->words(3)),
                'status' => '1',
                'views' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
