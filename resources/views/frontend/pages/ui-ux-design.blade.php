@extends('frontend.components.layout', [
    'title' => 'UI/UX Product Design & Design Systems - Accelerate Lab',
    'description' => 'User-centric interface design, comprehensive Figma design systems, usability research, and interactive prototyping by Accelerate Lab.'
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
            <span class="text-[#00BFA5]">UI-UX-DESIGN</span>
        </div>

        <div class="max-w-4xl fade-anim" data-direction="bottom">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-4">
                <span>✦ PRODUCT STRATEGY & DESIGN</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                UI/UX Product Design
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent block">
                    & Ergonomic Design Systems
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 max-w-3xl">
                {{ $currentLocale === 'id'
                    ? 'Merancang antarmuka digital yang memikat, intuitif, dan terukur. Kami mentransformasi kompleksitas bisnis menjadi alur pengguna yang anggun dan konversi tinggi.'
                    : 'Crafting captivating, intuitive, and scalable digital interfaces. We turn complex enterprise workflows into elegant user experiences with rigorous usability testing.' }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Konsultasi Desain UI/UX' : 'Consult Design Leads' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Sesi Desain' : 'Start UI/UX Sprint' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">View Design Systems</span>
                        <span class="text-2">Figma & Prototypes</span>
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
                <span class="text-xs font-mono text-[#00BFA5] uppercase">DESIGN SYSTEM</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Modular Token Libraries</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Reusable atomic design tokens across Figma and codebases, enforcing flawless visual harmony across web, tablet, and mobile.
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">USER RESEARCH</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Qualitative Usability Labs</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    In-depth user journey mapping, heat-mapping audit, cognitive load minimization, and accessibility testing (WCAG 2.2 AA).
                </p>
            </div>

            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">MICRO-INTERACTION</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Kinetic Prototyping</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Interactive prototypes with realistic spring physics, micro-state transitions, and ergonomic feedback loops.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
