<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('halaman')->insert([
            'syarat_ketentuan' => '
            <p>Syarat dan Ketentuan berikut mengatur penggunaan situs web kami.</p>
<h3>1. Penerimaan Syarat</h3>
<p>Dengan mengakses atau menggunakan situs web kami, Anda menyetujui untuk terikat oleh syarat dan ketentuan yang ditetapkan di bawah ini. Jika Anda tidak setuju dengan salah satu syarat ini, harap jangan gunakan situs web kami.</p>
<h3>2. Perubahan Syarat</h3>
<p>Kami berhak untuk mengubah atau memperbarui syarat dan ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Perubahan akan berlaku segera setelah diposting di situs web. Anda bertanggung jawab untuk meninjau syarat dan ketentuan ini secara berkala.</p>
<h3>3. Penggunaan Situs Web</h3>
<p>Anda setuju untuk menggunakan situs web ini hanya untuk tujuan yang sah dan tidak melanggar hak pihak ketiga atau membatasi atau menghalangi penggunaan dan kenikmatan situs web ini oleh pihak ketiga.</p>
<h3>4. Konten</h3>
<p>Semua konten yang disediakan di situs web ini, termasuk teks, grafik, logo, ikon, gambar, dan perangkat lunak, adalah milik [Nama Situs Web] atau penyedia kontennya dan dilindungi oleh undang-undang hak cipta dan hak kekayaan intelektual lainnya. Anda tidak diizinkan untuk menyalin, mendistribusikan, mengirimkan, menampilkan, melakukan, mereproduksi, mempublikasikan, melisensikan, membuat karya turunan dari, mentransfer, atau menjual konten apa pun yang ditemukan di situs web ini tanpa izin tertulis dari kami.</p>
<h3>5. Tautan ke Situs Web Pihak Ketiga</h3>
<p>Situs web ini mungkin berisi tautan ke situs web pihak ketiga yang tidak dimiliki atau dikendalikan oleh [Nama Situs Web]. Kami tidak memiliki kendali atas, dan tidak bertanggung jawab atas, konten, kebijakan privasi, atau praktik situs web pihak ketiga. Anda mengakui dan setuju bahwa kami tidak bertanggung jawab atau berkewajiban, secara langsung atau tidak langsung, atas kerusakan atau kerugian yang disebabkan atau diduga disebabkan oleh atau sehubungan dengan penggunaan atau ketergantungan pada konten, barang, atau layanan yang tersedia di atau melalui situs web pihak ketiga tersebut.</p>
<h3>6. Penafian Jaminan</h3>
<p>Situs web ini disediakan &quot;sebagaimana adanya&quot; dan &quot;sebagaimana tersedia&quot;. Kami tidak memberikan jaminan atau representasi apa pun, baik tersurat maupun tersirat, tentang keakuratan atau kelengkapan konten situs web ini atau konten dari situs web mana pun yang tertaut ke situs web ini. Kami tidak bertanggung jawab atas kesalahan atau kelalaian dalam konten situs web ini.</p>
<h3>7. Batasan Tanggung Jawab</h3>
<p>Dalam keadaan apa pun WebBerita, direkturnya, karyawan, atau agennya tidak akan bertanggung jawab atas kerugian langsung, tidak langsung, insidental, khusus, atau konsekuensial yang timbul dari penggunaan atau ketidakmampuan untuk menggunakan situs web ini atau kontennya.</p>
<h3>8. Hukum yang Berlaku</h3>
<p>Syarat dan ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum yang berlaku di Indonesia, tanpa memperhatikan konflik ketentuan hukum. Anda setuju bahwa setiap sengketa yang timbul dari atau terkait dengan syarat dan ketentuan ini akan diselesaikan di pengadilan.</p>
<h3>9. Kontak</h3>
<p>Jika Anda memiliki pertanyaan tentang syarat dan ketentuan ini, silakan hubungi kami.</p>
            ',
            'kebijakan_privasi' => '
            <p>Kami menghargai privasi Anda dan berkomitmen untuk melindungi informasi pribadi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan membagikan informasi Anda ketika Anda mengunjungi situs web kami.</p>
<h3>1. Informasi yang Kami Kumpulkan</h3>
<p>a. Informasi yang Anda Berikan</p>
<p>Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami ketika Anda menggunakan situs web kami, seperti ketika Anda:</p>
<ul>
	<li>Mendaftar untuk akun.</li>
	<li>Berlangganan newsletter kami.</li>
	<li>Mengisi formulir kontak atau mengirimkan pertanyaan.</li>
	<li>Berpartisipasi dalam survei atau promosi.</li>
</ul>
<p>Informasi ini dapat mencakup nama, alamat email, nomor telepon, dan informasi lain yang Anda pilih untuk diberikan.</p>
<p>b. Informasi yang Kami Kumpulkan Secara Otomatis</p>
<p>Kami secara otomatis mengumpulkan informasi tertentu tentang perangkat yang Anda gunakan untuk mengakses situs web kami, termasuk:</p>
<ul>
	<li>Alamat IP.</li>
	<li>Jenis browser.</li>
	<li>Sistem operasi.</li>
	<li>Halaman yang Anda kunjungi dan waktu yang Anda habiskan di situs web kami.</li>
</ul>
<p>c. Cookie dan Teknologi Pelacakan Lainnya</p>
<p>Kami menggunakan cookie dan teknologi pelacakan lainnya untuk mengumpulkan informasi tentang interaksi Anda dengan situs web kami dan untuk menyimpan preferensi Anda. Anda dapat mengatur browser Anda untuk menolak semua cookie atau untuk memberi tahu Anda ketika cookie sedang dikirim. Namun, jika Anda tidak menerima cookie, beberapa bagian dari situs web kami mungkin tidak berfungsi dengan baik.</p>
<h3>2. Bagaimana Kami Menggunakan Informasi Anda</h3>
<p>Kami menggunakan informasi yang kami kumpulkan untuk berbagai tujuan, termasuk untuk:</p>
<ul>
	<li>Menyediakan, mengoperasikan, dan memelihara situs web kami.</li>
	<li>Memproses dan mengelola pendaftaran Anda.</li>
	<li>Mengirimkan komunikasi yang Anda minta atau yang mungkin menarik bagi Anda.</li>
	<li>Memahami dan menganalisis bagaimana Anda menggunakan situs web kami.</li>
	<li>Menyesuaikan dan meningkatkan situs web kami dan pengalaman pengguna Anda.</li>
	<li>Melindungi situs web kami dan pengguna kami dari aktivitas berbahaya atau ilegal.</li>
</ul>
<h3>3. Bagaimana Kami Membagikan Informasi Anda</h3>
<p>Kami dapat membagikan informasi Anda dalam situasi berikut:</p>
<ul>
	<li><strong>Dengan Penyedia Layanan:</strong> Kami dapat membagikan informasi Anda dengan penyedia layanan pihak ketiga yang membantu kami mengoperasikan situs web kami atau melakukan layanan atas nama kami.</li>
	<li><strong>Untuk Mematuhi Hukum:</strong> Kami dapat membagikan informasi Anda jika kami yakin bahwa pengungkapan tersebut diperlukan untuk mematuhi hukum atau proses hukum yang berlaku, atau untuk melindungi hak, properti, atau keselamatan kami atau orang lain.</li>
	<li><strong>Dalam Kasus Transaksi Bisnis:</strong> Jika kami terlibat dalam merger, akuisisi, atau penjualan aset, informasi Anda dapat dipindahkan sebagai bagian dari transaksi tersebut.</li>
</ul>
<h3>4. Keamanan Informasi Anda</h3>
<p>Kami mengambil langkah-langkah yang wajar untuk melindungi informasi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah. Namun, tidak ada metode transmisi melalui internet atau metode penyimpanan elektronik yang 100% aman, sehingga kami tidak dapat menjamin keamanan mutlak informasi Anda.</p>
<h3>5. Hak Anda</h3>
<p>Anda memiliki hak untuk mengakses, memperbarui, atau menghapus informasi pribadi Anda yang kami miliki. Jika Anda ingin menggunakan hak ini, silakan hubungi kami menggunakan informasi kontak di bawah ini.</p>
<h3>6. Perubahan pada Kebijakan Privasi Ini</h3>
<p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk mencerminkan perubahan pada praktik kami atau untuk alasan operasional, hukum, atau peraturan lainnya. Kami akan memberi tahu Anda tentang perubahan material dengan memposting Kebijakan Privasi yang diperbarui di situs web kami dan mengubah tanggal &quot;Terakhir diperbarui&quot; di bagian atas Kebijakan Privasi ini.</p>
<h3>7. Hubungi Kami</h3>
<p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, silakan hubungi kami</p>
            ',
        ]);
    }
}
