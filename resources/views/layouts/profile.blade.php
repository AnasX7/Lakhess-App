<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lakhess | @yield('titel')</title>
    <link rel="shortcut icon" href="assets/lakhess-logo.svg" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="antialiased font-inter">
    <div class="min-h-screen bg-bg-primary dark:bg-bg-primary-dark">
      @include('layouts.navigation')

      <!-- Page Content -->
      <main>
        {{ $slot }}
      </main>
    </div>
  </body>

</html>
