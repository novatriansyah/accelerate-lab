<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $title ?? 'Accelerate Lab' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'software development, digital agency, cloud architecture, ui/ux design, laravel, vue.js, react' }}">
    <meta name="author" content="Accelerate Lab">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}">
    <meta property="twitter:description"
        content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.' }}">
    <meta property="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-sans transition-colors duration-300">
    @include('frontend.components.header')
    <main class="flex-grow">
        @yield('content')
    </main>
    @include('frontend.components.footer')
</body>

</html>
