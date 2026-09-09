@extends('frontend.components.layout', [
    'title' => 'Mobile App Development (iOS & Android) - Accelerate Lab',
    'description' => 'Native and cross-platform enterprise mobile applications engineered for peak performance and customer retention by Accelerate Lab.'
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
            <span class="text-[#00BFA5]">MOBILE-APP-DEVELOPMENT</span>
        </div>

        <div class="max-w-4xl fade-anim" data-direction="bottom">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-4">
                <span>✦ CROSS-PLATFORM & NATIVE</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                Mobile App Development
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent block">
                    iOS & Android Excellence
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 max-w-3xl">
                {{ $currentLocale === 'id'
                    ? 'Membangun aplikasi mobile kelas enterprise dengan pengalaman visual 60 FPS yang mulus, sinkronisasi data offline, dan arsitektur kode bersih berstandar internasional.'
                    : 'Engineering high-performance enterprise mobile apps with seamless 60 FPS animations, offline-first data persistence, and rigorous international code standards.' }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Konsultasi Aplikasi Mobile' : 'Consult Mobile Specialists' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Kembangkan Ide Aplikasi' : 'Build Your Mobile App' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">Explore Mobile Showcase</span>
                        <span class="text-2">View Live Applications</span>
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-anim" data-direction="bottom">
            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">ENGINEERING</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Unified Cross-Platform Core</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Single unified codebase deploying native compiled arm64 binaries for both Apple App Store and Google Play Store.
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">SYNCHRONIZATION</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Offline-First Architecture</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Local SQLite encrypted databases with background differential synchronizers to ensure reliable field operations without network dropouts.
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">SECURITY</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Hardware Biometrics & Enclave</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    FaceID, TouchID, certificate pinning, and AES-256 encrypted secure keychains to safeguard corporate transactions.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
