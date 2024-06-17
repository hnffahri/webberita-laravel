<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plugin')->insert([
            'facebook_pixel' => '<script>/* Your Facebook Pixel Code Here */</script>',
            'google_analytics' => '<script>/* Your Google Analytics Code Here */</script>',
        ]);
    }
}
