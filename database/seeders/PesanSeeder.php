<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $startDate = '2024-01-01 00:00:00';
        $endDate = Carbon::now();

        for ($i = 0; $i < 10; $i++) {
            $createdAt = $faker->dateTimeBetween($startDate, $endDate);
            $updatedAt = $faker->dateTimeBetween($createdAt, $endDate);
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