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
    

    @include('front/layout/footer')

  
    <script src="{{ asset('assets-front/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets-front/js/jquery-3.5.1.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}
  
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets-front/js/aos.js') }}"></script>
    <script>
      AOS.init();
    </script>
    {{-- <script src="{{ asset('assets-front/js/swiper-bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets-front/js/main.js') }}"></script>
    @stack('js')
  </body>
</html>
