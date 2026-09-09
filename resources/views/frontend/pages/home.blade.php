@extends('frontend.components.layout', ['title' => 'Accelerate Lab - Digital Innovation & Software Engineering Agency'])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "WebSite",
    "name": "Accelerate Lab",
    "url": "{{ config('app.url') }}",
    "description": "Boutique software engineering lab and digital innovation agency. We build high-performance web applications, scalable operational portals, and high-converting digital platforms.",
    "potentialAction": {
        "{{ '@' }}type": "SearchAction",
        "target": "{{ url('/blog') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush

@section('content')
    {{-- =========================================================================
         1. HERO AREA (Business Architecture Preview)
         ========================================================================= --}}
    <section class="hero-area pt-36 pb-20 md:pt-48 md:pb-28 relative overflow-hidden bg-white dark:bg-slate-950 text-slate-900 dark:text-white transition-colors duration-300" aria-labelledby="hero-heading">
        {{-- Ambient Background Glow --}}
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-teal-500/10 dark:bg-teal-500/10 rounded-full blur-[140px] pointer-events-none -z-10" aria-hidden="true"></div>

        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="hero-area-inner">
                <div class="hero-content">
                    {{-- Official Accelerate Lab Brand Emblem --}}
                    <div class="mb-8 inline-flex items-center gap-3 px-4 py-2 rounded-2xl bg-slate-100 dark:bg-white/5 border border-slate-200/80 dark:border-white/10 backdrop-blur-md shadow-sm">
                        <div class="flex items-center gap-1 font-instrumentsans text-base sm:text-lg font-bold tracking-tight">
                            <span class="text-slate-900 dark:text-white transition-colors">Accelerate</span>
                            <span class="text-teal-500 dark:text-teal-400 font-mono font-normal">/&gt;</span>
                            <span class="text-slate-900 dark:text-white transition-colors">Lab</span>
                        </div>
                        <span class="h-3.5 w-px bg-slate-300 dark:bg-white/20" aria-hidden="true"></span>
                        <span class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 dark:text-teal-400">Engineering Studio</span>
                    </div>

                    {{-- Hero Headline & Visual Layout --}}
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        <div class="lg:col-span-7">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-teal-500/10 border border-teal-500/20 shadow-sm mb-6">
                                <span class="relative flex h-2 w-2" aria-hidden="true">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-400"></span>
                                </span>
                                <span class="text-xs font-bold text-teal-600 dark:text-teal-400 tracking-wide uppercase">{{ __('Tersedia untuk Proyek Baru Kuartal Ini') }}</span>
                            </div>

                            <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.12] font-instrumentsans mb-6">
                                {{ __('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom yang Mempercepat Pertumbuhan Usaha Anda') }}
                            </h1>

                            <p class="text-slate-600 dark:text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl mb-8">
                                {{ __('Tinggalkan sistem manual yang kaku dan spreadsheet yang tercecer. Kami merancang website profil berkonversi tinggi dan portal bisnis modern yang rapi, cepat, dan menjadi aset milik Anda selamanya.') }}
                            </p>

                            @php
                                $heroWaPhone = preg_replace('/[^0-9]/', '', ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: '6287721312985'));
                                $heroWaMsg = __('Halo Accelerate Lab! Saya ingin konsultasi mengenai pembuatan sistem software kustom untuk bisnis saya.');
                            @endphp

                            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                                <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode($heroWaMsg) }}" target="_blank" rel="noopener noreferrer" id="hero-cta-primary"
                                   class="rr-btn !bg-[#25D366] hover:!bg-[#20ba5a] text-white border-0 shadow-lg shadow-emerald-500/20">
                                    <span class="btn-wrap">
                                        <span class="text-one text-white flex items-center gap-2">
                                            <x-app-icon name="chat" class="size-4 fill-current" />
                                            {{ __('Konsultasi Gratis via WhatsApp') }}
                                        </span>
                                        <span class="text-two text-white flex items-center gap-2">
                                            <x-app-icon name="chat" class="size-4 fill-current" />
                                            {{ __('Konsultasi Gratis via WhatsApp') }}
                                        </span>
                                    </span>
                                </a>

                                <a href="{{ route('contact') }}" id="hero-cta-secondary"
                                   class="rr-btn btn-border">
                                    <span class="btn-wrap">
                                        <span class="text-one flex items-center gap-2">
                                            <x-app-icon name="calculate" class="size-4 text-teal-500 dark:text-teal-400" />
                                            {{ __('Hitung Estimasi Kebutuhan') }}
                                        </span>
                                        <span class="text-two flex items-center gap-2">
                                            <x-app-icon name="calculate" class="size-4 text-slate-900 dark:text-white" />
                                            {{ __('Hitung Estimasi Kebutuhan') }}
                                        </span>
                                    </span>
                                </a>
                            </div>

                            {{-- Trust Anchors --}}
                            <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-xs font-semibold text-slate-600 dark:text-slate-300">
                                <div class="flex items-center gap-1.5">
                                    <x-app-icon name="check_circle" class="size-4 text-teal-500 dark:text-teal-400" />
                                    <span>{{ __('Konsultasi Langsung dengan Principal Architect') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <x-app-icon name="check_circle" class="size-4 text-teal-500 dark:text-teal-400" />
                                    <span>{{ __('100% Source Code dan Database Hak Milik Anda') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <x-app-icon name="check_circle" class="size-4 text-teal-500 dark:text-teal-400" />
                                    <span>{{ __('Resmi PT Akselerasi Digital Mandiri') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Interactive Business Dashboard Preview Graphic --}}
                        <div class="lg:col-span-5 relative w-full" aria-hidden="true">
                            <div class="relative w-full max-w-md mx-auto bg-white dark:bg-slate-900/90 rounded-[20px] shadow-xl dark:shadow-2xl border border-slate-200/80 dark:border-white/10 overflow-hidden">
                                <div class="flex items-center justify-between px-6 py-4 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-200/80 dark:border-white/10">
                                    <div class="flex items-center gap-3">
                                        <div class="size-8 rounded-lg bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400">
                                            <x-app-icon name="dashboard" class="size-4" />
                                        </div>
                                        <div>
                                            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-white">Portal Operasional Bisnis</h2>
                                            <p class="text-[11px] text-slate-500 dark:text-slate-400">Sinkronisasi Multi-Gudang &amp; Cabang</p>
                                        </div>
                                    </div>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Live Sync
                                    </span>
                                </div>

                                <div class="p-6 space-y-5">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/80 dark:border-white/10">
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-1">Pesanan Terproses</p>
                                            <div class="flex items-baseline gap-2">
                                                <span class="text-2xl font-black text-slate-900 dark:text-white">1,420+</span>
                                                <span class="text-xs font-bold text-teal-600 dark:text-teal-400">+18% bln ini</span>
                                            </div>
                                            <div class="mt-2 w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                                <div class="bg-teal-500 dark:bg-teal-400 h-full rounded-full" style="width: 82%"></div>
                                            </div>
                                        </div>

                                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/80 dark:border-white/10">
                                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-1">Akurasi Inventori</p>
                                            <div class="flex items-baseline gap-2">
                                                <span class="text-2xl font-black text-slate-900 dark:text-white">99.8%</span>
                                                <span class="text-xs font-bold text-teal-600 dark:text-teal-400">Optimal</span>
                                            </div>
                                            <div class="mt-2 w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                                <div class="bg-teal-500 dark:bg-teal-400 h-full rounded-full" style="width: 99.8%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-2.5 text-xs font-mono">
                                        <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50/60 dark:bg-slate-800/40 border border-slate-200/60 dark:border-white/5">
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-2 rounded-full bg-emerald-500"></div>
                                                <span class="text-slate-700 dark:text-slate-300">Invoicing otomatis terkirim</span>
                                            </div>
                                            <span class="text-slate-400 dark:text-slate-500">Baru saja</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50/60 dark:bg-slate-800/40 border border-slate-200/60 dark:border-white/5">
                                            <div class="flex items-center gap-2.5">
                                                <div class="size-2 rounded-full bg-teal-500"></div>
                                                <span class="text-slate-700 dark:text-slate-300">Notifikasi stok menipis</span>
                                            </div>
                                            <span class="text-teal-600 dark:text-teal-400">12 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute -bottom-4 -left-4 bg-white dark:bg-slate-900 rounded-full shadow-xl border border-slate-200 dark:border-white/10 py-2.5 px-5 flex items-center gap-3 z-30">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
                                </span>
                                <div class="text-xs font-semibold text-slate-800 dark:text-slate-200">
                                    Status: <span class="text-teal-600 dark:text-teal-400 font-bold">Sistem Aktif 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Metrics & Intro Statistics --}}
                    <div class="section-content mt-16 pt-12 border-t border-slate-200/80 dark:border-white/10 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
                        <div class="md:col-span-6 flex items-center gap-10">
                            <div class="feature-box">
                                <span class="block text-4xl sm:text-5xl font-bold text-slate-900 dark:text-white font-mono">98%</span>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 uppercase tracking-wider">Client satisfaction rate</p>
                            </div>
                            <div class="h-12 w-px bg-slate-200 dark:bg-white/10" aria-hidden="true"></div>
                            <div class="feature-box">
                                <span class="block text-4xl sm:text-5xl font-bold text-teal-600 dark:text-teal-400 font-mono">120+</span>
                                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 uppercase tracking-wider">Digital products shipped</p>
                            </div>
                        </div>

                        {{-- Dynamic Homepage Stats when available --}}
                        @if (isset($heroStats) && count($heroStats) > 0)
                        <div class="md:col-span-6 flex flex-wrap items-center justify-end gap-8">
                            @foreach ($heroStats as $stat)
                                <div>
                                    <p class="text-3xl font-extrabold text-slate-900 dark:text-white font-mono">{{ $stat->value }}<span class="text-teal-600 dark:text-teal-400 text-xl">{{ $stat->unit }}</span></p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold mt-0.5">{{ __($stat->label) }}</p>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
                </div>
            </div>
        </div>
    </section>

    {{-- Client & Partner Proof Marquee --}}
    <div id="trusted-partners-marquee" class="w-full bg-slate-100 dark:bg-slate-900 border-y border-slate-200/80 dark:border-white/10 py-6 overflow-hidden relative transition-colors duration-300" aria-label="Fokus Solusi Industri" role="region">
        <div class="absolute inset-y-0 left-0 w-24 sm:w-36 bg-gradient-to-r from-slate-100 dark:from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute inset-y-0 right-0 w-24 sm:w-36 bg-gradient-to-l from-slate-100 dark:from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-10 mx-6 text-xs sm:text-sm font-bold text-slate-600 dark:text-slate-400 tracking-wider">
                <span>DISTRIBUTOR &amp; GROSIR</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>LOGISTIK &amp; PENGIRIMAN</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>MANUFAKTUR</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>RETAIL &amp; KULINER</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>JASA PROFESIONAL</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>KESEHATAN</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>LEGAL TECH</span>
                <span class="text-teal-500 dark:text-teal-400">•</span>
                <span>FINTECH &amp; SAAS</span>
            </div>
        </div>
    </div>

    {{-- =========================================================================
         2. TECHNICAL BENTO GRID SECTION
         ========================================================================= --}}
    <section class="py-24 bg-slate-50/80 dark:bg-slate-950 relative transition-colors duration-300" aria-labelledby="bento-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-14">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20 mb-4">
                    {{ __('Mengapa Accelerate Lab?') }}
                </span>
                <h2 id="bento-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans max-w-2xl">
                    {{ __('Lebih dari Sekadar Pembuat Kode, Kami Mitra Rekayasa Teknologi Anda') }}
                </h2>
            </div>

            <div class="grid grid-cols-12 gap-6 items-stretch">
                {{-- Bento Card 1: 8-col Hero Highlight --}}
                <div class="col-span-12 lg:col-span-8 relative overflow-hidden rounded-[20px] bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:to-slate-800/90 border border-slate-200/80 dark:border-white/10 p-8 sm:p-12 flex flex-col justify-between shadow-sm dark:shadow-none">
                    <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-teal-500/10 blur-3xl pointer-events-none" aria-hidden="true"></div>
                    <div class="relative z-10 max-w-xl">
                        <span class="text-xs font-mono uppercase tracking-widest text-teal-600 dark:text-teal-400 font-bold mb-3 block">Architecture First</span>
                        <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white font-instrumentsans mb-4">
                            Architecture First: engineered for high-throughput enterprise stability
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-8">
                            We design software solutions built on resilient modular foundations. Clean boundaries, comprehensive automated tests, and scalable deployment pipelines mean zero tech debt.
                        </p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ route('services') }}" class="rr-btn btn-border">
                            <span class="btn-wrap">
                                <span class="text-one">Explore Capabilities</span>
                                <span class="text-two">Explore Capabilities</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Bento Card 2: 4-col Reliable Code Card --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-white dark:bg-slate-900/90 border border-slate-200/80 dark:border-white/10 p-8 flex flex-col justify-between shadow-sm dark:shadow-none">
                    <div>
                        <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-6">
                            <x-app-icon name="verified" class="size-6 text-teal-500 dark:text-teal-400" />
                        </span>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 font-instrumentsans">Reliable &amp; Scalable Code</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            {{ __('Tested for High Reliability') }}: Every system is engineered to handle 10x traffic spikes with sub-100ms response latencies.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200/80 dark:border-white/10 flex items-center justify-between">
                        <span class="text-xs font-mono text-slate-500 dark:text-slate-400">Regression Rate</span>
                        <span class="text-xs font-mono text-teal-600 dark:text-teal-400 font-bold">100% CI Verified</span>
                    </div>
                </div>

                {{-- Bento Card 3: 4-col Full IP Ownership Card --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-white dark:bg-slate-900/90 border border-slate-200/80 dark:border-white/10 p-8 flex flex-col justify-between shadow-sm dark:shadow-none">
                    <div>
                        <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-6">
                            <x-app-icon name="lock" class="size-6 text-teal-500 dark:text-teal-400" />
                        </span>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 font-instrumentsans">{{ __('Kepemilikan Penuh Tanpa Keterikatan') }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            100% Source Code, konfigurasi database, dan hak akses server sepenuhnya diserahkan menjadi aset sah milik bisnis Anda tanpa biaya lisensi tersembunyi.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200/80 dark:border-white/10 flex items-center justify-between">
                        <span class="text-xs font-mono text-slate-500 dark:text-slate-400">Ownership</span>
                        <span class="text-xs font-mono text-teal-600 dark:text-teal-400 font-bold">100% Client Asset</span>
                    </div>
                </div>

                {{-- Bento Card 4: 8-col Velocity Card --}}
                <div class="col-span-12 lg:col-span-8 rounded-[20px] bg-white dark:bg-slate-900/90 border border-slate-200/80 dark:border-white/10 p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between gap-8 shadow-sm dark:shadow-none">
                    <div class="space-y-2 max-w-md">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white font-instrumentsans">Rapid Time to Market</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Iterative sprints delivering production-ready releases every 2 weeks without compromising code stability.
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-center px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200/80 dark:border-white/10">
                            <span class="block text-2xl font-bold text-teal-600 dark:text-teal-400 font-mono">14d</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 uppercase">Avg Sprint</span>
                        </div>
                        <div class="text-center px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200/80 dark:border-white/10">
                            <span class="block text-2xl font-bold text-slate-900 dark:text-white font-mono">99.9%</span>
                            <span class="text-[11px] text-slate-500 dark:text-slate-400 uppercase">Uptime SLA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Operational Transformation: Tantangan Manual vs. Sistem Kustom --}}
    <section class="py-24 bg-slate-100/60 dark:bg-slate-900/60 border-t border-slate-200/80 dark:border-white/5 transition-colors duration-300" aria-labelledby="comparison-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-mono uppercase tracking-widest mb-3">
                    <x-app-icon name="compare_arrows" class="size-3.5" />
                    {{ __('Transformasi Operasional Bisnis') }}
                </span>
                <h2 id="comparison-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                    {{ __('Tantangan Manual vs. Sistem Kustom') }}
                </h2>
                <p class="mt-3 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                    {{ __('Bandingkan bagaimana sistem kustom terintegrasi menyelesaikan kendala operasional yang sering menghambat bisnis berkembang.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                {{-- Column 1: Manual / Spreadsheet Tercecer --}}
                <div class="p-8 rounded-[20px] bg-rose-50/70 dark:bg-rose-950/20 border border-rose-200 dark:border-rose-900/40 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-xl bg-rose-500/10 text-rose-600 dark:text-rose-400 flex items-center justify-center">
                            <x-app-icon name="warning" class="size-5" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('Tantangan Spreadsheet & Sistem Manual') }}</h3>
                            <p class="text-xs text-rose-600 dark:text-rose-400 font-medium">{{ __('Membatasi kecepatan dan rawan human error') }}</p>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="size-5 text-rose-500 dark:text-rose-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Spreadsheet Tercecer') }}</strong>: {{ __('File bertumpuk di berbagai komputer, rawan terhapus atau tertukar versi rumus perhitungan.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="size-5 text-rose-500 dark:text-rose-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Rekap Lambat') }}</strong>: {{ __('Staf menghabiskan 2-3 jam setiap sore hanya untuk mencocokkan nota manual dan laporan omzet harian.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="size-5 text-rose-500 dark:text-rose-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Stok Gudang Selisih') }}</strong>: {{ __('Data barang di catatan admin tidak sesuai dengan kondisi riil di gudang fisik.') }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Column 2: Custom Solution / Database Terpusat --}}
                <div class="p-8 rounded-[20px] bg-teal-50/70 dark:bg-teal-950/20 border border-teal-200 dark:border-teal-500/30 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-xl bg-teal-500/10 text-teal-600 dark:text-teal-400 flex items-center justify-center">
                            <x-app-icon name="check_circle" class="size-5" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('Solusi Sistem Kustom Terintegrasi') }}</h3>
                            <p class="text-xs text-teal-600 dark:text-teal-400 font-medium">{{ __('Otomatis, presisi, dan aset milik Anda 100%') }}</p>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Database Terpusat') }}</strong>: {{ __('Seluruh transaksi tercatat otomatis di satu database aman dengan hak akses per karyawan.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Invoicing Otomatis') }}</strong>: {{ __('Tagihan, surat jalan, dan laporan keuangan terbit seketika tanpa perlu rekap ulang manual.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0 mt-0.5" />
                            <span><strong>{{ __('Sinkronisasi Real-Time') }}</strong>: {{ __('Stok berkurang otomatis begitu pesanan terkonfirmasi, terintegrasi barcode scanner.') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         3. CORE CAPABILITIES SERVICES LIST (Dynamic from CMS)
         ========================================================================= --}}
    <section class="service-area py-24 bg-white dark:bg-slate-950 border-t border-slate-200/80 dark:border-white/5 relative transition-colors duration-300" aria-labelledby="services-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-header mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20 mb-4">
                        {{ __('Kapabilitas Utama') }}
                    </span>
                    <h2 id="services-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                        {{ __('Solusi Rekayasa Perangkat Lunak dari Hulu ke Hilir') }}
                    </h2>
                </div>
                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base max-w-md leading-relaxed">
                    {{ __('Semua yang Anda butuhkan untuk meluncurkan, mengoptimasi, dan menskalakan sistem digital bisnis Anda dengan standar performa tertinggi.') }}
                </p>
            </div>

            <div class="services-wrapper-box">
                <div class="services-wrapper-1">
                    @forelse ($services as $index => $service)
                        <div class="service-box">
                            <div class="count">
                                <span class="number">({{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }})</span>
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    <a href="{{ route('service', $service) }}" class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                        {{ $service->title }}
                                    </a>
                                </h3>
                                @if (!empty($service->features) && is_array($service->features))
                                    <ul class="service-list">
                                        @foreach (array_slice($service->features, 0, 4) as $feat)
                                            <li>
                                                <a href="{{ route('service', $service) }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">
                                                    {{ is_array($feat) ? ($feat['title'] ?? '') : $feat }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif (!empty($service->benefits) && is_array($service->benefits))
                                    <ul class="service-list">
                                        @foreach (array_slice($service->benefits, 0, 4) as $ben)
                                            <li>
                                                <a href="{{ route('service', $service) }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">
                                                    {{ $ben }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 line-clamp-2">
                                        {{ $service->short_description }}
                                    </p>
                                @endif
                            </div>
                            <div class="thumb">
                                @if ($service->hero_image)
                                    <img src="{{ asset($service->hero_image) }}" alt="{{ $service->title }}" loading="lazy">
                                @else
                                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop&q=80" alt="{{ $service->title }}" loading="lazy">
                                @endif
                            </div>
                        </div>
                    @empty
                        {{-- Fallback default service items (01 to 04) --}}
                        <div class="service-box">
                            <div class="count"><span class="number">(01)</span></div>
                            <div class="content">
                                <h3 class="title"><a href="{{ route('services') }}" class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors">{{ __('Web Application Development') }}</a></h3>
                                <ul class="service-list">
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">{{ __('Product Strategy') }}</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">{{ __('Custom Development') }}</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Laravel 12 Architecture</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">{{ __('Learn more') }}</a></li>
                                </ul>
                            </div>
                            <div class="thumb"><img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop&q=80" alt="Web Application Development" loading="lazy"></div>
                        </div>
                        <div class="service-box">
                            <div class="count"><span class="number">(02)</span></div>
                            <div class="content">
                                <h3 class="title"><a href="{{ route('services') }}" class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors">{{ __('Cloud Architecture & DevOps') }}</a></h3>
                                <ul class="service-list">
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">AWS &amp; GCP Orchestration</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Docker &amp; Kubernetes</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">CI/CD Pipeline Automation</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">{{ __('High Availability Setup') }}</a></li>
                                </ul>
                            </div>
                            <div class="thumb"><img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&auto=format&fit=crop&q=80" alt="Cloud Architecture" loading="lazy"></div>
                        </div>
                        <div class="service-box">
                            <div class="count"><span class="number">(03)</span></div>
                            <div class="content">
                                <h3 class="title"><a href="{{ route('services') }}" class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors">{{ __('Mobile App Development') }}</a></h3>
                                <ul class="service-list">
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Flutter Cross-Platform</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Offline-First Sync</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Biometric &amp; Push Integration</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">App Store Deployment</a></li>
                                </ul>
                            </div>
                            <div class="thumb"><img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&auto=format&fit=crop&q=80" alt="Mobile App Development" loading="lazy"></div>
                        </div>
                        <div class="service-box">
                            <div class="count"><span class="number">(04)</span></div>
                            <div class="content">
                                <h3 class="title"><a href="{{ route('services') }}" class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors">{{ __('UI/UX Design & Systems') }}</a></h3>
                                <ul class="service-list">
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Boutique Design Systems</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Interactive Prototyping</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">User Research &amp; Testing</a></li>
                                    <li><a href="{{ route('services') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">WCAG 2.2 Accessibility</a></li>
                                </ul>
                            </div>
                            <div class="thumb"><img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?w=600&auto=format&fit=crop&q=80" alt="UI/UX Design" loading="lazy"></div>
                        </div>
                    @endforelse
                </div>
            </div>

            @if (isset($capabilityStats) && count($capabilityStats) > 0)
                <div class="mt-12 pt-8 border-t border-slate-200/80 dark:border-white/10 flex flex-wrap gap-8">
                    @foreach ($capabilityStats as $stat)
                        <div>
                            <p class="text-3xl font-extrabold text-slate-900 dark:text-white font-mono">{{ $stat->value }}<span class="text-teal-600 dark:text-teal-400 text-xl">{{ $stat->unit }}</span></p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold mt-0.5">{{ __($stat->label) }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
        </div>
    </section>

    {{-- =========================================================================
         4. FEATURED WORK GRID SECTION
         ========================================================================= --}}
    <section class="work-area py-24 bg-slate-50/80 dark:bg-slate-900/60 border-t border-slate-200/80 dark:border-white/5 relative transition-colors duration-300" aria-labelledby="work-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-header mb-14 flex items-end justify-between">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20 mb-4">
                        Case Studies
                    </span>
                    <h2 id="work-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                        {{ __('Our Recent Projects') }}
                    </h2>
                </div>
                <div class="hidden sm:block">
                    <span class="text-2xl font-mono text-slate-400 dark:text-slate-500">(04)</span>
                </div>
            </div>

            @php
                $displayProjects = (isset($featuredProjects) && count($featuredProjects) > 0) ? $featuredProjects : ($recentProjects ?? collect());
            @endphp

            <div class="works-wrapper-box">
                <div class="works-wrapper-1">
                    @if ($displayProjects->count() > 0)
                        @foreach ($displayProjects as $project)
                            <div class="work-box group">
                                <div class="thumb">
                                    <div class="image scale">
                                        <a href="/case-studies/{{ $project->slug }}">
                                            @if ($project->featured_image)
                                                <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}">
                                            @else
                                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80" alt="{{ $project->title }}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3 class="title">
                                        <a href="/case-studies/{{ $project->slug }}" class="text-slate-900 dark:text-white hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                            {{ $project->title }}
                                        </a>
                                    </h3>
                                    @if ($project->challenge || $project->solution)
                                        <div class="mt-2 text-xs text-slate-500 dark:text-slate-400 space-y-1">
                                            @if ($project->challenge)
                                                <p><strong class="text-slate-700 dark:text-slate-300">{{ __('Tantangan') }}:</strong> {{ Str::limit($project->challenge, 60) }}</p>
                                            @endif
                                            @if ($project->solution)
                                                <p><strong class="text-teal-600 dark:text-teal-400">{{ __('Solusi') }}:</strong> {{ Str::limit($project->solution, 60) }}</p>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="meta">
                                        <span class="tag">{{ $project->client ?? 'Enterprise Client' }}</span>
                                        <span class="date">2025</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- Default Curated Work Boxes --}}
                        <div class="work-box group">
                            <div class="thumb">
                                <div class="image scale">
                                    <a href="{{ route('case-studies') }}">
                                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80" alt="Core Banking Portal">
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    <a href="{{ route('case-studies') }}" class="text-slate-900 dark:text-white hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                        Core Banking Portal
                                    </a>
                                </h3>
                                <div class="meta">
                                    <span class="tag">Financial Architecture</span>
                                    <span class="date">2025</span>
                                </div>
                            </div>
                        </div>

                        <div class="work-box group">
                            <div class="thumb">
                                <div class="image scale">
                                    <a href="{{ route('case-studies') }}">
                                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80" alt="Telehealth Analytics Portal">
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    <a href="{{ route('case-studies') }}" class="text-slate-900 dark:text-white hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                                        Telehealth Analytics Portal
                                    </a>
                                </h3>
                                <div class="meta">
                                    <span class="tag">Healthcare</span>
                                    <span class="date">2025</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-14 text-center">
                <a href="{{ route('case-studies') }}" class="rr-btn btn-border">
                    <span class="btn-wrap">
                        <span class="text-one">View All Work</span>
                        <span class="text-two">View All Work</span>
                    </span>
                </a>
            </div>
        </div>
    </section>

    {{-- Execution Process Indicator --}}
    <section id="process-step-indicator" class="py-24 bg-white dark:bg-slate-950 border-t border-slate-200/80 dark:border-white/5 transition-colors duration-300" aria-labelledby="process-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-14">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20 mb-4">
                    {{ __('How We Work') }}
                </span>
                <h2 id="process-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                    Dari Perencanaan Arsitektur hingga Peluncuran Produksi
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-[20px] bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 space-y-4 shadow-sm dark:shadow-none">
                    <span class="text-2xl font-mono font-bold text-teal-600 dark:text-teal-400">01</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Discovery &amp; Arsitektur</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ __('Audit Alur Kerja') }} &amp; {{ __('Pemetaan Masalah') }}:</span> Analisis mendalam proses bisnis, perancangan skema database relasional, dan penyusunan spesifikasi teknis tanpa asumsi.
                    </p>
                </div>
                <div class="p-8 rounded-[20px] bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 space-y-4 shadow-sm dark:shadow-none">
                    <span class="text-2xl font-mono font-bold text-teal-600 dark:text-teal-400">02</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Engineering Sprints</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Pembangunan modul fitur terisolasi dengan Strict TDD, continuous integration, dan demo bertahap setiap 2 minggu.
                    </p>
                </div>
                <div class="p-8 rounded-[20px] bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 space-y-4 shadow-sm dark:shadow-none">
                    <span class="text-2xl font-mono font-bold text-teal-600 dark:text-teal-400">03</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Testing &amp; Handover</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Uji beban concurrency, audit keamanan, penyerahan full source code repository, dan pendampingan peluncuran server produksi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Retainer & Commercial Offer Ladder Section --}}
    <section id="retainer-scope-matrix" class="py-24 bg-slate-50/80 dark:bg-slate-900/60 border-t border-slate-200/80 dark:border-white/5 transition-colors duration-300" aria-labelledby="pricing-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                    {{ __('Pilihan Solusi Sesuai Kebutuhan Bisnis Anda') }}
                </span>
                <h2 id="pricing-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                    {{ __('Model Kerja Sama Fleksibel dan Transparan') }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mt-3">
                    Mulai dari paket kilat untuk bisnis lokal hingga sistem portal operasional terintegrasi penuh.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                {{-- Tier 1: Sprint --}}
                <div class="p-8 sm:p-10 rounded-[20px] bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 flex flex-col justify-between shadow-sm dark:shadow-none">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 dark:text-teal-400 bg-teal-500/10 px-3 py-1 rounded-full border border-teal-500/20">Website Bisnis Express</span>
                            <span class="text-xs text-teal-600 dark:text-teal-400 font-mono font-bold">24-48 Jam</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-1 font-instrumentsans">Website Bisnis Express</h3>
                        <p class="text-2xl font-extrabold text-slate-900 dark:text-white font-mono mb-3">Rp 1.500.000</p>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6">
                            Website profil berkonversi tinggi, desain custom elegan, mobile responsif, dan siap meluncurkan bisnis Anda ke publik.
                        </p>
                        <ul class="space-y-3 text-sm text-slate-700 dark:text-slate-300">
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>Desain kustom tanpa template generik</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>Core Web Vitals skor 95+ (LCP &lt; 1.0s)</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>100% Hak Milik Source Code &amp; Domain</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200/80 dark:border-white/10">
                        <a href="{{ route('contact') }}" class="rr-btn btn-border w-full text-center">
                            <span class="btn-wrap">
                                <span class="text-one">Konsultasi Paket Sprint</span>
                                <span class="text-two">Konsultasi Paket Sprint</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Tier 2: Enterprise Lab --}}
                <div class="p-8 sm:p-10 rounded-[20px] bg-gradient-to-br from-teal-50/40 via-white to-teal-50/20 dark:from-slate-900 dark:to-slate-800 border-2 border-teal-500/40 relative flex flex-col justify-between shadow-xl">
                    <div class="absolute -top-3 right-6 bg-teal-500 text-slate-950 text-xs font-bold font-mono uppercase px-3 py-1 rounded-full shadow">
                        Paling Dipilih
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-teal-600 dark:text-teal-400 bg-teal-500/10 px-3 py-1 rounded-full border border-teal-500/20">Custom Platform</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-mono">Konsultasi Kebutuhan</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2 font-instrumentsans">Portal Operasional dan Sistem Kustom</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6">
                            Rekayasa sistem operasional back-office, multi-cabang, otomasi invoice, dan integrasi database menyeluruh.
                        </p>
                        <ul class="space-y-3 text-sm text-slate-700 dark:text-slate-300">
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>Arsitektur monolitik Laravel 12 tahan lonjakan</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>Role-based access control &amp; audit log</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-500 dark:text-teal-400 shrink-0" />
                                <span>Garansi pemeliharaan &amp; SLA uptime 99.9%</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200/80 dark:border-white/10">
                        <a href="{{ route('contact') }}" class="rr-btn w-full text-center">
                            <span class="btn-wrap">
                                <span class="text-one">Konsultasi Kebutuhan</span>
                                <span class="text-two">Konsultasi Kebutuhan</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Dynamic Testimonials Section --}}
    @if (isset($testimonials) && $testimonials->count() > 0)
    <section class="py-24 bg-white dark:bg-slate-950 border-t border-slate-200/80 dark:border-white/5 transition-colors duration-300" aria-labelledby="testimonials-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                    {{ __('Kepercayaan Klien') }}
                </span>
                <h2 id="testimonials-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                    {{ __('Apa Kata Mitra Bisnis yang Telah Bertumbuh Bersama Kami') }}
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                    <div class="p-8 rounded-[20px] bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 shadow-sm dark:shadow-none flex flex-col justify-between">
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-6 italic">
                            &ldquo;{{ $testimonial->quote }}&rdquo;
                        </p>
                        <div class="flex items-center gap-3 pt-4 border-t border-slate-200/60 dark:border-white/10">
                            @if ($testimonial->avatar_path)
                                <img src="{{ asset($testimonial->avatar_path) }}" alt="{{ $testimonial->client_name }}" class="size-10 rounded-full object-cover">
                            @else
                                <div class="size-10 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 font-bold flex items-center justify-center text-sm">
                                    {{ substr($testimonial->client_name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 dark:text-white">{{ $testimonial->client_name }}</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $testimonial->client_role }} &bull; {{ $testimonial->client_company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Objection Busting FAQ Section --}}
    <section class="py-24 bg-slate-50/80 dark:bg-slate-950 border-t border-slate-200/80 dark:border-white/5 transition-colors duration-300" aria-labelledby="faq-heading">
        <div class="max-w-[860px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                    Pertanyaan Umum
                </span>
                <h2 id="faq-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white font-instrumentsans">
                    Pertanyaan yang Sering Diajukan
                </h2>
            </div>

            <div class="space-y-4" x-data="{ active: null }">
                <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 overflow-hidden shadow-sm dark:shadow-none">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full p-6 text-left flex items-center justify-between text-slate-900 dark:text-white font-semibold focus:outline-none">
                        <span>Apakah ada biaya langganan bulanan tersembunyi?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-600 dark:text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 1 }" />
                    </button>
                    <div x-show="active === 1" x-collapse class="px-6 pb-6 text-sm text-slate-600 dark:text-slate-400 leading-relaxed border-t border-slate-100 dark:border-white/5 pt-4">
                        Tidak ada biaya tersembunyi. Anda membayar sesuai kesepakatan ruang lingkup proyek. Setelah serah terima selesai, sistem dan source code 100% menjadi milik Anda tanpa kewajiban lisensi berulang.
                    </div>
                </div>

                <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 overflow-hidden shadow-sm dark:shadow-none">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full p-6 text-left flex items-center justify-between text-slate-900 dark:text-white font-semibold focus:outline-none">
                        <span>Berapa lama waktu pengerjaannya?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-600 dark:text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 2 }" />
                    </button>
                    <div x-show="active === 2" x-collapse class="px-6 pb-6 text-sm text-slate-600 dark:text-slate-400 leading-relaxed border-t border-slate-100 dark:border-white/5 pt-4">
                        Untuk landing page dan website profil bisnis, sprint rata-rata memakan waktu 7 hingga 14 hari kerja. Untuk sistem portal operasional kustom terintegrasi, waktu pengerjaan berkisar antara 4 hingga 8 minggu tergantung kompleksitas modul.
                    </div>
                </div>

                <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 overflow-hidden shadow-sm dark:shadow-none">
                    <button @click="active = (active === 3 ? null : 3)" class="w-full p-6 text-left flex items-center justify-between text-slate-900 dark:text-white font-semibold focus:outline-none">
                        <span>Siapa yang memegang hak cipta source code dan database?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-600 dark:text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 3 }" />
                    </button>
                    <div x-show="active === 3" x-collapse class="px-6 pb-6 text-sm text-slate-600 dark:text-slate-400 leading-relaxed border-t border-slate-100 dark:border-white/5 pt-4">
                        100% Hak cipta, source code di repository privat, dan data di server sepenuhnya milik Anda. Kami tidak mengunci data atau membuat Anda ketergantungan pada vendor.
                    </div>
                </div>

                <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 overflow-hidden shadow-sm dark:shadow-none">
                    <button @click="active = (active === 4 ? null : 4)" class="w-full p-6 text-left flex items-center justify-between text-slate-900 dark:text-white font-semibold focus:outline-none">
                        <span>Apakah kerja sama dilengkapi kontrak dan legalitas resmi?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-600 dark:text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 4 }" />
                    </button>
                    <div x-show="active === 4" x-collapse class="px-6 pb-6 text-sm text-slate-600 dark:text-slate-400 leading-relaxed border-t border-slate-100 dark:border-white/5 pt-4">
                        Ya, seluruh transaksi dan kerja sama diikat dengan kontrak perjanjian kerja sama resmi di bawah badan hukum PT Akselerasi Digital Mandiri lengkap dengan Non-Disclosure Agreement (NDA).
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Final Action CTA Banner --}}
    <section id="closing-cta-section" class="py-24 bg-gradient-to-br from-slate-100 via-white to-slate-100 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 border-t border-slate-200/80 dark:border-white/10 relative text-center transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block px-3.5 py-1.5 rounded-full bg-teal-500/10 text-teal-600 dark:text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                {{ __('Ready to Accelerate?') }}
            </span>
            <h2 class="text-3xl sm:text-5xl font-bold text-slate-900 dark:text-white font-instrumentsans mb-6">
                Siap Melipatgandakan Efisiensi Digital Bisnis Anda?
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
                Jadwalkan konsultasi arsitektur langsung bersama principal engineer kami. Diskusikan solusi yang paling efektif untuk kebutuhan spesifik perusahaan Anda.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn !px-8 !py-4">
                    <span class="btn-wrap">
                        <span class="text-one">Mulai Diskusi Proyek</span>
                        <span class="text-two">Mulai Diskusi Proyek</span>
                    </span>
                </a>
                <a href="{{ route('services') }}" class="rr-btn btn-border !px-8 !py-4">
                    <span class="btn-wrap">
                        <span class="text-one">Lihat Kapabilitas</span>
                        <span class="text-two">Lihat Kapabilitas</span>
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
