
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="@yield('deskripsi', $seo->deskripsi)">
  <meta name="author" content="@yield('author', 'WebBerita')">
  <meta name="keywords" content="@yield('keywords', $seo->keyword)">

	<title>@yield('title') · {{ $seo->judul }}</title>

  
  <!-- Bootstrap CSS -->
  @vite(['resources/css/template.css'])
	@stack('css')

</head>

<body>
	<div class="wrapper">
    <main>
      @include('front/layout/navbar')
      @include('front/komponen/_modalcari')
      @include('front/komponen/_offcanvascari')

      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            @include('front/layout/sidebar')
            <div class="col-lg-9">
              @yield('content')
            </div>
          </div>
        </div>
      </section>
      
    </main>
	</div>

  @include('front/layout/footer')
  
  @vite(['resources/js/template.js'])
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- <script src="{{ asset('assets-front/js/jquery-3.6.0.min.js') }}"></script> --}}

  @stack('js')

  {{-- 
  {{ $plugin->google_analytics }}
  {{ $plugin->facebook_pixel }}
  --}}

</body>

</html>