<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}</title>
    <meta name="description" content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.' }}">

    {{-- Anti-Flash Theme Pre-Hydration Engine --}}
    <script>
        (function() {
            try {
                var theme = localStorage.getItem('theme');
                if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('schema')
</head>
<body class="min-h-screen flex flex-col bg-[#F8FAFC] dark:bg-[#090D16] text-slate-900 dark:text-white font-sans antialiased selection:bg-[#00BFA5]/20 selection:text-[#00BFA5] transition-colors duration-300">

    {{-- Ambient Canvas Radial Glow --}}
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[550px] pointer-events-none -z-10 overflow-hidden" aria-hidden="true">
        <div class="absolute top-[-150px] left-1/2 -translate-x-1/2 w-[700px] h-[500px] bg-gradient-to-b from-[#00BFA5]/10 via-[#00BFA5]/5 to-transparent blur-[120px] rounded-full"></div>
    </div>

    {{-- Skip to Main Content (Accessibility) --}}
    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- Floating Island Capsule Header --}}
    @include('frontend.components.header')

    {{-- Main Content Slot --}}
    <main id="main-content" class="flex-grow pt-28 md:pt-32 focus:outline-none" tabindex="-1">
        @yield('content')
    </main>

    {{-- Authority Footer --}}
    @include('frontend.components.footer')

    {{-- Floating Global Widgets --}}
    @include('frontend.components.whatsapp-button')
    <x-consultation-modal />

    {{-- Alpine Theme Controller Script --}}
    <script>
        function toggleTheme() {
            var isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>
