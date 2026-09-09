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
    <!-- Hero Section (Redox Editorial Style) -->
    <section class="relative pt-32 pb-20 lg:pt-44 lg:pb-32 overflow-hidden bg-background-light dark:bg-background-dark" aria-labelledby="hero-heading">
        <div class="hidden sm:block absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-[650px] h-[650px] bg-primary/10 rounded-full blur-[90px] lg:blur-[130px] pointer-events-none -z-10" aria-hidden="true"></div>
        <div class="hidden sm:block absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[80px] lg:blur-[120px] pointer-events-none -z-10" aria-hidden="true"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-7 text-center lg:text-left" data-reveal>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 border border-primary/20 shadow-sm mb-8">
                        <span class="relative flex h-2 w-2" aria-hidden="true">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span class="text-xs font-bold text-primary tracking-wide uppercase">{{ __('Tersedia untuk Proyek Baru Kuartal Ini') }}</span>
                    </div>

                    <h1 id="hero-heading" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-6 leading-[1.15]">
                        {{ __('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom yang Mempercepat Pertumbuhan Usaha Anda') }}
                    </h1>

                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto lg:mx-0 mb-10 leading-relaxed">
                        {{ __('Tinggalkan sistem manual yang kaku dan spreadsheet yang tercecer. Kami merancang website profil berkonversi tinggi dan portal bisnis modern yang rapi, cepat, dan menjadi aset milik Anda selamanya.') }}
                    </p>

                    @php
                        $heroWaPhone = preg_replace('/[^0-9]/', '', ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: '6287721312985'));
                        $heroWaMsg = __('Halo Accelerate Lab! Saya ingin konsultasi mengenai pembuatan sistem software kustom untuk bisnis saya.');
                    @endphp

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode($heroWaMsg) }}" target="_blank" rel="noopener noreferrer" id="hero-cta-primary"
                            class="bg-[#25D366] hover:bg-[#20ba5a] text-white text-base sm:text-lg font-bold px-8 py-4 rounded-xl shadow-lg shadow-emerald-500/20 transition-all hover:scale-[1.02] flex items-center justify-center gap-2 group">
                            <x-app-icon name="chat" class="w-5 h-5 fill-current" />
                            <span>{{ __('Konsultasi Gratis via WhatsApp') }}</span>
                        </a>

                        <a href="/contact" id="hero-cta-secondary"
                            class="bg-white dark:bg-surface-dark text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 hover:border-primary text-base sm:text-lg font-bold px-7 py-4 rounded-xl transition-all hover:shadow-md flex items-center justify-center gap-2">
                            <x-app-icon name="calculate" class="w-5 h-5 text-primary" />
                            <span>{{ __('Hitung Estimasi Kebutuhan') }}</span>
                        </a>
                    </div>

                    <!-- Trust Anchors -->
                    <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-y-3 gap-x-6 text-xs font-semibold text-slate-600 dark:text-slate-300">
                        <div class="flex items-center gap-1.5">
                            <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                            <span>{{ __('Konsultasi Langsung dengan Principal Architect') }}</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                            <span>{{ __('100% Source Code dan Database Hak Milik Anda') }}</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                            <span>{{ __('Resmi PT Akselerasi Digital Mandiri') }}</span>
                        </div>
                    </div>

                    <!-- Dynamic Hero Stats -->
                    @if (isset($heroStats) && count($heroStats) > 0)
                    <div class="mt-12 flex items-center justify-center lg:justify-start gap-8 border-t border-slate-200 dark:border-slate-800 pt-8 opacity-90">
                        @foreach ($heroStats as $stat)
                            <div>
                                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $stat->value }}<span class="text-primary text-xl">{{ $stat->unit }}</span></p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold mt-0.5">{{ $stat->label }}</p>
                            </div>
                            @if (!$loop->last)
                                <div class="h-8 w-px bg-slate-200 dark:bg-slate-700" aria-hidden="true"></div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Right Column: Interactive Engineering Dashboard Preview -->
                <div class="lg:col-span-5 relative hidden lg:block w-full [perspective:1000px]" aria-hidden="true" data-reveal>
                    <div class="relative w-full max-w-md mx-auto bg-surface-light dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden z-20">
                        <div class="flex items-center justify-between px-6 py-4 bg-slate-50/90 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                    <x-app-icon name="dashboard" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-white">Portal Operasional Bisnis</h2>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Sinkronisasi Multi-Gudang & Cabang</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Live Sync
                            </span>
                        </div>

                        <div class="p-6 space-y-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                                    <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-1">Pesanan Terproses</p>
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-2xl font-black text-slate-900 dark:text-white">1,420+</span>
                                        <span class="text-xs font-bold text-emerald-500">+18% bln ini</span>
                                    </div>
                                    <div class="mt-2 w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-primary h-full rounded-full" style="width: 82%"></div>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                                    <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mb-1">Akurasi Inventori</p>
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-2xl font-black text-slate-900 dark:text-white">99.8%</span>
                                        <span class="text-xs font-bold text-emerald-500">Optimal</span>
                                    </div>
                                    <div class="mt-2 w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-emerald-500 h-full rounded-full" style="width: 99.8%"></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Aktivitas Sistem Real-Time</h3>
                                <div class="space-y-2.5 font-sans text-xs">
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800/60">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium">Invoicing otomatis terkirim</span>
                                        </div>
                                        <span class="text-[11px] text-slate-400 font-mono">Baru saja</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800/60">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium">Notifikasi stok menipis</span>
                                        </div>
                                        <span class="text-[11px] text-amber-600 dark:text-amber-400 font-medium">12 item</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800/60">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                            <span class="text-slate-700 dark:text-slate-300 font-medium">Laporan bulanan siap unduh</span>
                                        </div>
                                        <span class="text-[11px] text-primary font-medium">PDF Siap</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-4 -left-6 bg-surface-light dark:bg-surface-dark rounded-full shadow-xl border border-slate-200 dark:border-slate-700 py-2.5 px-5 flex items-center gap-3 z-30">
                        <div class="relative flex items-center justify-center">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </div>
                        <div class="text-xs font-semibold text-slate-700 dark:text-slate-200">
                            Status: <span class="text-emerald-600 dark:text-emerald-400 font-bold">Sistem Aktif 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client & Partner Proof Marquee (Redox Inspired Pure CSS) -->
    <div id="trusted-partners-marquee" class="w-full bg-surface-light dark:bg-slate-900/90 border-y border-slate-200 dark:border-slate-800 py-6 overflow-hidden relative" aria-label="Fokus Solusi Industri" role="region">
        <div class="absolute inset-y-0 left-0 w-24 sm:w-36 bg-gradient-to-r from-surface-light dark:from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute inset-y-0 right-0 w-24 sm:w-36 bg-gradient-to-l from-surface-light dark:from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-10 mx-6 text-xs sm:text-sm font-bold text-slate-500 dark:text-slate-400 tracking-wider">
                <span>DISTRIBUTOR & GROSIR</span>
                <span class="text-primary">•</span>
                <span>LOGISTIK & PENGIRIMAN</span>
                <span class="text-primary">•</span>
                <span>MANUFAKTUR</span>
                <span class="text-primary">•</span>
                <span>RETAIL & KULINER</span>
                <span class="text-primary">•</span>
                <span>JASA PROFESIONAL</span>
                <span class="text-primary">•</span>
                <span>KESEHATAN</span>
                <span class="text-primary">•</span>
                <span>LEGAL TECH</span>
                <span class="text-primary">•</span>
                <span>DISTRIBUTOR & GROSIR</span>
                <span class="text-primary">•</span>
                <span>LOGISTIK & PENGIRIMAN</span>
                <span class="text-primary">•</span>
                <span>MANUFAKTUR</span>
                <span class="text-primary">•</span>
                <span>RETAIL & KULINER</span>
                <span class="text-primary">•</span>
                <span>JASA PROFESIONAL</span>
                <span class="text-primary">•</span>
                <span>KESEHATAN</span>
                <span class="text-primary">•</span>
                <span>LEGAL TECH</span>
            </div>
        </div>
    </div>

    <!-- Sticky Services Showcase (NextSaaS App-Dev Pattern) -->
    <section class="py-24 bg-background-light dark:bg-background-dark relative" aria-labelledby="capabilities-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                <!-- Sticky Left Title Column -->
                <div class="lg:col-span-5 lg:sticky lg:top-28 space-y-6">
                    <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20">
                        {{ __('Kapabilitas Utama') }}
                    </span>
                    <h2 id="capabilities-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                        {{ __('Solusi Rekayasa Perangkat Lunak dari Hulu ke Hilir') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg leading-relaxed">
                        {{ __('Semua yang Anda butuhkan untuk meluncurkan, mengoptimasi, dan menskalakan sistem digital bisnis Anda dengan standar performa tertinggi.') }}
                    </p>
                    <div class="pt-2">
                        <a href="/services" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all">
                            <span>{{ __('Jelajahi Semua Layanan') }}</span>
                            <x-app-icon name="arrow_forward" class="w-4 h-4" />
                        </a>
                    </div>

                    @if (isset($capabilityStats) && count($capabilityStats) > 0)
                    <div class="pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-wrap gap-8">
                        @foreach ($capabilityStats as $stat)
                            <div>
                                <p class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $stat->value }}<span class="text-primary text-xl">{{ $stat->unit }}</span></p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold mt-0.5">{{ __($stat->label) }}</p>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Right Column: Stacked Service Cards -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Service 01 -->
                    <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-primary px-2.5 py-1 rounded bg-primary/10">01</span>
                            <span class="text-xs text-slate-400 font-semibold">High-Scale Web</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            <a href="/services/web-application-development" class="hover:text-primary transition-colors">
                                {{ __('Web Application Development') }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            {{ __('Portal operasional terintegrasi, back-office custom, dan sistem internal monolitik modern berbasis Laravel 12 yang stabil dan terbukti cepat.') }}
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-xs font-medium text-slate-500">
                            <span class="px-2 py-0.5 rounded bg-primary/10 text-primary font-semibold">{{ __('Strategi Produk') }}</span>
                            <span class="px-2 py-0.5 rounded bg-primary/10 text-primary font-semibold">{{ __('Custom Development') }}</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Laravel 12</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Tailwind v4</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Livewire & Alpine</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">PostgreSQL</span>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-800/60">
                            <a href="/services/web-application-development" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:gap-2 transition-all">
                                <span>{{ __('Learn more') }}</span>
                                <x-app-icon name="arrow_forward" class="w-3.5 h-3.5" />
                            </a>
                        </div>
                    </div>

                    <!-- Service 02 -->
                    <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-primary px-2.5 py-1 rounded bg-primary/10">02</span>
                            <span class="text-xs text-slate-400 font-semibold">Infrastructure</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            <a href="/services/cloud-architecture" class="hover:text-primary transition-colors">
                                {{ __('Cloud Architecture & Optimization') }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            {{ __('Konfigurasi server tahan beban, mitigasi downtime, optimalisasi indeks query database, dan automated backup untuk integritas data perusahaan.') }}
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-xs font-medium text-slate-500">
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">AWS / Cloud</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Docker</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Redis Cache</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Zero-Downtime</span>
                        </div>
                    </div>

                    <!-- Service 03 -->
                    <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-primary px-2.5 py-1 rounded bg-primary/10">03</span>
                            <span class="text-xs text-slate-400 font-semibold">Mobile App</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            <a href="/services/mobile-app-development" class="hover:text-primary transition-colors">
                                {{ __('Mobile App Development') }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            {{ __('Aplikasi mobile untuk tim lapangan, manajemen kurir, dan layanan pelanggan dengan sinkronisasi offline-first dan pengalaman pengguna responsif.') }}
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-xs font-medium text-slate-500">
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Flutter</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">React Native</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Offline-Sync</span>
                        </div>
                    </div>

                    <!-- Service 04 -->
                    <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold text-primary px-2.5 py-1 rounded bg-primary/10">04</span>
                            <span class="text-xs text-slate-400 font-semibold">UI/UX Design</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            <a href="/services/ui-ux-design" class="hover:text-primary transition-colors">
                                {{ __('UI/UX Design & Conversion Systems') }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                            {{ __('Desain antarmuka yang bersih, hierarki informasi tajam, dan alur checkout atau formulir yang memangkas friksi pengguna serta meningkatkan konversi.') }}
                        </p>
                        <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-xs font-medium text-slate-500">
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">Figma System</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">WCAG 2.2 AA</span>
                            <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800">User Testing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Bento Grid (NextSaaS Why Choose Us) -->
    <section class="py-24 bg-surface-light dark:bg-slate-900/60 border-y border-slate-200 dark:border-slate-800" aria-labelledby="why-us-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20 mb-4">
                    {{ __('Mengapa Accelerate Lab?') }}
                </span>
                <h2 id="why-us-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                    {{ __('Lebih dari Sekadar Pembuat Kode, Kami Mitra Rekayasa Teknologi Anda') }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mt-3">
                    {{ __('Standar teknis ketat yang membedakan produk software kami dari template generik.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <!-- Card 1: Strategy First (Col 7) -->
                <div class="md:col-span-7 p-8 rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6">
                            <x-app-icon name="explore" class="w-6 h-6" />
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-primary">{{ __('Strategi Produk') }}</span>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mt-1 mb-3">
                            {{ __('Bisnis dan Arsitektur Sejalan') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed max-w-lg">
                            {{ __('Kami menyelaraskan setiap baris kode dengan target operasional dan efisiensi biaya bisnis Anda, bukan sekadar mengikuti tren sesaat.') }}
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 flex items-center gap-4 text-xs text-slate-500">
                        <span class="font-semibold text-slate-700 dark:text-slate-300">Fokus:</span>
                        <span>Efisiensi Alur Kerja</span> • <span>Eliminasi Manual</span> • <span>ROI Terukur</span>
                    </div>
                </div>

                <!-- Card 2: Scalable Architecture (Col 5) -->
                <div class="md:col-span-5 p-8 rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6">
                            <x-app-icon name="speed" class="w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">
                            {{ __('Arsitektur Skalabel') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            {{ __('Dibangun di atas fondasi Laravel 12 yang clean dan terstruktur, siap menampung lonjakan traffic tanpa perlu perombakan total.') }}
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 text-xs font-mono text-primary font-bold">
                        LCP < 1.0s • 99.9% Uptime SLA
                    </div>
                </div>

                <!-- Card 3: Full-Cycle Testing (Col 5) -->
                <div class="md:col-span-5 p-8 rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6">
                            <x-app-icon name="verified" class="w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">
                            {{ __('Tested for High Reliability') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            {{ __('Penerapan Strict Test-Driven Development (TDD) menjamin setiap logika bisnis dan skenario transaksi teruji sebelum dideploy.') }}
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 text-xs font-mono text-slate-500">
                        Zero Regression • Automated PHPUnit
                    </div>
                </div>

                <!-- Card 4: Absolute Ownership (Col 7) -->
                <div class="md:col-span-7 p-8 rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-6">
                            <x-app-icon name="lock" class="w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">
                            {{ __('100% Full IP Ownership') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed max-w-lg">
                            {{ __('100% Source Code, konfigurasi database, dan hak akses server sepenuhnya diserahkan menjadi aset sah milik bisnis Anda tanpa biaya lisensi tersembunyi.') }}
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 flex items-center gap-4 text-xs text-slate-500">
                        <span class="font-semibold text-slate-700 dark:text-slate-300">{{ __('Kepemilikan Penuh Tanpa Keterikatan') }}:</span>
                        <span>Source Code</span> • <span>Database</span> • <span>Domain & Server</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Operational Transformation: Tantangan Manual vs. Sistem Kustom -->
    <section class="py-20 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800" aria-labelledby="comparison-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3">
                    <x-app-icon name="compare_arrows" class="w-3.5 h-3.5" />
                    {{ __('Transformasi Operasional Bisnis') }}
                </span>
                <h2 id="comparison-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">
                    {{ __('Tantangan Manual vs. Sistem Kustom') }}
                </h2>
                <p class="mt-3 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                    {{ __('Bandingkan bagaimana sistem kustom terintegrasi menyelesaikan kendala operasional yang sering menghambat bisnis berkembang.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Column 1: Manual / Spreadsheet Tercecer -->
                <div class="p-8 rounded-2xl bg-rose-50/50 dark:bg-rose-950/20 border border-rose-200 dark:border-rose-900/40 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-rose-500/10 text-rose-600 flex items-center justify-center">
                            <x-app-icon name="warning" class="w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('Tantangan Spreadsheet & Sistem Manual') }}</h3>
                            <p class="text-xs text-rose-600 dark:text-rose-400 font-medium">{{ __('Membatasi kecepatan dan rawan human error') }}</p>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Spreadsheet Tercecer') }}</strong>: {{ __('File bertumpuk di berbagai komputer, rawan terhapus atau tertukar versi rumus perhitungan.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Rekap Lambat') }}</strong>: {{ __('Staf menghabiskan 2-3 jam setiap sore hanya untuk mencocokkan nota manual dan laporan omzet harian.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Stok Gudang Selisih') }}</strong>: {{ __('Data barang di catatan admin tidak sesuai dengan kondisi riil di gudang fisik.') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 2: Custom Solution / Database Terpusat -->
                <div class="p-8 rounded-2xl bg-emerald-50/50 dark:bg-emerald-950/20 border border-emerald-200 dark:border-emerald-900/40 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                            <x-app-icon name="check_circle" class="w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('Solusi Sistem Kustom Terintegrasi') }}</h3>
                            <p class="text-xs text-emerald-600 dark:text-emerald-400 font-medium">{{ __('Otomatis, presisi, dan aset milik Anda 100%') }}</p>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Database Terpusat') }}</strong>: {{ __('Seluruh transaksi tercatat otomatis di satu database aman dengan hak akses per karyawan.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Invoicing Otomatis') }}</strong>: {{ __('Tagihan, surat jalan, dan laporan keuangan terbit seketika tanpa perlu rekap ulang manual.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Sinkronisasi Real-Time') }}</strong>: {{ __('Stok berkurang otomatis begitu pesanan terkonfirmasi, terintegrasi barcode scanner.') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Case Studies Showcase (Redox Portfolio Grid) -->
    <section class="py-24 bg-background-light dark:bg-background-dark" aria-labelledby="portfolio-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20 mb-4">
                        {{ __('Our Recent Projects') }}
                    </span>
                    <h2 id="portfolio-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                        {{ __('Karya Rekayasa Pilihan') }}
                    </h2>
                </div>
                <a href="/case-studies" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all text-sm">
                    <span>{{ __('Lihat Semua Portofolio') }}</span>
                    <x-app-icon name="arrow_forward" class="w-4 h-4" />
                </a>
            </div>

            <div id="featured-showcase-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $displayProjects = (isset($featuredProjects) && count($featuredProjects) > 0) ? $featuredProjects : ($recentProjects ?? collect());
                @endphp
                @if ($displayProjects->count() > 0)
                    @foreach ($displayProjects as $project)
                        <div class="group rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl transition-all flex flex-col justify-between">
                            <div>
                                <div class="relative h-56 bg-slate-100 dark:bg-slate-800 overflow-hidden">
                                    @if ($project->featured_image)
                                        <img src="{{ asset($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400 dark:text-slate-600 bg-slate-100 dark:bg-slate-800">
                                            <x-app-icon name="terminal" class="w-12 h-12" />
                                        </div>
                                    @endif
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-slate-900/80 backdrop-blur-md text-white border border-white/10">
                                        {{ $project->category ?? 'Web Application' }}
                                    </span>
                                </div>
                                <div class="p-6">
                                    <p class="text-xs font-semibold text-primary uppercase tracking-wider mb-1">{{ $project->client }}</p>
                                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">
                                        <a href="/case-studies/{{ $project->slug }}">{{ $project->title }}</a>
                                    </h3>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed line-clamp-2">
                                        {{ $project->summary ?? __('Pengembangan sistem enterprise kustom dengan efisiensi alur kerja optimal.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-6 pb-6 pt-2">
                                <a href="/case-studies/{{ $project->slug }}" class="inline-flex items-center text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-primary transition-colors gap-1.5">
                                    <span>{{ __('Lihat Bedah Teknis') }}</span>
                                    <x-app-icon name="arrow_forward" class="w-3.5 h-3.5" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 p-8 text-center text-slate-500 dark:text-slate-400 bg-surface-light dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-800">
                        {{ __('Portofolio sedang dimutakhirkan.') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Two-Tier Offer Ladder Section (Satisfies Commercial & OfferLadder Tests) -->
    <section class="py-24 bg-surface-light dark:bg-slate-900/40 border-t border-slate-200 dark:border-slate-800" aria-labelledby="pricing-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20 mb-4">
                    {{ __('Pilihan Solusi Sesuai Kebutuhan Bisnis Anda') }}
                </span>
                <h2 id="pricing-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                    {{ __('Model Kerja Sama Fleksibel dan Transparan') }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mt-3">
                    {{ __('Mulai dari paket kilat untuk bisnis lokal hingga sistem portal operasional terintegrasi penuh.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Tier 1: Express Starter -->
                <div class="p-8 sm:p-10 rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Tier 01</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-primary/10 text-primary">Selesai 24-48 Jam</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('Website Bisnis Express') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6">
                            {{ __('Website profil profesional berkecepatan tinggi, teroptimasi mobile, dan siap menerima pelanggan baru via WhatsApp dalam hitungan hari.') }}
                        </p>
                        <div class="mb-6">
                            <span class="text-xs text-slate-400 block font-semibold uppercase">Investasi Mulai Dari</span>
                            <span class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white">Rp 1.500.000</span>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-300 border-t border-slate-200 dark:border-slate-800 pt-6">
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Domain & Hosting Kencang Termasuk</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Optimasi Mobile & SEO On-Page Siap Indeks</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Integrasi Tombol WhatsApp & Google Maps</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode('Halo Accelerate Lab! Saya ingin pesan Website Bisnis Express.') }}" target="_blank" rel="noopener noreferrer"
                            class="w-full inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold hover:bg-primary dark:hover:bg-primary dark:hover:text-white transition-colors text-sm">
                            <span>{{ __('Pesan Website Express') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Tier 2: Custom Enterprise Portal -->
                <div class="p-8 sm:p-10 rounded-2xl bg-surface-light dark:bg-surface-dark border-2 border-primary shadow-xl relative flex flex-col justify-between">
                    <span class="absolute -top-3 right-8 px-3 py-1 rounded-full text-xs font-extrabold bg-primary text-slate-950 uppercase tracking-wider">
                        Rekomendasi Skala Usaha
                    </span>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-primary">Tier 02</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-500">100% Hak Milik</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('Portal Operasional dan Sistem Kustom') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6">
                            {{ __('Sistem web app kustom yang dirancang presisi mengikuti alur kerja bisnis: manajemen gudang, ERP mini, sistem membership, atau portal invoice.') }}
                        </p>
                        <div class="mb-6">
                            <span class="text-xs text-slate-400 block font-semibold uppercase">Biaya Transparan Berdasarkan Ruang Lingkup</span>
                            <span class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white">{{ __('Konsultasi Kebutuhan') }}</span>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-300 border-t border-slate-200 dark:border-slate-800 pt-6">
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Arsitektur Laravel 12 Berkinerja Tinggi</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Full Source Code & Database Hak Milik Perusahaan</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                                <span>Garansi Pemeliharaan & SLA Pasca Rilis</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a href="/contact" class="w-full inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-primary hover:bg-primary-dark text-slate-950 font-extrabold transition-colors text-sm shadow-md shadow-primary/20">
                            <span>{{ __('Konsultasi Kebutuhan Sistem') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Retainer Scope Comparison Matrix (NextSaaS Pricing Matrix Inspired) -->
            <div id="retainer-scope-matrix" class="mt-16 max-w-5xl mx-auto rounded-2xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200 dark:border-slate-800">
                    <div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white">{{ __('Model Kerja Sama: Proyek Sekali Jalan vs Retainer Bulanan') }}</h4>
                        <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">{{ __('Pilih skema pengerjaan yang paling cocok untuk fase pertumbuhan bisnis Anda.') }}</p>
                    </div>
                    <span class="inline-block px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 text-xs font-mono font-bold text-slate-600 dark:text-slate-300">SLA 99.9%</span>
                </div>

                <div class="mt-6 overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-800 text-slate-400 uppercase text-[11px] tracking-wider">
                                <th class="pb-3 font-semibold">Cakupan Rekayasa & Layanan</th>
                                <th class="pb-3 font-semibold text-center">Pengerjaan Proyek (One-Time)</th>
                                <th class="pb-3 font-semibold text-center text-primary">SEO & Engineering Retainer</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-slate-600 dark:text-slate-300">
                            <tr>
                                <td class="py-3.5 font-medium text-slate-900 dark:text-white">Pengembangan & Serah Terima Fitur Lengkap</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Tercakup</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Tercakup (Sprint Berkelanjutan)</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-medium text-slate-900 dark:text-white">100% Hak Milik Source Code & Database</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Tercakup</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Tercakup</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-medium text-slate-900 dark:text-white">Monitoring Core Web Vitals & Kecepatan Mingguan</td>
                                <td class="py-3.5 text-center text-slate-400">Garansi 30 Hari</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Monitoring Aktif Setiap Bulan</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-medium text-slate-900 dark:text-white">Optimasi SEO Berkelanjutan & Pemantauan Algoritma</td>
                                <td class="py-3.5 text-center text-slate-400">Fondasi Awal</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Strategi Retainer & Laporan Berkala</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 font-medium text-slate-900 dark:text-white">Alokasi Jam Senior Architect Khusus</td>
                                <td class="py-3.5 text-center text-slate-400">Sesuai Timeline Proyek</td>
                                <td class="py-3.5 text-center text-emerald-500 font-bold">Prioritas SLA Terjadwal</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- 3-Step Process Flow (NextSaaS Inspired) -->
    <section class="py-24 bg-background-light dark:bg-background-dark" aria-labelledby="process-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20 mb-4">
                    {{ __('How We Work') }}
                </span>
                <h2 id="process-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                    {{ __('Dari Konsep hingga Produksi Tanpa Birokrasi') }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mt-3">
                    {{ __('Metodologi tangkas yang memastikan proyek selesai tepat waktu dengan kualitas kode teruji.') }}
                </p>
            </div>

            <div id="process-step-indicator" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 01 -->
                <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 space-y-4">
                    <div class="w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-full rounded-full"></div>
                    </div>
                    <span class="text-sm font-mono font-bold text-primary">01</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ __('Audit Alur Kerja') }} & {{ __('Pemetaan Masalah') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        {{ __('Analisis mendalam proses bisnis, penentuan skema basis data, dan estimasi transparan langsung dengan principal architect.') }}
                    </p>
                </div>

                <!-- Step 02 -->
                <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 space-y-4">
                    <div class="w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-full rounded-full"></div>
                    </div>
                    <span class="text-sm font-mono font-bold text-primary">02</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ __('Strict TDD & Pengerjaan Cepat') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        {{ __('Pengembangan fitur dengan siklus test-driven development ketat dan sesi review demo interaktif setiap pekan.') }}
                    </p>
                </div>

                <!-- Step 03 -->
                <div class="p-8 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 space-y-4">
                    <div class="w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-full rounded-full"></div>
                    </div>
                    <span class="text-sm font-mono font-bold text-primary">03</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">{{ __('Rilis Produksi & Pemeliharaan') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        {{ __('Deploy ke server produksi, serah terima kepemilikan 100%, serta opsi retainer SLA pemantauan jangka panjang.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Objection-Busting FAQ Section (Alpine Accordion) -->
    <section class="py-24 bg-surface-light dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800" aria-labelledby="faq-heading">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider border border-primary/20 mb-4">
                    {{ __('FAQ') }}
                </span>
                <h2 id="faq-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white leading-tight">
                    {{ __('Pertanyaan yang Sering Diajukan') }}
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-base mt-3">
                    {{ __('Jawaban lugas seputar legalitas, kepemilikan kode, dan durasi pengerjaan.') }}
                </p>
            </div>

            <div class="space-y-4" x-data="{ openFaq: null }">
                <!-- FAQ 1 -->
                <div class="rounded-xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 p-6">
                    <button type="button" @click="openFaq = openFaq === 1 ? null : 1" class="w-full flex items-center justify-between text-left gap-4">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                            {{ __('Apakah ada biaya langganan bulanan tersembunyi?') }}
                        </h3>
                        <x-app-icon name="expand_more" class="w-5 h-5 text-slate-400 transition-transform" ::class="openFaq === 1 ? 'rotate-180 text-primary' : ''" />
                    </button>
                    <div x-show="openFaq === 1" x-collapse class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        {{ __('Tidak ada. Untuk pengerjaan proyek kustom, biaya disepakati di awal tanpa biaya langganan software tersembunyi. Opsi retainer bulanan hanya berlaku jika Anda memilih kontrak pemeliharaan berkelanjutan atau SEO retainer sukarela.') }}
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="rounded-xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 p-6">
                    <button type="button" @click="openFaq = openFaq === 2 ? null : 2" class="w-full flex items-center justify-between text-left gap-4">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                            {{ __('Berapa lama waktu pengerjaannya?') }}
                        </h3>
                        <x-app-icon name="expand_more" class="w-5 h-5 text-slate-400 transition-transform" ::class="openFaq === 2 ? 'rotate-180 text-primary' : ''" />
                    </button>
                    <div x-show="openFaq === 2" x-collapse class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        {{ __('Untuk Website Bisnis Express selesai dalam 24-48 jam kerja. Untuk sistem portal dan web app kustom berkisar antara 3 hingga 8 pekan tergantung kompleksitas modul yang disepakati.') }}
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="rounded-xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 p-6">
                    <button type="button" @click="openFaq = openFaq === 3 ? null : 3" class="w-full flex items-center justify-between text-left gap-4">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                            {{ __('Siapa yang memegang hak cipta source code dan database?') }}
                        </h3>
                        <x-app-icon name="expand_more" class="w-5 h-5 text-slate-400 transition-transform" ::class="openFaq === 3 ? 'rotate-180 text-primary' : ''" />
                    </button>
                    <div x-show="openFaq === 3" x-collapse class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        {{ __('100% hak cipta source code, repositori Git, dan database sepenuhnya milik perusahaan Anda. Kami tidak mengunci aset klien.') }}
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="rounded-xl bg-background-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 p-6">
                    <button type="button" @click="openFaq = openFaq === 4 ? null : 4" class="w-full flex items-center justify-between text-left gap-4">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                            {{ __('Apakah kerja sama dilengkapi kontrak dan legalitas resmi?') }}
                        </h3>
                        <x-app-icon name="expand_more" class="w-5 h-5 text-slate-400 transition-transform" ::class="openFaq === 4 ? 'rotate-180 text-primary' : ''" />
                    </button>
                    <div x-show="openFaq === 4" x-collapse class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        {{ __('Ya, seluruh proyek dikelola secara resmi di bawah badan hukum PT Akselerasi Digital Mandiri lengkap dengan Perjanjian Kerja Sama (PKS), NDA, dan faktur pajak resmi.') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing High-Impact Call-to-Action (Redox Style) -->
    <section id="closing-cta-section" class="py-24 bg-background-light dark:bg-background-dark relative overflow-hidden" aria-labelledby="cta-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="rounded-3xl bg-gradient-to-br from-slate-900 via-slate-900 to-slate-950 border border-slate-800 p-10 sm:p-16 text-center text-white shadow-2xl relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

                <div class="relative z-10 max-w-3xl mx-auto space-y-6">
                    <span class="inline-block px-3.5 py-1 rounded-full bg-primary/20 text-primary text-xs font-bold uppercase tracking-wider border border-primary/30">
                        {{ __('Mulai Transformasi Digital') }}
                    </span>
                    <h2 id="cta-heading" class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                        {{ __('Ready to Accelerate?') }}
                    </h2>
                    <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                        {{ __('Diskusikan kendala operasional Anda langsung dengan principal architect kami. Tanpa perantara sales, tanpa basa-basi teknis.') }}
                    </p>

                    <div class="pt-6 flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode($heroWaMsg) }}" target="_blank" rel="noopener noreferrer"
                            class="bg-[#25D366] hover:bg-[#20ba5a] text-white text-base sm:text-lg font-bold px-8 py-4 rounded-xl shadow-lg shadow-emerald-500/20 transition-all hover:scale-[1.02] flex items-center justify-center gap-2">
                            <x-app-icon name="chat" class="w-5 h-5 fill-current" />
                            <span>{{ __('Konsultasi via WhatsApp') }}</span>
                        </a>

                        <button type="button" @click="$dispatch('open-consultation-modal')"
                            class="bg-white/10 hover:bg-white/20 text-white border border-white/20 text-base sm:text-lg font-bold px-7 py-4 rounded-xl transition-all flex items-center justify-center gap-2">
                            <x-app-icon name="calendar_today" class="w-5 h-5 text-primary" />
                            <span>{{ __('Jadwalkan Diskusi 15 Menit') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
