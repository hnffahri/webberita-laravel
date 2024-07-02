
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
  @vite(['resources/css/app.css'])
	@stack('css')

</head>

<body>
	<div class="wrapper">
    <main>
      @include('front/layout/navbar')
      @include('front/komponen/_modalcari')
      @include('front/komponen/_offcanvascari')

      @yield('content')
      
    </main>
	</div>

  @include('front/layout/footer')
  
  @vite(['resources/js/app.js'])
  <script src="{{ asset('assets-front/js/jquery-3.6.0.min.js') }}"></script>

  @stack('js')

</body>

</html>