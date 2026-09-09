@extends('frontend.components.layout', [
    'title' => $title ?? 'Accelerate Lab - Digital Innovation Agency',
    'description' => $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     HERO SECTION (70% Redox Creative Agency + 30% NextSaaS Metric Bar)
     ======================================================================== --}}
<section class="relative pt-8 pb-16 md:pt-14 md:pb-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
            
            {{-- Status Pill Badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
                <span>✦ ACCELERATE LAB // DIGITAL INNOVATION AGENCY</span>
            </div>

            {{-- Display Headline (Instrument Sans) --}}
            <h1 class="font-instrumentsans text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.08] mb-6">
                {{ $currentLocale === 'id' ? 'Membangun' : 'Engineering' }}
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent">
                    {{ $currentLocale === 'id' ? 'Perangkat Lunak Berkinerja Tinggi' : 'High-Impact Software' }}
                </span>
                {{ $currentLocale === 'id' ? '& Sistem Digital Strategis.' : '& Strategic Digital Systems.' }}
            </h1>

            {{-- Sub-Headline --}}
            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl max-w-2xl leading-relaxed mb-10">
                {{ $currentLocale === 'id'
                    ? 'Kami bermitra dengan perusahaan visioner dan scale-up untuk merancang, merekayasa, dan meluncurkan arsitektur web kustom, sistem cloud, dan aplikasi mobile kelas dunia.'
                    : 'We partner with visionary enterprises and high-growth scale-ups to design, architect, and deploy world-class web applications, cloud systems, and mobile architectures.' }}
            </p>

            {{-- Dual Kinetic CTA Buttons --}}
            <div class="flex flex-wrap items-center justify-center gap-4 mb-16">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Jadwalkan Konsultasi Teknis' : 'Schedule Technical Consultation' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Bersama Kami' : 'Let\'s Build Together' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Studi Kasus' : 'Explore Case Studies' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Portfolio Unggulan' : 'Featured Work' }}</span>
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
                            <span class="text-xs font-mono text-slate-400 uppercase">Architecture</span>
                            <p class="text-base font-semibold text-white mt-1">Monolithic Precision</p>
                            <span class="text-xs text-emerald-400 mt-2 block">Zero Latency • Alpine.js + Livewire</span>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-xs font-mono text-slate-400 uppercase">Cloud Pipeline</span>
                            <p class="text-base font-semibold text-white mt-1">Docker CI/CD Automated</p>
                            <span class="text-xs text-cyan-400 mt-2 block">Auto-healing • 99.99% Availability</span>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-xs font-mono text-slate-400 uppercase">Product Design</span>
                            <p class="text-base font-semibold text-white mt-1">Modern Bento Ergonomics</p>
                            <span class="text-xs text-teal-400 mt-2 block">Dark Void • Micro-Kinetic State</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Floating Metrics Bar (30% NextSaaS Blueprint) --}}
            <div class="w-full max-w-4xl mt-10 p-4 sm:p-6 rounded-2xl bg-white/75 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                @forelse($heroStats as $stat)
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span>{{ $stat->value }}</span>
                            <span class="text-sm font-mono text-[#00BFA5]">{{ $stat->unit }}</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ __($stat->label) }}</span>
                    </div>
                @empty
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">99.9%</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Garansi Uptime' : 'Uptime Guarantee' }}</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">50+</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Implementasi Enterprise' : 'Enterprise Deployments' }}</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">100%</span>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $currentLocale === 'id' ? 'Kepemilikan Kode Klien' : 'Client Code Ownership' }}</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>


{{-- ========================================================================
     CAPABILITIES BENTO GRID (30% NextSaaS Asymmetric Bento + 70% Redox Index)
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

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
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
                <div class="bento-card relative flex flex-col justify-between p-7 sm:p-8 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg {{ $loop->first ? 'md:col-span-2 lg:col-span-2' : '' }}">
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
     INTERACTIVE ARCHITECTURE SWITCHER (30% NextSaaS Blueprint Tabber)
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
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">MODERN MONOLITH & HYBRID SPA</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        High-Speed Laravel 12 + Tailwind v4 + Alpine.js
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Menghilangkan kompleksitas microservices yang berlebihan dengan arsitektur monolit modern teroptimasi. Rendering server-side instan, SEO sempurna, dan interaktivitas reaktif tanpa overhead framework JavaScript yang membengkak.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Response Time &lt; 50ms</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Strict TDD Test Suite</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Filament v3 CMS Powered</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ 100% WCAG 2.2 Accessible</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-emerald-400 overflow-x-auto">
                    <pre><code>// Production Architecture Benchmark
App::environment('production');
Benchmark::measure([
    'SSR Blade Hydration' => fn () => View::make('portal')->render(),
    'ORM Query Caching'   => fn () => Cache::tags(['services'])->remember(),
]);
// Results: 100% Success, 0 Memory Leaks</code></pre>
                </div>
            </div>

            {{-- Cloud Tab --}}
            <div x-show="activeTab === 'cloud'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">CLOUD & AUTOMATION</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Automated Docker CI/CD & Zero-Downtime Rollouts
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Infrastruktur cloud tangguh dengan kontainerisasi Docker, deployment tanpa downtime (*blue/green*), monitoring real-time, dan proteksi DDoS tingkat lanjut.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Automated SSL & WAF</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Daily Offsite Backups</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Multi-region Scaling</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ 99.99% Guaranteed SLA</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-cyan-400 overflow-x-auto">
                    <pre><code># Deployment Pipeline
stages: [lint, test, build, deploy]
pipeline:
  - run: php artisan test --parallel
  - run: docker build --target production -t app:prod
  - run: deploy:rolling --zero-downtime
# Status: DEPLOYED in 18.4s</code></pre>
                </div>
            </div>

            {{-- Mobile Tab --}}
            <div x-show="activeTab === 'mobile'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">CROSS-PLATFORM MOBILE</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Flutter & React Native Enterprise Engineering
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Aplikasi seluler berkinerja tinggi untuk iOS dan Android dengan basis kode tunggal yang efisien. Animasi 60 FPS halus, integrasi pembayaran digital, dan sinkronisasi data offline.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Native Device Hardware API</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Offline-first Sync</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Biometric Security</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ App Store Automated Delivery</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-950 p-6 border border-slate-800 text-xs font-mono text-teal-400 overflow-x-auto">
                    <pre><code>// Mobile Synchronization Stream
StreamBuilder<DeviceState>(
  stream: HardwareService.observeBiometrics(),
  builder: (context, snapshot) => FastSecureGateway(
    latency: Duration(milliseconds: 14),
    status: SecurityStatus.authenticated,
  ),
);</code></pre>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ========================================================================
     SELECTED WORK / CASE STUDIES (70% Redox Portfolio Grid)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
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
                <div class="bento-card group relative overflow-hidden bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl">
                    {{-- Project Image / Visual Container --}}
                    <div class="relative h-64 sm:h-80 w-full overflow-hidden bg-slate-950">
                        @if(!empty($project->image))
                            <img src="{{ asset('storage/' . $project->image) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-600 font-mono text-sm">
                                [Accelerate Lab System Blueprint]
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        
                        {{-- Client Tag --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-black/60 text-[#00BFA5] backdrop-blur-md border border-white/10">
                                {{ $project->client ?? 'ENTERPRISE CLIENT' }}
                            </span>
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
     CLIENT TESTIMONIALS (70% Redox Quote Cards)
     ======================================================================== --}}
@if($testimonials->isNotEmpty())
    <section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    03 // {{ $currentLocale === 'id' ? 'TESTIMONI REKANAN' : 'CLIENT EXPERIENCES' }}
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
