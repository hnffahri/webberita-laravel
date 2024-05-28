<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'public/css/main.css', 'resources/js/app.js'])

    {{-- Custom Css
    <link rel="stylesheet" href="{{ url('css/main.css') }}"> --}}
  </head>
  <body>
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="text-center mb-4">
              <h4 class="text-dark">LaravelBreeze_</h4>
            </div>
            <div class="card">
              <div class="card-body">
                {{ $slot }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
