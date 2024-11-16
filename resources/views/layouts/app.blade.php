<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lakhess | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('lakhess-logo.svg') }}" type="image/x-icon">
 
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="antialiased font-inter">
    <div class="min-h-screen bg-bg-primary dark:bg-bg-primary-dark">
      <!-- Sidebar -->
      <x-side-nav />

      <!-- Page Content -->
      <main class="relative pl-[18.5rem]">
        <x-header />
    
        {{ $slot }}

        @if (session('success'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="alert alert-success fixed bottom-4 right-4 flex w-[25rem] items-center rounded-lg border border-green-300 bg-green-100 p-4 text-green-800 shadow-lg dark:border-green-600 dark:bg-green-900 dark:text-green-200"
            role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 stroke-current shrink-0" fill="none"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
          </div>
        @endif
        
        @if (session('removed'))
          <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="alert alert-error fixed bottom-4 right-4 flex w-[25rem] items-center rounded-lg border border-red-300 bg-red-100 p-4 text-red-800 shadow-lg dark:border-red-600 dark:bg-red-900 dark:text-red-200"
            role="alert">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 stroke-current shrink-0" fill="none"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12H9m0 0H7m2 0h10m-2-7h4a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h2m2 0V4a2 2 0 114 0v1m0 0h4" />
            </svg>

            <span>{{ session('removed') }}</span>
          </div>
        @endif

      </main>
    </div>
  </body>

</html>
