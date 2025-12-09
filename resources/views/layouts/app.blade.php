<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Accelerate Lab')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lab-bg text-gray-300 font-sans antialiased selection:bg-lab-neon selection:text-lab-bg">

    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>
