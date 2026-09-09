@extends('frontend.components.layout', [
    'title' => '404 - Halaman Tidak Ditemukan | Accelerate Lab',
    'description' => 'Halaman yang Anda cari tidak ditemukan atau telah dipindahkan. Jelajahi layanan Accelerate Lab, studi kasus, atau kembali ke beranda.'
])

@section('content')
    <div id="error-404-container" class="relative min-h-[80vh] flex items-center justify-center py-28 px-4 sm:px-6 lg:px-8 overflow-hidden bg-background-light dark:bg-background-dark">
        <!-- Background Ambient Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[100px] pointer-events-none -z-10" aria-hidden="true"></div>
        <div class="absolute top-1/3 left-1/3 w-72 h-72 bg-cyan-500/10 rounded-full blur-[80px] pointer-events-none -z-10" aria-hidden="true"></div>

        <div class="relative z-10 max-w-3xl w-full text-center space-y-8" data-reveal>
            <!-- Error Status Pill -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold tracking-wider uppercase">
                <span class="w-2 h-2 rounded-full bg-primary animate-ping" aria-hidden="true"></span>
                <span>{{ __('Error Code 404') }} : {{ __('Resource Not Found') }}</span>
            </div>

            <!-- Massive Kinetic 404 Headline -->
            <h1 class="text-8xl sm:text-[11rem] lg:text-[13rem] font-black tracking-tighter text-slate-900 dark:text-white leading-none select-none">
                404
            </h1>

            <div class="space-y-3 max-w-xl mx-auto">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">
                    {{ __('Halaman Tidak Ditemukan') }}
                </h2>

                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg leading-relaxed">
                    {{ __('Halaman yang Anda cari tidak tersedia, telah dipindahkan, atau alamat tautan yang dimasukkan salah.') }}
                </p>
            </div>

            <!-- Navigation Actions -->
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-primary hover:bg-primary-dark text-slate-950 font-bold transition-all shadow-lg shadow-primary/20 hover:scale-[1.02] text-base">
                    <x-app-icon name="home" class="w-5 h-5" />
                    <span>{{ __('Kembali ke Beranda') }}</span>
                </a>
                <a href="{{ route('services') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white font-semibold hover:border-primary transition-all text-base">
                    <x-app-icon name="explore" class="w-5 h-5 text-primary" />
                    <span>{{ __('Eksplorasi Layanan') }}</span>
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white font-semibold hover:border-primary transition-all text-base">
                    <x-app-icon name="chat" class="w-5 h-5 text-primary" />
                    <span>{{ __('Hubungi Tim Kami') }}</span>
                </a>
            </div>
        </div>
    </div>
@endsection
