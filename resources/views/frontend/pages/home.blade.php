@extends('frontend.components.layout', [
    'title' => $title ?? 'Accelerate Lab - Digital Innovation Agency',
    'description' => $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     HERO SECTION (Accelerate Studio Hero & Kinetic Metric Bar)
     ======================================================================== --}}
<section class="relative pt-8 pb-16 md:pt-14 md:pb-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto fade-anim" data-direction="bottom">
            
            {{-- Status Pill Badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
                <span>✦ ACCELERATE LAB // DIGITAL INNOVATION AGENCY</span>
            </div>

            {{-- Display Headline (Instrument Sans) --}}
            <h1 class="font-instrumentsans text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.08] mb-6">
                {{ $currentLocale === 'id' ? 'Mitra Inovasi Digital untuk' : 'Strategic Innovation Partner for' }}
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent">
                    {{ $currentLocale === 'id' ? 'Akselerasi Pertumbuhan' : 'Business Growth' }}
                </span>
                {{ $currentLocale === 'id' ? '& Efisiensi Bisnis.' : '& Enterprise Scalability.' }}
            </h1>

            {{-- Sub-Headline --}}
            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl max-w-2xl leading-relaxed mb-10">
                {{ $currentLocale === 'id'
                    ? 'Kami bermitra dengan para pemimpin industri dan bisnis bertumbuh untuk merancang sistem digital yang memecahkan masalah nyata, meningkatkan pendapatan, dan mengotomasi alur kerja operasional.'
                    : 'We partner with industry leaders and high-growth businesses to engineer digital systems that solve real problems, accelerate revenue, and automate operational workflows.' }}
            </p>

            {{-- Dual Kinetic CTA Buttons --}}
            <div class="flex flex-wrap items-center justify-center gap-4 mb-16">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Konsultasi Solusi Bisnis' : 'Schedule Business Consultation' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Diskusi' : 'Start Conversation' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Pelajari Hasil Nyata' : 'Explore Proven Impact' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Portofolio Klien' : 'Featured Case Studies' }}</span>
                    </span>
                </a>
            </div>

            {{-- Hero Visual Canvas Frame with Rotating Emblem --}}
            <div class="relative w-full max-w-5xl rounded-3xl border border-slate-200/80 dark:border-white/10 bg-slate-900/5 dark:bg-slate-900/40 backdrop-blur-xl p-3 sm:p-5 shadow-2xl overflow-visible">
                
                {{-- Authentic Rotating Brand Emblem (.badge-spin) --}}
                <div class="absolute -top-10 -right-4 sm:-top-12 sm:-right-8 z-30 pointer-events-none select-none">
                    <svg class="badge-spin w-24 h-24 sm:w-32 sm:h-32" viewBox="0 0 160 160">
                        <path id="curve-circle" fill="transparent" d="M 80, 80 m -60, 0 a 60,60 0 1,1 120,0 a 60,60 0 1,1 -120,0" />
                        <text class="text-[10px] font-mono font-bold tracking-[0.22em] fill-slate-800 dark:fill-slate-200 uppercase">
                            <textPath xlink:href="#curve-circle" startOffset="0%">
                                • ACCELERATE LAB • ENGINEERING STUDIO • 2026 •
                            </textPath>
                        </text>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-auto">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-[#00BFA5] text-[#090D16] flex items-center justify-center font-mono font-bold text-xs shadow-lg">
                            /&gt;
                        </div>
                    </div>
                </div>

                {{-- Inner Frame Mockup / Blueprint --}}
                <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-slate-900 to-slate-950 border border-slate-800 p-6 sm:p-10 text-left">
                    <div class="flex items-center justify-between pb-6 border-b border-slate-800 text-xs font-mono text-slate-400">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                            <span class="ml-2 text-slate-500">accelerate-engine://v2.4.0</span>
                        </div>
                        <span class="text-[#00BFA5]">🟢 CLUSTER ACTIVE</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-xs font-mono text-slate-400 uppercase">Pilar Dampak</span>
                            <p class="text-base font-semibold text-white mt-1">Pertumbuhan Omzet</p>
                            <span class="text-xs text-emerald-400 mt-2 block">Otomasi Konversi • Transaksi Tanpa Hambatan</span>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-xs font-mono text-slate-400 uppercase">Pilar Dampak</span>
                            <p class="text-base font-semibold text-white mt-1">Efisiensi Operasional</p>
                            <span class="text-xs text-cyan-400 mt-2 block">Integrasi Sistem • Hemat Jam Kerja Manual</span>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-xs font-mono text-slate-400 uppercase">Pilar Dampak</span>
                            <p class="text-base font-semibold text-white mt-1">Keamanan & Keandalan</p>
                            <span class="text-xs text-teal-400 mt-2 block">Perlindungan Enterprise • Kesiapan Skala Penuh</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Accelerate Floating Metrics Bar --}}
            <div class="w-full max-w-4xl mt-10 p-4 sm:p-6 rounded-2xl bg-white/75 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                @forelse($heroStats as $stat)
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span class="t-counter">{{ $stat->value }}</span>
                            <span class="text-sm font-mono text-[#00BFA5]">{{ $stat->unit }}</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ __($stat->label) }}</span>
                    </div>
                @empty
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white t-counter">99.9%</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Garansi Uptime' : 'Uptime Guarantee' }}</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white t-counter">50+</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Implementasi Enterprise' : 'Enterprise Deployments' }}</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white t-counter">100%</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Kepemilikan Kode Klien' : 'Client Code Ownership' }}</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>


