@extends('frontend.components.layout', ['title' => 'Accelerate Lab - Digital Innovation Agency'])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "WebSite",
    "name": "Accelerate Lab",
    "url": "{{ config('app.url') }}",
    "description": "The digital innovation partner for forward-thinking enterprises. We engineer high-performance web applications that drive growth.",
    "potentialAction": {
        "{{ '@' }}type": "SearchAction",
        "target": "{{ url('/blog') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush

@section('content')
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden bg-grid-pattern" aria-labelledby="hero-heading">
        <div
            class="hidden sm:block absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[60px] lg:blur-[100px] animate-pulse-slow -z-10" aria-hidden="true">
        </div>
        <div
            class="hidden sm:block absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[60px] lg:blur-[100px] animate-pulse-slow -z-10" aria-hidden="true">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left animate-fade-in-up">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 shadow-sm mb-8">
                        <span class="relative flex h-2 w-2" aria-hidden="true">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span
                            class="text-xs font-bold text-primary tracking-wide uppercase">{{ __('Tersedia untuk Proyek Baru Kuartal Ini') }}</span>
                    </div>
                    <h1 id="hero-heading"
                        class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-6 leading-tight">
                        {{ __('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom yang Mempercepat Pertumbuhan Usaha Anda') }}
                    </h1>
                    <p
                        class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto lg:mx-0 mb-10 leading-relaxed">
                        {{ __('Tinggalkan sistem manual yang kaku dan spreadsheet yang tercecer. Kami merancang website profil berkonversi tinggi dan portal bisnis modern yang rapi, cepat, dan menjadi aset milik Anda selamanya.') }}
                    </p>
                    @php
                        $heroWaPhone = preg_replace('/[^0-9]/', '', ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: '6287721312985'));
                        $heroWaMsg = __('Halo Accelerate Lab! Saya ingin konsultasi mengenai pembuatan sistem software kustom untuk bisnis saya.');
                    @endphp
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode($heroWaMsg) }}" target="_blank" rel="noopener noreferrer" id="hero-cta-primary"
                            class="bg-[#25D366] hover:bg-[#20ba5a] text-white text-base sm:text-lg font-bold px-7 py-4 rounded-xl shadow-lg shadow-emerald-500/20 transition-all hover:scale-[1.02] flex items-center justify-center gap-2 group">
                            <x-app-icon name="chat" class="w-5 h-5 fill-current" />
                            <span>{{ __('Konsultasi Gratis via WhatsApp') }}</span>
                        </a>
                        <a href="/contact" id="hero-cta-secondary"
                            class="bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-700 hover:border-primary text-base sm:text-lg font-bold px-7 py-4 rounded-xl transition-all hover:shadow-md flex items-center justify-center gap-2">
                            <x-app-icon name="calculate" class="w-5 h-5 text-primary" />
                            <span>{{ __('Hitung Estimasi Kebutuhan') }}</span>
                        </a>
                    </div>
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
                    @if (isset($heroStats) && count($heroStats) > 0)
                    <div
                        class="mt-12 flex items-center justify-center lg:justify-start gap-8 border-t border-slate-200 dark:border-slate-800 pt-8 opacity-80">
                            @foreach ($heroStats as $stat)
                                <div>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stat->value }}<span
                                            class="text-primary text-xl">{{ $stat->unit }}</span></p>
                                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                                        {{ $stat->label }}</p>
                                </div>
                                @if (!$loop->last)
                                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-700" aria-hidden="true"></div>
                                @endif
                            @endforeach
                    </div>
                    @endif
                </div>
                <div class="relative hidden lg:block w-full [perspective:1000px]" aria-hidden="true">
                    <div class="relative w-full max-w-lg mx-auto bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden animate-float z-20">
                        <div class="flex items-center justify-between px-6 py-4 bg-slate-50/80 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-800">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                    <x-app-icon name="dashboard" class="w-4 h-4" />
                                </div>
                                <div>
                                    <h2 class="text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-white">Portal Operasional Bisnis</h2>
                                    <p class="text-[11px] text-slate-500">Sinkronisasi Multi-Gudang & Cabang</p>
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
                                    <p class="text-xs text-slate-500 font-medium mb-1">Pesanan Terproses</p>
                                    <div class="flex items-baseline gap-2">
                                        <span class="text-2xl font-black text-slate-900 dark:text-white">1,420+</span>
                                        <span class="text-xs font-bold text-emerald-500">+18% bln ini</span>
                                    </div>
                                    <div class="mt-2 w-full bg-slate-200 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-primary h-full rounded-full" style="width: 82%"></div>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                                    <p class="text-xs text-slate-500 font-medium mb-1">Akurasi Inventori</p>
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

                    <div class="absolute -bottom-4 -left-6 bg-surface-light dark:bg-surface-dark rounded-full shadow-xl border border-slate-200 dark:border-slate-700 py-2.5 px-5 flex items-center gap-3 animate-float-delayed z-30">
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

    <!-- Industry Focus Marquee (Replacing Developer Tech Stack Logos) -->
    <div
        class="w-full bg-white dark:bg-slate-900 border-y border-gray-100 dark:border-gray-800 py-6 overflow-hidden relative" aria-label="Fokus Solusi Industri" role="marquee">
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white dark:from-slate-900 to-transparent z-10" aria-hidden="true">
        </div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white dark:from-slate-900 to-transparent z-10" aria-hidden="true">
        </div>
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-10 mx-6 text-sm sm:text-base font-bold text-slate-500 dark:text-slate-400 tracking-wider">
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
    <section class="py-24 bg-background-light dark:bg-background-dark" aria-labelledby="capabilities-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h2 id="capabilities-heading" class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">{{ __('Solusi Unggulan Kami') }}</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg max-w-2xl">{{ __('Kami tidak sekadar menulis kode, kami membangun aset digital yang tangguh untuk bisnis Anda.') }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[minmax(300px,auto)]">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 md:col-span-2">
                    <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity" aria-hidden="true">
                        <x-app-icon name="radar" class="w-[150px] h-[150px] text-primary transform rotate-12" />
                    </div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                                <x-app-icon name="explore" class="w-6 h-6 text-primary" />
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">{{ __('Perancangan Solusi Digital') }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed max-w-md">
                                {{ __('Dari validasi kebutuhan hingga peta jalan sistem berskala enterprise. Kami mematangkan arsitektur solusi bisnis sebelum satu baris kode ditulis.') }}
                            </p>
                        </div>
                        <a class="inline-flex items-center text-primary font-semibold mt-8 group-hover:translate-x-2 transition-transform"
                            href="/services">
                            {{ __('Pelajari Selengkapnya') }} <x-app-icon name="arrow_forward" class="w-4 h-4 ml-1" />
                        </a>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 flex flex-col justify-between">
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div
                                class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                                <x-app-icon name="code" class="w-6 h-6 text-primary" />
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">{{ __('Pengembangan Web dan Aplikasi Kustom') }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                                {{ __('Kami tidak terkunci pada satu teknologi kaku. Kami memilih arsitektur terbaik untuk setiap alur kerja bisnis, memastikan stabilitas, kecepatan, dan fleksibilitas penuh.') }}
                            </p>
                        </div>
                        <div class="mt-8 flex items-center gap-2 text-xs font-semibold text-primary">
                            <x-app-icon name="check_circle" class="w-4 h-4" />
                            <span>{{ __('100% Sesuai Kebutuhan Bisnis') }}</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group md:col-span-3 relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 flex items-center">
                        @if (isset($capabilityStats) && count($capabilityStats) > 0)
                        <div
                            class="grid grid-cols-1 sm:grid-cols-3 w-full gap-8 divide-y sm:divide-y-0 sm:divide-x divide-slate-100 dark:divide-slate-700">
                            @foreach ($capabilityStats as $stat)
                                <div class="text-center pt-4 sm:pt-0">
                                    <p class="text-4xl font-extrabold text-slate-900 dark:text-white mb-1">
                                        {{ $stat->value }}<span
                                            class="text-primary text-2xl ml-1">{{ $stat->unit }}</span></p>
                                    <p
                                        class="text-sm text-slate-500 dark:text-slate-400 font-medium uppercase tracking-wide">
                                        {{ __($stat->label) }}</p>
                                </div>
                            @endforeach
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Tantangan Manual vs. Sistem Kustom --}}
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
                            <span><strong>{{ __('Spreadsheet Tercecer') }}</strong>: File bertumpuk di berbagai komputer, rawan terhapus atau tertukar versi rumus perhitungan.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Rekap Lambat') }}</strong>: Staf menghabiskan 2-3 jam setiap sore hanya untuk mencocokkan nota manual dan laporan omzet harian.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Stok Gudang Selisih') }}</strong>: Data barang di catatan admin tidak sesuai dengan kondisi riil di gudang fisik.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="close" class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Visibilitas Buta') }}</strong>: Pemilik bisnis kesulitan memantau laba rugi dan kinerja cabang saat sedang berada di luar kantor.</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 2: Sistem Kustom Accelerate Lab -->
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
                            <span><strong>{{ __('Database Terpusat') }}</strong>: Seluruh transaksi tercatat otomatis di satu database aman dengan hak akses per karyawan.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Invoicing Otomatis') }}</strong>: Tagihan, surat jalan, dan laporan keuangan terbit seketika tanpa perlu rekap ulang manual.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Sinkronisasi Real-Time') }}</strong>: Stok berkurang otomatis begitu pesanan terkonfirmasi, terintegrasi barcode scanner.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <span><strong>{{ __('Pantau dari Handphone') }}</strong>: Dashboard pemilik bisnis dapat diakses 24/7 secara real-time dari mana saja.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- How We Work --}}
    <section class="py-16 bg-slate-50 dark:bg-slate-900/50 border-y border-slate-200 dark:border-slate-800" aria-labelledby="how-we-work-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="how-we-work-heading" class="text-2xl font-bold text-slate-900 dark:text-white">{{ __('How We Work') }}</h2>
                <p class="mt-2 text-slate-500 dark:text-slate-400">{{ __('Alur Kerja Transparan dan Berorientasi Hasil') }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative flex flex-col items-center text-center p-6 bg-white dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <x-app-icon name="search" class="w-6 h-6 text-primary" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Audit Alur Kerja & Pemetaan Masalah') }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Kami menganalisis alur operasional harian Anda secara detail untuk menemukan titik hambatan dan merancang solusi paling efektif.') }}</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <x-app-icon name="chevron_right" class="w-6 h-6" />
                    </div>
                </div>
                <div class="relative flex flex-col items-center text-center p-6 bg-white dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <x-app-icon name="palette" class="w-6 h-6 text-primary" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Prototipe Antarmuka yang Bisa Dicoba') }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Anda menguji langsung rancangan antarmuka dan alur sistem sebelum kode dibangun, memastikan kemudahan penggunaan tim Anda.') }}</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <x-app-icon name="chevron_right" class="w-6 h-6" />
                    </div>
                </div>
                <div class="relative flex flex-col items-center text-center p-6 bg-white dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <x-app-icon name="code" class="w-6 h-6 text-primary" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Pembangunan Sistem & Uji Ketahanan') }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Sistem dibangun dengan arsitektur tangguh, pengujian otomatis berstandar industri, dan keamanan data teruji.') }}</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <x-app-icon name="chevron_right" class="w-6 h-6" />
                    </div>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <x-app-icon name="rocket_launch" class="w-6 h-6 text-primary" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Migrasi Data & Pelatihan Karyawan') }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Pendampingan menyeluruh saat peluncuran, pemindahan data lama tanpa kendala, dan pelatihan staf hingga lancar.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Offer Ladder Section --}}
    <section class="py-24 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800" aria-labelledby="offer-ladder-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3">
                    <x-app-icon name="layers" class="w-3.5 h-3.5" />
                    {{ __('Pilihan Layanan') }}
                </span>
                <h2 id="offer-ladder-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">
                    {{ __('Pilihan Solusi Sesuai Kebutuhan Bisnis Anda') }}
                </h2>
                <p class="mt-3 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                    {{ __('Mulai dari kehadiran digital kilat untuk menjaring pelanggan lokal, hingga portal sistem mandiri yang mengotomasi seluruh alur operasional usaha.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                <!-- Tier 1: Website Bisnis Express -->
                <div class="relative flex flex-col justify-between p-8 sm:p-10 rounded-2xl bg-surface-light dark:bg-surface-dark border border-emerald-500/30 shadow-lg hover:shadow-xl transition-all">
                    <div class="absolute top-6 right-6">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            {{ __('24-48 Jam Siap Tayang') }}
                        </span>
                    </div>
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center mb-6">
                            <x-app-icon name="bolt" class="w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('Website Bisnis Express') }}
                        </h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                            {{ __('Pondasi profil digital instan untuk katering, rental kendaraan, jasa profesional, dan toko lokal agar langsung dipercaya calon pelanggan.') }}
                        </p>
                        <div class="mb-6 pb-6 border-b border-slate-200 dark:border-slate-800">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-1">{{ __('Investasi Mulai') }}</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white">Rp 1.500.000</span>
                                <span class="text-xs text-slate-500 font-medium">{{ __('all-in tahun pertama') }}</span>
                            </div>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-700 dark:text-slate-300 mb-8">
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                                <span>{{ __('Desain responsif mobile super cepat dan elegan') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                                <span>{{ __('Integrasi tombol pemesanan WhatsApp langsung') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                                <span>{{ __('Gratis setup domain .com dan cloud hosting tahun pertama') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                                <span>{{ __('Optimasi keterlihatan lokal di Google Maps dan Search') }}</span>
                            </li>
                        </ul>
                    </div>
                    @php
                        $expressWaMsg = 'Halo Accelerate Lab, saya ingin memesan paket Website Bisnis Express Rp 1.500.000 untuk bisnis saya.';
                    @endphp
                    <a href="https://wa.me/{{ $heroWaPhone }}?text={{ urlencode($expressWaMsg) }}" target="_blank" rel="noopener noreferrer"
                        class="w-full py-4 px-6 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-center flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                        <x-app-icon name="chat" class="w-4 h-4 fill-current" />
                        <span>{{ __('Pesan Website Express via WhatsApp') }}</span>
                    </a>
                </div>

                <!-- Tier 2: Portal Operasional dan Sistem Kustom -->
                <div class="relative flex flex-col justify-between p-8 sm:p-10 rounded-2xl bg-surface-light dark:bg-surface-dark border border-primary/40 shadow-lg hover:shadow-xl transition-all">
                    <div class="absolute top-6 right-6">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            {{ __('Pengerjaan: 2-6 Minggu') }}
                        </span>
                    </div>
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6">
                            <x-app-icon name="settings_suggest" class="w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('Portal Operasional dan Sistem Kustom') }}
                        </h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                            {{ __('Arsitektur sistem perangkat lunak mandiri untuk distributor, pabrik, dan logistik yang ingin menghentikan kekacauan pencatatan manual.') }}
                        </p>
                        <div class="mb-6 pb-6 border-b border-slate-200 dark:border-slate-800">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-1">{{ __('Investasi Proyek') }}</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white">{{ __('Investasi Terukur') }}</span>
                                <span class="text-xs text-slate-500 font-medium">{{ __('sesuai ruang lingkup') }}</span>
                            </div>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-700 dark:text-slate-300 mb-8">
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-primary shrink-0" />
                                <span>{{ __('Sinkronisasi data multi-gudang dan banyak cabang secara terpusat') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-primary shrink-0" />
                                <span>{{ __('Automasi invoicing, pencatatan transaksi, dan notifikasi stok') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-primary shrink-0" />
                                <span>{{ __('100% Hak cipta source code dan database tanpa biaya sewa lisensi') }}</span>
                            </li>
                            <li class="flex items-center gap-2.5">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-primary shrink-0" />
                                <span>{{ __('Konsultasi dan perancangan langsung dengan Principal Architect') }}</span>
                            </li>
                        </ul>
                    </div>
                    <a href="/contact"
                        class="w-full py-4 px-6 rounded-xl bg-primary hover:bg-primary-dark text-white font-bold text-center flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                        <x-app-icon name="calculate" class="w-4 h-4 text-white" />
                        <span>{{ __('Konsultasi Kebutuhan dan Hitung Estimasi') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Enterprise Guarantees --}}
    <section class="py-20 bg-background-light dark:bg-background-dark relative overflow-hidden" aria-labelledby="guarantees-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3">
                    <x-app-icon name="verified" class="w-3.5 h-3.5" />
                    {{ __('Our Commitment') }}
                </span>
                <h2 id="guarantees-heading" class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">
                    {{ __('Clear Guarantees. Zero Surprises.') }}
                </h2>
                <p class="mt-3 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                    {{ __('We eliminate the typical frustrations of hiring an agency with transparent, client-first standards.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Guarantee 1 -->
                <div class="p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center mb-4">
                        <x-app-icon name="lock" class="w-6 h-6" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('100% Full IP Ownership') }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        {{ __('You own all source code, designs, and deployment configurations forever with zero vendor lock-in.') }}
                    </p>
                </div>

                <!-- Guarantee 2 -->
                <div class="p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4">
                        <x-app-icon name="person" class="w-6 h-6" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Direct Architect Oversight') }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        {{ __('Every project is engineered and reviewed directly by Principal Architects, with no unsupervised junior handoffs.') }}
                    </p>
                </div>

                <!-- Guarantee 3 -->
                <div class="p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-500 flex items-center justify-center mb-4">
                        <x-app-icon name="check_circle" class="w-6 h-6" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Tested for High Reliability') }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        {{ __('Every feature is backed by automated tests before release so your application won\'t break on your users.') }}
                    </p>
                </div>

                <!-- Guarantee 4 -->
                <div class="p-6 rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center mb-4">
                        <x-app-icon name="payments" class="w-6 h-6" />
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ __('Transparent Milestone Pricing') }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        {{ __('Clear sprint deliverables and fixed milestone pricing with zero surprise hourly bills or creeping fees.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white dark:bg-slate-900 relative overflow-hidden" aria-labelledby="projects-heading">
        <div
            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-primary/5 rounded-full blur-[80px]" aria-hidden="true">
        </div>
        <div
            class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-64 h-64 bg-blue-600/5 rounded-full blur-[60px]" aria-hidden="true">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="mb-16 text-center max-w-3xl mx-auto">
                <h2 id="projects-heading" class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">{{ __('Our Recent Projects') }}</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">
                    {{ __('Delivering impact through engineering excellence. Here is a selection of our recent deployments.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($recentProjects as $project)
                    <article
                        class="group bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 rounded-2xl overflow-hidden hover:shadow-2xl hover:border-primary/50 transition-all duration-300 flex flex-col h-full">
                        <div
                            class="h-48 bg-slate-100 dark:bg-slate-800 relative overflow-hidden group-hover:opacity-90 transition-opacity">
                            <div class="absolute inset-0 bg-grid-pattern opacity-20" aria-hidden="true"></div>
                            @if ($project->image_path)
                                <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover" loading="lazy" width="400" height="192" decoding="async">
                            @else
                                <div
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-primary/20 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500" aria-hidden="true">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <x-app-icon :name="$project->icon ?? 'layers'" class="w-10 h-10 text-slate-400 dark:text-slate-500 group-hover:text-primary transition-colors" />
                                </div>
                            @endif
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <div class="mb-4 flex flex-wrap gap-2 items-center">
                                @if ($project->industry)
                                    <span
                                        class="text-xs font-mono text-primary bg-primary/10 px-2 py-1 rounded">{{ __($project->industry) }}</span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">{{ $project->title }}</h3>
                            <div class="space-y-4 mb-8 flex-grow">
                                <div>
                                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">{{ __('Challenge') }}
                                    </p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">
                                        {{ $project->plain_challenge }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">{{ __('Solution') }}
                                    </p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">
                                        {{ $project->plain_solution }}</p>
                                </div>
                            </div>
                            <a href="{{ route('project', $project) }}"
                                class="w-full mt-auto py-3 px-4 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-900 dark:text-white text-sm font-semibold rounded-lg border border-slate-200 dark:border-slate-700 transition-colors flex items-center justify-center gap-2 group-hover:border-primary/30">
                                {{ __('View Case Study') }}
                                <x-app-icon name="arrow_forward" class="w-4 h-4" />
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-24 bg-background-light dark:bg-background-dark relative overflow-hidden" aria-labelledby="standards-heading">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[100px]" aria-hidden="true"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px]" aria-hidden="true"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4">
                    <x-app-icon name="security" class="w-3.5 h-3.5" />
                    {{ __('Standar Rekayasa & Keamanan Data') }}
                </span>
                <h2 id="standards-heading" class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Dibangun dengan Disiplin Rekayasa Tanpa Celah') }}</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg mb-8 leading-relaxed">
                    {{ __('Software bisnis Anda mengelola data transaksi, stok, dan keuangan bernilai tinggi. Kami menerapkan standar keamanan perbankan, pengujian otomatis, dan arsitektur stabil agar sistem tidak pernah down saat jam sibuk operasional.') }}
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <x-app-icon name="check_circle" class="w-5 h-5 text-primary mr-3 mt-1 flex-shrink-0" />
                        <span class="text-slate-700 dark:text-slate-300"><strong>{{ __('Pengujian Otomatis Ketat') }}</strong>: Setiap fitur diuji dengan tes komprehensif sebelum pembaruan dirilis ke server bisnis Anda.</span>
                    </li>
                    <li class="flex items-start">
                        <x-app-icon name="check_circle" class="w-5 h-5 text-primary mr-3 mt-1 flex-shrink-0" />
                        <span class="text-slate-700 dark:text-slate-300"><strong>{{ __('Enkripsi & Backup Rutin') }}</strong>: Proteksi data sensitif dengan enkripsi modern dan cadangan otomatis berkala ke server cadangan.</span>
                    </li>
                    <li class="flex items-start">
                        <x-app-icon name="check_circle" class="w-5 h-5 text-primary mr-3 mt-1 flex-shrink-0" />
                        <span class="text-slate-700 dark:text-slate-300"><strong>{{ __('Kepemilikan Penuh Tanpa Keterikatan') }}</strong>: 100% kode sumber dan database diserahkan penuh sebagai aset tak berwujud milik perusahaan Anda.</span>
                    </li>
                </ul>
            </div>
            <div class="lg:w-1/2 w-full" aria-hidden="true">
                <div class="rounded-2xl p-8 bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 shadow-xl space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center font-bold text-sm">
                                <x-app-icon name="verified_user" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900 dark:text-white">Audit Keamanan & Kualitas Kode</h3>
                                <p class="text-xs text-slate-500">Status Inspeksi Sistem Produksi</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                            100% Passed
                        </span>
                    </div>

                    <div class="space-y-4 text-xs font-sans">
                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                                <span class="font-medium text-slate-700 dark:text-slate-300">Uji Regresi Otomatis (Automated TDD)</span>
                            </div>
                            <span class="text-slate-500 font-mono">100% Lulus</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                                <span class="font-medium text-slate-700 dark:text-slate-300">Proteksi SQL Injection & XSS Guard</span>
                            </div>
                            <span class="text-slate-500 font-mono">Aktif</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
                                <span class="font-medium text-slate-700 dark:text-slate-300">Waktu Muat Halaman (Speed Index)</span>
                            </div>
                            <span class="text-emerald-500 font-bold font-mono">&lt; 0.8 detik</span>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-primary/5 border border-primary/20 flex items-center gap-3 text-xs text-primary font-medium">
                        <x-app-icon name="info" class="w-4 h-4 flex-shrink-0" />
                        <span>Arsitektur clean monolith berkinerja tinggi, hemat biaya server bulanan, dan mudah dipelihara jangka panjang.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    @if (isset($testimonials) && count($testimonials) > 0)
    <section class="py-20 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800" aria-labelledby="testimonials-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="testimonials-heading" class="text-3xl font-bold text-slate-900 dark:text-white">{{ __('What Our Clients Say') }}</h2>
                <p class="mt-3 text-slate-500 dark:text-slate-400 max-w-xl mx-auto">{{ __('Real feedback from teams we\'ve partnered with.') }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                <article class="bg-white dark:bg-surface-dark rounded-2xl p-8 shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4" aria-label="5 out of 5 stars">
                        @for ($i = 0; $i < 5; $i++)
                        <x-app-icon name="star" class="w-4 h-4 text-amber-400" />
                        @endfor
                    </div>
                    <blockquote class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                        "{{ $testimonial->quote }}"
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-slate-700">
                        @if ($testimonial->avatar_path)
                        <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->client_name }}"
                            class="w-10 h-10 rounded-full object-cover" loading="lazy" width="40" height="40" decoding="async">
                        @else
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <x-app-icon name="person" class="w-5 h-5 text-primary" />
                        </div>
                        @endif
                        <div>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $testimonial->client_name }}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ __($testimonial->client_role) }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}
                            </p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Closing CTA --}}
    <section class="relative isolate overflow-hidden bg-slate-900 py-16 sm:py-24" aria-labelledby="cta-heading">
        <div class="absolute inset-0 -z-10 h-full w-full" style="background-image: radial-gradient(#14b8a7 1px, transparent 1px); background-size: 32px 32px; opacity: 0.08;" aria-hidden="true"></div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/15 to-transparent skew-x-12 pointer-events-none" aria-hidden="true"></div>
        <div class="mx-auto max-w-4xl px-6 lg:px-8 text-center relative z-10">
            <h2 id="cta-heading" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ __('Ready to Accelerate?') }}</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-slate-300">
                {{ __('Let\'s turn your vision into a high-performance digital product. Start a conversation today.') }}
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a class="rounded-lg bg-primary px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-primary/25 hover:bg-teal-500 transition-all"
                    href="/contact" id="cta-start-project">
                    {{ __('Estimate Your Project') }}
                </a>
                <a class="text-sm font-semibold leading-6 text-white hover:text-primary transition-colors"
                    href="/case-studies">
                    {{ __('View Case Studies') }} <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>
@endsection
