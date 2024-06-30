<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tentang')->insert([
            'logo' => 'logo.png',
            'judul' => 'Transformasi Media Digital: Menyajikan Informasi Terpercaya dan Terbaru untuk Masyarakat Global',
            'tentang_kami' => '<p>Kami adalah perusahaan yang bergerak di bidang teknologi, berkomitmen untuk menyediakan solusi inovatif untuk pelanggan kami. Visi kami adalah menjadi pemimpin pasar dalam industri ini.</p>',
            'alamat' => 'Westminster, London, UK',
            'telephone' => '(00)207-123-1234',
            'email' => 'cs@webberita.com',
            'gmap' => '-7.7031561,108.4916331',
            'img' => 'about.jpg',
            'visi' => '<p>Visi perusahaan adalah menjadi yang terbaik dalam menyediakan berita yang akurat, terpercaya, dan terbaru kepada masyarakat. Kami berkomitmen untuk memberikan informasi yang mendidik, menginspirasi, dan menghibur, dengan tetap menjunjung tinggi nilai-nilai jurnalistik. Dalam lima tahun ke depan, kami bertekad untuk menjadi sumber berita nomor satu di wilayah kami dan diakui secara nasional sebagai media yang berintegritas dan berdedikasi</p>',
            'imgvisi' => 'visi.jpg',
            'misi' => '
            <ol>
                <li>Menghadirkan berita yang objektif dan faktual, dengan proses verifikasi yang ketat untuk memastikan kebenaran informasi.</li>
                <li>Menyediakan platform yang inklusif dan adil bagi semua suara di masyarakat, tanpa memandang latar belakang atau pandangan politik.</li>
                <li>Meningkatkan literasi media di kalangan masyarakat melalui program edukasi dan kerjasama dengan lembaga pendidikan.</li>
                <li>Mengembangkan teknologi dan inovasi dalam penyampaian berita untuk mencapai audiens yang lebih luas dan meningkatkan interaksi dengan pembaca.</li>
                <li>Menciptakan lingkungan kerja yang mendukung perkembangan profesional dan pribadi bagi semua karyawan, dengan menjunjung tinggi etika kerja dan tanggung jawab sosial.</li>
            </ol>
            <p>Dengan misi-misi ini, kami berharap dapat memberikan kontribusi positif bagi masyarakat dan menjadi contoh bagi media lain dalam hal integritas dan dedikasi terhadap kebenaran.</p>
            ',
            'imgmisi' => 'misi.jpg',
        ]);
    }
}
