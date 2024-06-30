<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            [
                'name' => 'Charlie Green',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password123'),
                'biografi' => 'Super Admin of the system.',
                'alamat' => '123 Main St',
                'provinsi' => '1',
                'kota' => '2',
                'avatar' => 'charlie-green.jpg',
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anne Peres',
                'username' => 'adminuser',
                'email' => 'adminuser@example.com',
                'password' => Hash::make('password123'),
                'biografi' => 'Jurnalisme adalah pekerjaan paling mulia, karena di tangan jurnalislah kebenaran ditulis dan disampaikan kepada dunia',
                'alamat' => '456 Secondary St',
                'provinsi' => '1',
                'kota' => '2',
                'avatar' => 'anne-peres.jpg',
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valentin Lacoste',
                'username' => 'adminuser2',
                'email' => 'adminuser2@example.com',
                'password' => Hash::make('password123'),
                'biografi' => 'Berita adalah alat yang ampuh untuk membentuk pikiran dan hati manusia; jurnalis harus menggunakan kekuatan ini dengan bijaksana dan bertanggung jawab.',
                'alamat' => '456 Secondary St',
                'provinsi' => '1',
                'kota' => '2',
                'avatar' => 'valentin_lacoste.jpg',
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
