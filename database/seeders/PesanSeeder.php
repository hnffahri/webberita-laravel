<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $createdAt = $faker->dateTimeBetween('2024-01-01 00:00:00', '2024-12-31 23:59:59');
            $updatedAt = $faker->dateTimeBetween($createdAt, '2024-12-31 23:59:59');
            DB::table('pesan')->insert([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'judul_pesan' => $faker->sentence,
                'pesan' => $faker->paragraph,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}