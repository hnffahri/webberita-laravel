<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tim')->insert([
            [
                'nama' => 'John Doe',
                'posisi' => 'CEO',
                'avatar' => 'john_doe.jpg',
                'facebook' => 'johndoe',
                'instagram' => 'johndoe',
                'xtwitter' => 'johndoe',
                'youtube' => 'johndoe',
            ],
            [
                'nama' => 'Jane Smith',
                'posisi' => 'Project Manager',
                'avatar' => 'jane_smith.jpg',
                'facebook' => 'janesmith',
                'instagram' => 'janesmith',
                'xtwitter' => 'janesmith',
                'youtube' => 'janesmith',
            ],
            [
                'nama' => 'Michael Johnson',
                'posisi' => 'Developer',
                'avatar' => 'michael_johnson.jpg',
                'facebook' => 'michaeljohnson',
                'instagram' => 'michaeljohnson',
                'xtwitter' => 'michaeljohnson',
                'youtube' => 'michaeljohnson',
            ],
            [
                'nama' => 'Emily Davis',
                'posisi' => 'Designer',
                'avatar' => 'emily_davis.jpg',
                'facebook' => 'emilydavis',
                'instagram' => 'emilydavis',
                'xtwitter' => 'emilydavis',
                'youtube' => 'emilydavis',
            ],
            [
                'nama' => 'David Wilson',
                'posisi' => 'Marketing Specialist',
                'avatar' => 'david_wilson.jpg',
                'facebook' => 'davidwilson',
                'instagram' => 'davidwilson',
                'xtwitter' => 'davidwilson',
                'youtube' => 'davidwilson',
            ],
            [
                'nama' => 'Sophia Martinez',
                'posisi' => 'Customer Support',
                'avatar' => 'sophia_martinez.jpg',
                'facebook' => 'sophiamartinez',
                'instagram' => 'sophiamartinez',
                'xtwitter' => 'sophiamartinez',
                'youtube' => 'sophiamartinez',
            ],
            [
                'nama' => 'James Brown',
                'posisi' => 'Quality Assurance (QA)',
                'avatar' => 'james_brown.jpg',
                'facebook' => 'jamesbrown',
                'instagram' => 'jamesbrown',
                'xtwitter' => 'jamesbrown',
                'youtube' => 'jamesbrown',
            ],
            [
                'nama' => 'Olivia Garcia',
                'posisi' => 'Content Writer',
                'avatar' => 'olivia_garcia.jpg',
                'facebook' => 'oliviagarcia',
                'instagram' => 'oliviagarcia',
                'xtwitter' => 'oliviagarcia',
                'youtube' => 'oliviagarcia',
            ],
            [
                'nama' => 'Lucas Lee',
                'posisi' => 'Data Analyst',
                'avatar' => 'lucas_lee.jpg',
                'facebook' => 'lucaslee',
                'instagram' => 'lucaslee',
                'xtwitter' => 'lucaslee',
                'youtube' => 'lucaslee',
            ],
            [
                'nama' => 'Mia Taylor',
                'posisi' => 'Data Analyst',
                'avatar' => 'mia_taylor.jpg',
                'facebook' => 'miataylor',
                'instagram' => 'miataylor',
                'xtwitter' => 'miataylor',
                'youtube' => 'miataylor',
            ],
        ]);
    }
}
