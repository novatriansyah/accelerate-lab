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
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name="theme-color" content="#00BFA5">
    <link rel="canonical" href="{{ $canonical ?? (rtrim(config('app.url'), '/') . request()->getPathInfo()) }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $canonical ?? (rtrim(config('app.url'), '/') . request()->getPathInfo()) }}">
    <meta property="og:title" content="{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.' }}">
    <meta property="og:image" content="{{ $ogImage ?? (!empty($settings['site_logo'] ?? null) ? ((filter_var($settings['site_logo'], FILTER_VALIDATE_URL)) ? $settings['site_logo'] : asset($settings['site_logo'])) : asset('images/logo.webp')) }}">
    <meta property="og:site_name" content="Accelerate Lab">
    <meta property="og:locale" content="en_US">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $canonical ?? (rtrim(config('app.url'), '/') . request()->getPathInfo()) }}">
    <meta property="twitter:title" content="{{ $title ?? 'Accelerate Lab - Digital Innovation Agency' }}">
    <meta property="twitter:description"
        content="{{ $description ?? 'Accelerate Lab is a premier digital innovation agency specializing in custom software development, cloud architecture, and UI/UX design.' }}">
    <meta property="twitter:image" content="{{ $ogImage ?? (!empty($settings['site_logo'] ?? null) ? ((filter_var($settings['site_logo'], FILTER_VALIDATE_URL)) ? $settings['site_logo'] : asset($settings['site_logo'])) : asset('images/logo.webp')) }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JSON-LD Structured Data (SEO) -->
    <script type="application/ld+json">
    {
        "{{ '@' }}context": "https://schema.org",
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
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
        "sameAs": []
    }
    </script>
    @stack('schema')

    @if (!empty($settings['google_tag_id'] ?? null))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_tag_id'] }}"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '{{ $settings["google_tag_id"] }}');
        </script>
    @endif
</head>

<body
    class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-sans transition-colors duration-300">

    <!-- Skip to content link (accessibility) -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    @include('frontend.components.header')
    <main id="main-content" class="flex-grow" role="main">
        @yield('content')
    </main>
    @include('frontend.components.footer')
    @include('frontend.components.whatsapp-button')
</body>

</html>
