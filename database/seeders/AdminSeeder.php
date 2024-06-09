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
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password123'),
                'biografi' => 'Super Admin of the system.',
                'alamat' => '123 Main St',
                'provinsi' => '1',
                'kota' => '2',
                'avatar' => null,
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'username' => 'adminuser',
                'email' => 'adminuser@example.com',
                'password' => Hash::make('password123'),
                'biografi' => 'Admin user of the system.',
                'alamat' => '456 Secondary St',
                'provinsi' => '1',
                'kota' => '2',
                'avatar' => null,
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
