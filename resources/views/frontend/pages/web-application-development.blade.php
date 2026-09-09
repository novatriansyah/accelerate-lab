@extends('frontend.components.layout', [
    'title' => 'Web Application Development - Accelerate Lab',
    'description' => 'Custom enterprise web applications, operational portals, API ecosystems, and scalable platforms built by Accelerate Lab.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     HERO SECTION (Accelerate Studio Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumbs --}}
        <div class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#00BFA5]">HOME</a>
            <span>/</span>
            <a href="{{ route('services') }}" class="hover:text-[#00BFA5]">SERVICES</a>
            <span>/</span>
            <span class="text-[#00BFA5]">WEB-APPLICATION-DEVELOPMENT</span>
        </div>

        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-4">
                <span>✦ FULL-STACK SOFTWARE ENGINEERING</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                Web Application
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent block">
                    Engineering for Enterprises
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 max-w-3xl">
                {{ $currentLocale === 'id'
                    ? 'Membangun aplikasi web tangguh dan portal operasional yang cepat, aman, dan siap menangani jutaan transaksi bersama tim rekayasa senior kami.'
                    : 'Engineering robust web applications, operational portals, and mission-critical SaaS platforms that execute with blistering speed and bank-grade security.' }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Konsultasi Web Aplikasi' : 'Discuss Web Architecture' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Bersama Kami' : 'Build Custom Solution' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">Explore Web Case Studies</span>
                        <span class="text-2">View Live Projects</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================
     BLUEPRINT BENTO GRID (Accelerate Architecture Container)
     ======================================================================== --}}
<section class="py-16 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">MODERN MONOLITH</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">High-Throughput Application Core</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Zero-bloat modular architecture with optimized Eloquent ORM, background queues, and sub-50ms server response latency.
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">API ECOSYSTEM</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">RESTful & GraphQL Gateways</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Secure JWT authentication, rate-limiting algorithms, schema-validated request pipelines, and comprehensive OpenAPI specs.
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">DATA PLATFORM</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Relational Integrity & Caching</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Strict MySQL / PostgreSQL schema design, Redis multi-layer caching, and automated replication for enterprise durability.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