{{-- ========================================================================
     CAPABILITIES BENTO GRID (Accelerate Dynamic Bento Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(isset($capabilityStats) && $capabilityStats->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10 p-4 rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/80 dark:border-white/10">
                @foreach($capabilityStats as $cStat)
                    <div class="text-center">
                        <div class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">
                            {{ $cStat->value }}{{ $cStat->unit }}
                        </div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                            {{ __($cStat->label) }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    01 // {{ $currentLocale === 'id' ? 'KEAHLIAN TEKNIS' : 'CORE CAPABILITIES' }}
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    {{ $currentLocale === 'id' ? 'Layanan Rekayasa Digital Penuh' : 'End-to-End Digital Engineering' }}
                </h2>
            </div>
            <a href="{{ route('services') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Semua Layanan' : 'View All Services' }}</span>
                    <span class="text-2">{{ $currentLocale === 'id' ? 'Jelajahi Kapabilitas' : 'Explore Stack' }}</span>
                </span>
            </a>
        </div>

        {{-- Bento Grid Looped from CMS Services --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $index => $service)
                <div class="bento-card relative flex flex-col justify-between p-7 sm:p-8 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg fade-anim {{ $loop->first ? 'md:col-span-2 lg:col-span-2' : '' }}" data-direction="bottom">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="font-mono text-xs font-bold text-[#00BFA5]">
                                0{{ $index + 1 }} // {{ strtoupper($service->category ?? 'DEVELOPMENT') }}
                            </span>
                            <div class="w-9 h-9 rounded-full bg-[#00BFA5]/10 text-[#00BFA5] flex items-center justify-center font-mono text-xs font-bold">
                                /&gt;
                            </div>
                        </div>

                        <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-3">
                            {{ $service->title }}
                        </h3>

                        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                            {{ $service->short_description }}
                        </p>

                        @if(!empty($service->features) && is_array($service->features))
                            <div class="space-y-2 mb-6 pt-4 border-t border-slate-100 dark:border-white/5">
                                @foreach(array_slice($service->features, 0, 3) as $feat)
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-700 dark:text-slate-300">
                                        <span class="text-[#00BFA5]">✓</span>
                                        <span>{{ is_array($feat) ? ($feat['title'] ?? '') : $feat }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-slate-100 dark:border-white/5">
                        <span class="text-xs font-mono text-slate-400">Enterprise Standard</span>
                        <a href="{{ route('service', $service->slug) }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs font-semibold">
                            <span class="btn-wrap">
                                <span class="text-1">{{ $currentLocale === 'id' ? 'Detail Layanan' : 'View Details' }}</span>
                                <span class="text-2">{{ $currentLocale === 'id' ? 'Pelajari Lebih Lanjut' : 'Learn More' }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ========================================================================
     INTERACTIVE ARCHITECTURE SWITCHER (Accelerate Blueprint Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-100/50 dark:bg-slate-950/40 relative"
         x-data="{ activeTab: 'web' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                SYSTEM ARCHITECTURE BLUEPRINT
            </span>
            <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                {{ $currentLocale === 'id' ? 'Standar Rekayasa Kelas Enterprise' : 'Engineered for High-Concurrence Workloads' }}
            </h2>
        </div>

        {{-- Tab Switcher Bar --}}
        <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
            <button @click="activeTab = 'web'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'web' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Full-Stack Web Systems
            </button>
            <button @click="activeTab = 'cloud'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'cloud' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Cloud Infrastructure & DevOps
            </button>
            <button @click="activeTab = 'mobile'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'mobile' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Native & Cross-Platform Mobile
            </button>
        </div>

        {{-- Tab Panels --}}
        <div class="bento-card p-6 sm:p-10 bg-white/90 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-2xl">
            {{-- Web Tab --}}
            <div x-show="activeTab === 'web'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">SOLUSI PLATFORM DIGITAL</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Platform Web Berkinerja Tinggi & Otomasi Transaksi Bisnis
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Menghadirkan portal web dan sistem transaksi interaktif yang cepat, aman, dan siap menangani jutaan pengguna. Arsitektur teroptimasi memastikan konversi maksimal tanpa hambatan teknis.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Waktu Respon Cepat &lt; 50ms</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Perlindungan Keamanan Enterprise</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Dasbor Manajemen Bisnis Intuitif</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ 100% Aksesibel & Siap Konversi</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-emerald-400 overflow-x-auto">
                    <pre><code>// Indikator Kinerja & Dampak Bisnis
StatusSistem::pantau([
    'Waktu Muat Rata-rata' => '42ms',
    'Tingkat Sukses Transaksi' => '99.99%',
    'Peningkatan Konversi Penjualan' => '+148%',
]);
// Hasil: Efisiensi Maksimal, Bebas Hambatan Operasional</code></pre>
                </div>
            </div>

            {{-- Cloud Tab --}}
            <div x-show="activeTab === 'cloud'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">KEANDALAN INFRASTRUKTUR</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Infrastruktur Cloud Tangguh & Ketahanan Operasional Bisnis
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Fondasi komputasi berdaya tahan tinggi yang siap bertumbuh seiring ekspansi bisnis Anda. Memastikan layanan Anda selalu online tanpa interupsi, bahkan saat lonjakan transaksi jutaan pengguna.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Perlindungan Data & Keamanan Siber</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Pencadangan Data Harian Otomatis</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Skalabilitas Fleksibel Tanpa Batas</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Jaminan Uptime Layanan 99.99%</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-cyan-400 overflow-x-auto">
                    <pre><code># Telemetri Ketahanan Operasional
parameter_keandalan:
  - metrik: waktu_aktif_tahunan
    nilai: 99.99%
  - pemulihan_otomatis: aktif
  - enkripsi_data: standar_perbankan
# Status: 100% OPERASIONAL SEMPURNA</code></pre>
                </div>
            </div>

            {{-- Mobile Tab --}}
            <div x-show="activeTab === 'mobile'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">APLIKASI PENGGUNA</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Aplikasi Seluler Responsif untuk Retensi & Kepuasan Pelanggan
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Membangun kehadiran merek Anda langsung di genggaman pelanggan dengan pengalaman seluler yang mulus dan intuitif di iOS dan Android. Mendorong loyalitas, frekuensi transaksi, dan kepuasan pengguna.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Antarmuka Pengguna Halus & Responsif</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Notifikasi Promo & Update Langsung</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Keamanan Autentikasi Biometrik</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Integrasi Alur Pembayaran Digital</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-teal-400 overflow-x-auto">
                    <pre><code>// Metrik Pengalaman & Retensi Pelanggan
AnalitikAplikasi::evaluasi([
    'Rating Kepuasan Pengguna' => '4.9 / 5.0',
    'Waktu Alur Transaksi' => '3 Detik',
    'Peningkatan Transaksi Berulang' => '+215%',
]);
// Status: Pengalaman Pengguna Optimal</code></pre>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ========================================================================
     SELECTED WORK / CASE STUDIES (Accelerate Portfolio Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    02 // {{ $currentLocale === 'id' ? 'PORTFOLIO KAMI' : 'SELECTED PORTFOLIO' }}
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    {{ $currentLocale === 'id' ? 'Hasil Karya Nyata & Berdampak' : 'Proven Track Record & Case Studies' }}
                </h2>
            </div>
            <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Semua Portfolio' : 'View All Projects' }}</span>
                    <span class="text-2">{{ $currentLocale === 'id' ? 'Jelajahi Studi Kasus' : 'Explore Case Studies' }}</span>
                </span>
            </a>
        </div>

        {{-- Projects Looped from CMS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($recentProjects as $project)
                <div class="bento-card group relative overflow-hidden bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl fade-anim" data-direction="bottom">
                    {{-- Project Image / Visual Container --}}
                    <div class="relative h-64 sm:h-80 w-full overflow-hidden bg-slate-950">
                        @php
                            $projectImage = $project->image_path ?? $project->image;
                        @endphp
                        @if(!empty($projectImage))
                            <img src="{{ asset('storage/' . $projectImage) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-600 font-mono text-sm">
                                [Accelerate Lab System Blueprint]
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        
                        {{-- Client Tag & Industry --}}
                        <div class="absolute top-4 left-4 flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-black/60 text-[#00BFA5] backdrop-blur-md border border-white/10">
                                {{ $project->client ?? 'ENTERPRISE CLIENT' }}
                            </span>
                            @if(!empty($project->industry))
                                <span class="px-3 py-1 rounded-full text-xs font-mono font-medium bg-white/10 text-white backdrop-blur-md border border-white/10">
                                    {{ $project->industry }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Project Content --}}
                    <div class="p-6 sm:p-8">
                        <h3 class="font-instrumentsans text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-[#00BFA5] transition-colors">
                            {{ $project->title }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ $project->description }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-white/5">
                            <span class="text-xs font-mono text-slate-400">Production Deployed</span>
                            <a href="{{ route('project', $project->slug) }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs font-semibold">
                                <span class="btn-wrap">
                                    <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Studi Kasus' : 'View Case Study' }}</span>
                                    <span class="text-2">{{ $currentLocale === 'id' ? 'Pelajari Arsitektur' : 'Learn Architecture' }}</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 p-12 text-center text-slate-400 font-mono">
                    No projects currently published.
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ========================================================================
     LATEST INSIGHTS & DISPATCHES (Accelerate Technical Papers Matrix)
     ======================================================================== --}}
@if(isset($latestArticles) && $latestArticles->isNotEmpty())
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    03 // {{ $currentLocale === 'id' ? 'WAWASAN & RISET' : 'LATEST INSIGHTS' }}
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    {{ $currentLocale === 'id' ? 'Catatan Rekayasa & Praktik Terbaik' : 'Engineering Notes & Architectural Field Notes' }}
                </h2>
            </div>
            <a href="{{ route('blog') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Semua Artikel' : 'View All Insights' }}</span>
                    <span class="text-2">{{ $currentLocale === 'id' ? 'Jelajahi Wawasan' : 'Explore Articles' }}</span>
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestArticles as $art)
                <div class="bento-card p-6 sm:p-7 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg flex flex-col justify-between fade-anim" data-direction="bottom">
                    <div>
                        <div class="flex items-center gap-2 mb-3 text-xs font-mono">
                            @if($art->category)
                                <span class="px-2.5 py-1 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] font-semibold">
                                    {{ $art->category->name }}
                                </span>
                            @endif
                            <span class="text-slate-400">
                                {{ $art->published_at ? $art->published_at->format('M d, Y') : '' }}
                            </span>
                        </div>
                        <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mb-2 hover:text-[#00BFA5] transition-colors">
                            <a href="{{ route('article', $art->slug) }}">
                                {{ $art->title }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($art->content), 100) }}
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-white/5">
                        <a href="{{ route('article', $art->slug) }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold text-[#00BFA5] hover:underline">
                            <span>{{ $currentLocale === 'id' ? 'Baca Artikel' : 'Read Paper' }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ========================================================================
     CLIENT TESTIMONIALS (Accelerate Client Feedback Cards)
     ======================================================================== --}}
@if($testimonials->isNotEmpty())
    <section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    04 // {{ $currentLocale === 'id' ? 'TESTIMONI REKANAN' : 'CLIENT EXPERIENCES' }}
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    {{ $currentLocale === 'id' ? 'Dipercaya oleh Para Pemimpin Bisnis' : 'Trusted by Visionary Leaders' }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                    <div class="bento-card p-7 sm:p-8 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg flex flex-col justify-between">
                        <div>
                            {{-- 5-star rating --}}
                            <div class="flex items-center gap-1 text-[#00BFA5] mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <blockquote class="text-slate-700 dark:text-slate-300 text-sm sm:text-base leading-relaxed mb-6 italic">
                                "{{ $testimonial->quote }}"
                            </blockquote>
                        </div>
                        <div class="pt-4 border-t border-slate-100 dark:border-white/5 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#00BFA5]/15 text-[#00BFA5] font-bold font-mono flex items-center justify-center">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-instrumentsans text-sm font-bold text-slate-900 dark:text-white">{{ $testimonial->client_name }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 font-mono">{{ $testimonial->client_role }} • {{ $testimonial->client_company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection
