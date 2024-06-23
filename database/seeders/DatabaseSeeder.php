<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(HalamanSeeder::class);
        $this->call(SosmedSeeder::class);
        $this->call(TentangSeeder::class);
        $this->call(PluginSeeder::class);
        $this->call(SeoSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(BantuanSeeder::class);
        $this->call(KontenSeeder::class);
        $this->call(PesanSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
