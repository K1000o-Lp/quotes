<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title', 'System')</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Vite -->
    @vite(['packages/camilo/quotes/src/resources/js/app.js', 'packages/camilo/quotes/src/resources/css/app.css'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Include navbar partial -->
    @include('quotes::partials.navbar')
    
    <div class="container mx-auto px-4 py-8">
        <!-- Main Content -->
        <main class="bg-white rounded-lg shadow-md p-6">
            @yield('content')
        </main>
    </div>
    
    <footer class="mt-8 py-4 text-center text-gray-600 text-sm">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>
    
    <!-- Scripts -->
    @stack('scripts')
</body>
</html>