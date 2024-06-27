@extends('front/layout/templatedashboard')

@section('title', 'Dashboard')

@section('content')


<div class="card card-body">
  <h5 class="text-dark">Selamat Datang di Dashboard Member</h5>
  Selamat datang di dashboard member. Nikmati kemudahan akses berita dan pilih topik yang anda sukai.
</div>
<div class="card mt-4">
  <div class="card-body border-bottom">
    <div class="d-flex justify-content-between align-items-center w-100">
      <h5 class="text-dark m-0">Rimayat Baca</h5>
      <a href="#" class="btn btn-primary">Lihat Semua</a>
    </div>
  </div>
  <div class="">
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Sedih! Seorang Bapak Tidak Ingin Lepaskan Tangan Anaknya Korban lindu Turki
            </h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img
            src="assets/img/blog-sedih-seorang-bapak-tidak-ingin-lepaskan-tangan-anaknya-korban-lindu-turki-75.jpg"
            alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Cari Punya Bisnis Modal Kecil? Casa Dr Hezz Buka Peluang Bisnis Online untuk
              Investor</h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img
            src="assets/img/blog-cari-punya-bisnis-modal-kecil-casa-dr-hezz-buka-peluang-bisnis-online-untuk-investor-93.jpg"
            alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Resep Bika Ambon Enak dan Empuk Anti Gagal</h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img src="assets/img/blog-resep-bika-ambon-enak-dan-empuk-anti-gagal-92.jpg" alt="#"
            class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Untuk Website Undangan Pernikahan Digital Waktu Kini di WebNikah Gratis!
            </h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img
            src="assets/img/blog-untuk-website-undangan-pernikahan-digital-waktu-kini-di-webnikah-gratis-90.jpg"
            alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Gunung Merapi Muntahkan Mega Panas, Waspadai Potensi Bahaya 7 Kilometer</h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img
            src="assets/img/blog-gunung-merapi-muntahkan-mega-panas-waspadai-potensi-bahaya-7-kilometer-89.jpg"
            alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    <div class="card-body border-top">
      <a href="detail.html">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">Profil Lettu Agus Prayogo, Personil TNI yang Raih Medali Emas Maraton SEA
              Games 2023</h6>
            <small>0 Suka · 0 Komentar · 2 Jan</small>
          </div>
          <img
            src="assets/img/blog-profil-lettu-agus-prayogo-personil-tni-yang-raih-medali-emas-maraton-sea-games-2023-103.jpg"
            alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
  </div>
</div>

@endsection

{{-- <x-app-layout>

</x-app-layout> --}}
