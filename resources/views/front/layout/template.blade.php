
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"> --}}

	<title>@yield('title') · Webberita</title>

  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/assets/fontawesome-pro/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/aos.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/main.css') }}">
	@stack('css')

</head>

<body>
	<div class="wrapper">
    {{-- @include('front/layout/sidebar') --}}

    <main>
      @include('front/layout/navbar')
      @include('front/komponen/_modalcari')
      @include('front/komponen/_offcanvascari')

      @yield('content')
      
      {{-- {{ $slot }} --}}
    </main>
	</div>

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