<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BantuanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $startDate = '2024-01-01 00:00:00';
        $endDate = Carbon::now();

        for ($i = 0; $i < 16; $i++) {
            $judul = $faker->sentence;
            $createdAt = $faker->dateTimeBetween($startDate, $endDate);
            $updatedAt = $faker->dateTimeBetween($createdAt, $endDate);
            DB::table('bantuan')->insert([
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'ringkas' => $faker->paragraph,
                'isi' => $faker->text,
                'img' => null,
                'keyword' => implode(', ', $faker->words(3)),
                'status' => '1',
                'views' => $faker->numberBetween(0, 100),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
