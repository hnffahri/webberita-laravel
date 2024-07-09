
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>@yield('title') · CMS</title>

  @vite(['resources/css/cms.css', 'resources/js/cms.js'])
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	@stack('css')
</head>

<body>
	<div class="wrapper">

		<div class="main">
			<main class="content d-flex align-items-center">
				<div class="container-fluid p-0">
          @yield('content')
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid text-center">
          <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>
				</div>
			</footer>
		</div>
	</div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  @stack('js')

</body>

</html>