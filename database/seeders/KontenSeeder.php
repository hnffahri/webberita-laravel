<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class KontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $images = [
            'banner1.jpg',
            'banner2.jpg',
            'banner3.jpg',
            'banner4.jpg',
            'banner5.jpg',
            'banner6.jpg',
            'banner7.jpg',
            'banner8.jpg',
            'banner9.jpg',
            'banner10.jpg',
            'banner11.jpg',
            'banner12.jpg',
            'banner13.jpg',
            'banner14.jpg',
            'banner15.jpg',
            'banner16.jpg',
        ];

        for ($i = 0; $i < 16; $i++) {
            $judul = $faker->sentence;
            $createdAt = $faker->dateTimeBetween('2024-01-01 00:00:00', '2024-12-31 23:59:59');
            $updatedAt = $faker->dateTimeBetween($createdAt, '2024-12-31 23:59:59');
            DB::table('konten')->insert([
                'admin_id' => $faker->numberBetween(1, 2),
                'kategori_id' => $faker->numberBetween(1, 4),
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'ringkas' => $faker->paragraph,
                'isi' => $faker->paragraphs(3, true),
                'img' => $faker->randomElement($images),
                'vidio' => null,
                'keyword' => implode(', ', $faker->words(5)),
                'status' => $faker->randomElement(['1', '2']),
                'views' => $faker->numberBetween(0, 1000),
                'type' => 1,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
