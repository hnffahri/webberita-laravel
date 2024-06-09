<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') · Webberita</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
  </head>
  <body>
    @include('front/layout/navbar')
    @include('front/komponen/_modalcari')
    @include('front/komponen/_offcanvascari')
    <main class="py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                {{ $slot }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    


    <footer class="py-4 bg-white">
      <div class="container">
        <div class="d-none d-none d-lg-block">
          <div class="row">
            <div class="col-lg-3">Copyright © 2021 ChillNews</div>
            <div class="col-lg-6 text-center">
              <a class="mx-2" href="bantuan.html">Bantuan</a>
              <a class="mx-2" href="tentang.html">Tentang</a>
              <a class="mx-2" href="privasi.html">Kebijakan Privasi</a>
            </div>
            <div class="col-lg-3 text-end">
              <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
              <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
              <a href="#" class="me-3"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="d-lg-none">
          <div class="row">
            <div class="col-lg-6 text-center">
              <a class="mx-2" href="bantuan.html">Bantuan</a>
              <a class="mx-2" href="tentang.html">Tentang</a>
              <a class="mx-2" href="privasi.html">Kebijakan Privasi</a>
            </div>
            <div class="col-lg-3 text-center my-4">
              <a href="#" class="mx-3"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="mx-3"><i class="fab fa-twitter"></i></a>
              <a href="#" class="mx-3"><i class="fab fa-instagram"></i></a>
              <a href="#" class="mx-3"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col-lg-3 text-center">Copyright © 2021 SalingSapaTv</div>
          </div>
        </div>
      </div>
    </footer>

    <script>
      AOS.init();
    </script>
    @stack('js')
  </body>
</html>
