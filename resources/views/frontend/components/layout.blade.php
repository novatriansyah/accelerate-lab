<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}</title>
    <meta name="description" content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.' }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'id' ? 'id_ID' : 'en_US' }}">
    <link rel="canonical" href="{{ $canonical ?? (rtrim(config('app.url'), '/') . request()->getPathInfo()) }}">

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

    @if (!empty($settings['google_site_verification'] ?? null))
    <meta name="google-site-verification" content="{{ $settings['google_site_verification'] }}">
    @endif

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JSON-LD Structured Data (SEO) -->
    <script type="application/ld+json">
    {
        "{{ '@' }}context": "https://schema.org",
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
        "legalName": "{{ $settings['legal_name'] ?? 'PT Akselerasi Digital Mandiri' }}",
        "alternateName": [
            "Accelerate Lab",
            "AccelerateLab",
            "{{ $settings['legal_name'] ?? 'PT Akselerasi Digital Mandiri' }}"
        ],
        "url": "{{ config('app.url') }}",
        "logo": "{{ !empty($settings['site_logo'] ?? null) ? ((filter_var($settings['site_logo'], FILTER_VALIDATE_URL)) ? $settings['site_logo'] : asset($settings['site_logo'])) : asset('images/logo.webp') }}",
        "description": "Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.",
        "founder": {
            "{{ '@' }}type": "Person",
            "name": "Nova Triansyah Azis"
        },
        "contactPoint": {
            "{{ '@' }}type": "ContactPoint",
            "contactType": "sales",
            "url": "{{ url('/contact') }}"
        },
        "sameAs": [
            @if (!empty($settings['linkedin_url'] ?? null))
                "{{ $settings['linkedin_url'] }}"
            @endif
        ]
    }
    </script>
    @stack('schema')
</head>
<body class="min-h-screen flex flex-col bg-[#F8FAFC] dark:bg-[#090D16] text-slate-900 dark:text-white font-sans antialiased selection:bg-[#00BFA5]/20 selection:text-[#00BFA5] transition-colors duration-300">

    {{-- Magnetic Cursor DOM --}}
    <div class="cb-cursor" aria-hidden="true">
        <div class="cb-cursor-text"></div>
    </div>

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
