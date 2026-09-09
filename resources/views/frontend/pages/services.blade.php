@extends('frontend.components.layout', [
    'title' => $title ?? 'Capabilities & Technical Services - Accelerate Lab',
    'description' => $description ?? 'Explore Accelerate Lab\'s software engineering, cloud architecture, and product design capabilities.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     SERVICES HERO (Accelerate Studio Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-6">
                <span>✦ CAPABILITIES & SPECIALIZATIONS</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                {{ $currentLocale === 'id' ? 'Direkayasa untuk Skala Besar,' : 'Architected for Scale,' }}
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent">
                    {{ $currentLocale === 'id' ? 'Dibangun untuk Kinerja Tinggi.' : 'Built for Extreme Performance.' }}
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed mb-8">
                {{ $currentLocale === 'id'
                    ? 'Dari arsitektur monolit modern dan cloud Kubernetes hingga aplikasi seluler berlatensi rendah. Setiap sistem dibangun dengan standar kode bebas utang teknis.'
                    : 'From modern monolithic web architectures and resilient cloud infrastructures to high-concurrency mobile platforms. We engineer digital products without technical debt.' }}
            </p>
        </div>
    </div>
</section>

{{-- ========================================================================
     INTERACTIVE SERVICES MATRIX (Accelerate Services Matrix)
     ======================================================================== --}}
<section class="py-12 border-t border-slate-200/80 dark:border-white/5 relative"
         x-data="{ activeFilter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Filter Bar --}}
        <div class="flex flex-wrap items-center justify-between gap-4 mb-12">
            <div class="flex items-center gap-2">
                <button @click="activeFilter = 'all'"
                        type="button"
                        class="px-5 py-2 rounded-full text-xs font-semibold transition-all"
                        :class="activeFilter === 'all' ? 'bg-[#00BFA5] text-[#090D16] shadow-md shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                    {{ $currentLocale === 'id' ? 'Semua Layanan' : 'All Capabilities' }}
                </button>
                <button @click="activeFilter = 'development'"
                        type="button"
                        class="px-5 py-2 rounded-full text-xs font-semibold transition-all"
                        :class="activeFilter === 'development' ? 'bg-[#00BFA5] text-[#090D16] shadow-md shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                    Custom Development
                </button>
                <button @click="activeFilter = 'strategy'"
                        type="button"
                        class="px-5 py-2 rounded-full text-xs font-semibold transition-all"
                        :class="activeFilter === 'strategy' ? 'bg-[#00BFA5] text-[#090D16] shadow-md shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                    Product Strategy & Design
                </button>
            </div>
            <span class="text-xs font-mono text-slate-400">Total: {{ $services->count() }} Production Tracks</span>
        </div>

        {{-- Services Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($services as $index => $service)
                <div x-show="activeFilter === 'all' || activeFilter === '{{ $service->category }}'"
                     x-transition
                     class="bento-card relative flex flex-col justify-between p-8 sm:p-10 bg-white/85 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-xl">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="font-mono text-xs font-bold text-[#00BFA5]">
                                0{{ $index + 1 }} // {{ strtoupper($service->category ?? 'DEVELOPMENT') }}
                            </span>
                            <span class="px-2.5 py-1 rounded text-[10px] font-mono font-semibold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300">
                                ENTERPRISE GRADE
                            </span>
                        </div>

                        <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-4">
                            {{ $service->title }}
                        </h3>

                        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                            {{ $service->short_description }}
                        </p>

                        {{-- Checklist Benefits --}}
                        @if(!empty($service->benefits) && is_array($service->benefits))
                            <div class="space-y-2 mb-6 pt-4 border-t border-slate-100 dark:border-white/5">
                                @foreach(array_slice($service->benefits, 0, 3) as $benefit)
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-700 dark:text-slate-300">
                                        <span class="text-[#00BFA5]">✓</span>
                                        <span>{{ is_array($benefit) ? ($benefit['benefit'] ?? '') : $benefit }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Technologies Chips --}}
                        @if(!empty($service->technologies) && is_array($service->technologies))
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach(array_slice($service->technologies, 0, 4) as $tech)
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-mono bg-slate-100 dark:bg-white/5 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-white/5">
                                        {{ is_array($tech) ? ($tech['name'] ?? '') : $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-6 border-t border-slate-100 dark:border-white/5 flex items-center justify-between">
                        <span class="text-xs font-mono text-slate-400">Strict SLA Supported</span>
                        <a href="{{ route('service', $service->slug) }}" class="rr-btn rr-btn-primary px-5 py-2.5 text-xs font-semibold">
                            <span class="btn-wrap">
                                <span class="text-1">{{ $currentLocale === 'id' ? 'Buka Spesifikasi' : 'View Blueprint' }}</span>
                                <span class="text-2">{{ $currentLocale === 'id' ? 'Pelajari Arsitektur' : 'Explore Service' }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================================================
     PROCESS STEPPER (Accelerate Architecture Methodology)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-100/40 dark:bg-slate-950/40 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                ENGINEERING METHODOLOGY
            </span>
            <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                {{ $currentLocale === 'id' ? 'Disiplin Rekayasa Dari Konsep ke Produksi' : 'How We Engineer & Deliver Systems' }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10">
                <span class="font-mono text-2xl font-bold text-[#00BFA5]">01</span>
                <h3 class="font-instrumentsans text-lg font-bold text-slate-900 dark:text-white mt-2 mb-2">Technical Discovery</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                    Auditing current infrastructure, defining SLA targets, scoping architectural constraints, and drafting the system blueprint.
                </p>
            </div>
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10">
                <span class="font-mono text-2xl font-bold text-[#00BFA5]">02</span>
                <h3 class="font-instrumentsans text-lg font-bold text-slate-900 dark:text-white mt-2 mb-2">System Architecture</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                    Database ERD normalization, API contracts, high-availability cloud topology, and strict security threat modeling.
                </p>
            </div>
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10">
                <span class="font-mono text-2xl font-bold text-[#00BFA5]">03</span>
                <h3 class="font-instrumentsans text-lg font-bold text-slate-900 dark:text-white mt-2 mb-2">Test-Driven Sprints</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                    Strict TDD code development with automated CI/CD unit and integration test gates on every single branch commit.
                </p>
            </div>
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10">
                <span class="font-mono text-2xl font-bold text-[#00BFA5]">04</span>
                <h3 class="font-instrumentsans text-lg font-bold text-slate-900 dark:text-white mt-2 mb-2">Zero-Downtime Rollout</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                    Blue/green container deployments, real-time APM telemetry, and 24/7 automated monitoring health checks.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
