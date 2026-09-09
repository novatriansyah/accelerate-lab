@extends('frontend.components.layout')

@section('content')
    <section id="about-hero-section" class="relative pt-24 pb-20 lg:pt-32 lg:pb-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                <div class="flex flex-col justify-center space-y-8">
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-sm font-medium text-primary">
                            <span class="mr-1 h-2 w-2 rounded-full bg-primary"></span>
                            {{ __('Establishing Digital Excellence') }}
                        </div>
                        <h1
                            class="text-4xl font-black tracking-tighter font-instrumentsans text-slate-900 dark:text-white sm:text-5xl xl:text-6xl">
                            {{ __('Architects of Digital Innovation') }}
                        </h1>
                        <p class="max-w-[600px] text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('Accelerate Lab isn\'t just a software house; we are a collective of dreamers, engineers, and designers dedicated to pushing the boundaries of what\'s possible on the web.') }}
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button" @click="$dispatch('open-consultation-modal')" class="rr-btn">
                            <span class="btn-wrap">
                                <span class="text-one">{{ __('Jadwalkan Diskusi Proyek') }}</span>
                                <span class="text-two">{{ __('Jadwalkan Diskusi Proyek') }}</span>
                            </span>
                        </button>
                        <a href="/case-studies" class="rr-btn btn-border">
                            <span class="btn-wrap">
                                <span class="text-one">{{ __('Pelajari Studi Kasus') }}</span>
                                <span class="text-two">{{ __('Pelajari Studi Kasus') }}</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative overflow-hidden rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900 p-6 sm:p-8 shadow-xl">
                        <div class="flex items-center justify-between border-b border-slate-200/80 dark:border-white/10 pb-5">
                            <div class="flex items-center gap-3">
                                <div class="flex size-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <x-app-icon name="verified_user" class="h-5 w-5" />
                                </div>
                                <div>
                                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                        {{ __('Engineer-Led Boutique Studio') }}
                                    </div>
                                    <h3 class="text-base font-bold text-slate-900 dark:text-white">
                                        {{ __('Komunikasi Langsung dengan Senior Architect') }}
                                    </h3>
                                </div>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-2.5 py-1 text-xs font-medium text-emerald-600 dark:text-emerald-400">
                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                {{ __('Senior Only') }}
                            </span>
                        </div>

                        @php
                            $founder = isset($teamMembers) && $teamMembers->isNotEmpty() ? $teamMembers->first() : null;
                        @endphp
                        <div class="mt-6 space-y-4">
                            <div class="rounded-xl border border-slate-100 dark:border-white/5 bg-slate-50/70 dark:bg-slate-800/40 p-4 transition-all hover:border-primary/30">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                        <x-app-icon name="person" class="h-5 w-5" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-slate-900 dark:text-white">
                                            {{ $founder?->name ?? 'Nova Triansyah Azis' }}
                                        </div>
                                        <div class="text-xs font-semibold text-primary">
                                            {{ __('Principal Technology Architect') }} &amp; {{ $founder?->role ? __($founder->role) : 'CEO & Founder' }}
                                        </div>
                                        <p class="mt-1.5 text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                            {{ $founder?->bio ? __($founder->bio) : __('6+ tahun pengalaman merancang arsitektur sistem operasional bisnis, integrasi enterprise, dan rekayasa perangkat lunak berskala tinggi.') }}
                                        </p>
                                        @if ($founder?->linkedin_url)
                                            <a href="{{ $founder->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                                                class="mt-2.5 inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:underline">
                                                <span>{{ __('Profil LinkedIn Terverifikasi') }}</span>
                                                <x-app-icon name="open_in_new" class="h-3.5 w-3.5" />
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="rounded-xl border border-slate-100 dark:border-white/5 bg-slate-50/70 dark:bg-slate-800/40 p-3.5">
                                    <div class="flex items-center gap-2 text-xs font-bold text-slate-900 dark:text-white">
                                        <x-app-icon name="check_circle" class="h-4 w-4 text-emerald-500" />
                                        {{ __('Tanpa Perantara Sales') }}
                                    </div>
                                    <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                                        {{ __('Diskusi spesifikasi teknis langsung dengan arsitek yang membangun kode.') }}
                                    </p>
                                </div>

                                <div class="rounded-xl border border-slate-100 dark:border-white/5 bg-slate-50/70 dark:bg-slate-800/40 p-3.5">
                                    <div class="flex items-center gap-2 text-xs font-bold text-slate-900 dark:text-white">
                                        <x-app-icon name="check_circle" class="h-4 w-4 text-emerald-500" />
                                        {{ __('100% Hak Cipta & Source Code') }}
                                    </div>
                                    <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">
                                        {{ __('Aset kode, database, dan konfigurasi server sepenuhnya milik bisnis Anda.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-xl border border-slate-100 dark:border-white/5 bg-slate-50/70 dark:bg-slate-800/40 p-4 transition-all hover:border-primary/30">
                                <div class="flex items-start gap-3">
                                    <div class="mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                                        <x-app-icon name="verified_user" class="h-5 w-5" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="text-sm font-bold text-slate-900 dark:text-white">
                                                {{ $settings['legal_name'] ?? 'PT Akselerasi Digital Mandiri' }}
                                            </div>
                                            <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-2 py-0.5 text-[11px] font-semibold text-emerald-600 dark:text-emerald-400">
                                                {{ __('Entitas Hukum Resmi') }}
                                            </span>
                                        </div>
                                        <p class="mt-1.5 text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                            {{ __('Seluruh kerja sama komersial bernaung secara sah di bawah PT Akselerasi Digital Mandiri dengan Surat Perjanjian Kerja Sama (SPK), Non-Disclosure Agreement (NDA), dan faktur pajak resmi.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-xl border border-slate-100 dark:border-white/5 bg-slate-50/70 dark:bg-slate-800/40 p-3.5">
                                <div class="flex items-center justify-between text-xs text-slate-600 dark:text-slate-400">
                                    <span class="font-medium">{{ __('Jaminan Kualitas Rekayasa') }}</span>
                                    <span class="font-bold text-primary">Strict TDD & Clean Architecture</span>
                                </div>
                                <div class="mt-2 flex items-center gap-2 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                    <x-app-icon name="verified" class="h-4 w-4" />
                                    <span>{{ __('Setiap modul dilindungi automated testing sebelum serah terima') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-y border-slate-200/80 dark:border-white/10 bg-slate-50/70 dark:bg-[#0b101b] py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                @if (isset($stats) && count($stats) > 0)
                    @foreach ($stats as $stat)
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-4xl font-black text-primary">{{ $stat->value }}{{ $stat->unit }}</span>
                            <span
                                class="mt-2 text-sm font-medium text-slate-600 dark:text-slate-400">{{ $stat->label }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section id="company-manifesto" class="py-20 lg:py-28 bg-white dark:bg-[#090D16]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 md:text-center max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-4xl">{{ __('Our DNA') }}</h2>
                <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                    {{ __('Driven by core values that ensure every project is a masterpiece of engineering and design. We don\'t just write code; we solve problems.') }}
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-3">
                @if (isset($coreValues) && count($coreValues) > 0)
                    @foreach ($coreValues as $value)
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white dark:bg-slate-900 p-8 shadow-sm border border-slate-200/80 dark:border-white/10 transition-all hover:shadow-md hover:-translate-y-1">
                            <div
                                class="mb-6 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <x-app-icon :name="$value->icon ?? 'star'" class="w-6 h-6" />
                            </div>
                            <h3 class="mb-3 text-xl font-bold text-slate-900 dark:text-white">{{ __($value->title) }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __($value->description) }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <div class="md:col-span-3">
                        <x-empty-state
                            icon="emoji_objects"
                            title="{{ __('Values Being Defined') }}"
                            description="{{ __('Our core values are being crafted. Check back soon.') }}"
                        />
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="py-20 lg:py-28 bg-slate-50/50 dark:bg-[#070b12]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8">
                <div class="lg:col-span-5">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-4xl mb-6">{{ __('Our Evolution') }}</h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-8">
                        {{ __('From a small garage startup to a global digital innovation agency. Every milestone represents a leap forward in our capabilities and our commitment to excellence.') }}
                    </p>
                    <div class="relative rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900 p-6 shadow-md">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex size-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                <x-app-icon name="verified" class="w-5 h-5" />
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-white">{{ __('Prinsip Rekayasa Accelerate Lab') }}</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ __('Standar kualitas teruji di setiap iterasi') }}</p>
                            </div>
                        </div>
                        <div class="space-y-3 text-xs">
                            <div class="flex items-start gap-2.5 text-slate-800 dark:text-slate-200">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" />
                                <span>{{ __('Arsitektur modular siap scale-up tanpa kebutuhan refactor besar-besaran.') }}</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-slate-800 dark:text-slate-200">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" />
                                <span>{{ __('Dokumentasi sistem lengkap dan skema basis data terstruktur.') }}</span>
                            </div>
                            <div class="flex items-start gap-2.5 text-slate-800 dark:text-slate-200">
                                <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" />
                                <span>{{ __('Garansi pendampingan pasca-peluncuran dan transfer pengetahuan tim.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-7 pl-0 lg:pl-12">
                    <div class="grid grid-cols-[40px_1fr] gap-x-4">
                        @if (isset($milestones) && count($milestones) > 0)
                            @foreach ($milestones as $milestone)
                                <!-- Icon Column -->
                                <div class="flex flex-col items-center gap-1 {{ $loop->first ? 'pt-1' : '' }}">
                                    @if (!$loop->first)
                                        <div class="w-[2px] bg-slate-200 dark:bg-slate-700 h-2"></div>
                                    @endif

                                    <div
                                        class="flex size-8 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-400 {{ $loop->first ? 'bg-primary/20 text-primary' : '' }}">
                                        <x-app-icon :name="$milestone->icon ?? 'timeline'" class="w-4 h-4" />
                                    </div>

                                    @if (!$loop->last)
                                        <div class="w-[2px] bg-slate-200 dark:bg-slate-700 h-full min-h-[60px]"></div>
                                    @endif
                                </div>

                                <!-- Content Column -->
                                <div class="flex flex-col pb-8 {{ $loop->first ? '' : 'pt-2' }}">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                            {{ __($milestone->title) }}</h3>
                                        <span class="text-sm font-bold text-primary">{{ $milestone->year }}</span>
                                    </div>
                                    <p class="text-slate-600 dark:text-slate-400">{{ __($milestone->description) }}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="col-span-2">
                                <x-empty-state
                                    icon="timeline"
                                    title="Our Story is Being Written"
                                    description="Company milestones will appear here as we grow."
                                />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset($teamMembers) && count($teamMembers) > 0)
    <section class="py-20 lg:py-28 bg-white dark:bg-[#090D16]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-4xl">{{ __('Meet the Innovators') }}</h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">
                        {{ __('The brilliant minds behind the code.') }}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($teamMembers as $member)
                    <div class="group relative">
                        <div class="aspect-[4/5] w-full overflow-hidden rounded-xl bg-slate-200 dark:bg-slate-800">
                            @if ($member->image_path)
                                <img src="{{ Storage::url($member->image_path) }}"
                                    alt="Portrait of {{ $member->name }}"
                                    class="h-full w-full object-cover transition-all duration-500 grayscale group-hover:grayscale-0 group-hover:scale-105"
                                    loading="lazy" width="300" height="375" decoding="async">
                            @else
                                <div class="h-full w-full bg-slate-100 flex items-center justify-center">
                                    <x-app-icon name="person" class="w-12 h-12 text-slate-300" />
                                </div>
                            @endif
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $member->name }}</h3>
                            <p class="text-sm font-medium text-primary">{{ __($member->role) }}</p>
                            @if ($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank"
                                    class="mt-2 inline-flex items-center text-xs text-slate-500 hover:text-primary transition-colors">
                                    LinkedIn <x-app-icon name="open_in_new" class="w-3.5 h-3.5 ml-0.5" />
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section class="py-16 border-t border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-[#0b101b]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-6">{{ __('Standar Rekayasa & Keamanan Enterprise') }}</p>
            <div class="flex flex-wrap justify-center items-center gap-3 sm:gap-6 text-xs sm:text-sm font-semibold text-slate-600 dark:text-slate-400">
                <span class="rounded-lg border border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-slate-900/60 px-3.5 py-2">{{ __('Arsitektur Bersih') }}</span>
                <span class="text-slate-300 dark:text-slate-700 hidden sm:inline">•</span>
                <span class="rounded-lg border border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-slate-900/60 px-3.5 py-2">{{ __('Keamanan Data & Privasi') }}</span>
                <span class="text-slate-300 dark:text-slate-700 hidden sm:inline">•</span>
                <span class="rounded-lg border border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-slate-900/60 px-3.5 py-2">{{ __('Otomasi Pengujian') }}</span>
                <span class="text-slate-300 dark:text-slate-700 hidden sm:inline">•</span>
                <span class="rounded-lg border border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-slate-900/60 px-3.5 py-2">{{ __('Performa & Kecepatan Tinggi') }}</span>
                <span class="text-slate-300 dark:text-slate-700 hidden sm:inline">•</span>
                <span class="rounded-lg border border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-slate-900/60 px-3.5 py-2">{{ __('Skalabilitas Awan') }}</span>
            </div>
        </div>
    </section>
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-primary/5 dark:bg-primary/10"></div>
        <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-primary/10 blur-3xl"></div>
        <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-black tracking-tight font-instrumentsans text-slate-900 dark:text-white sm:text-5xl">{{ __('Ready to Accelerate?') }}
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg text-slate-600 dark:text-slate-400">
                {{ __('Let\'s discuss how we can transform your digital presence. Whether you need a new platform or an overhaul of your existing stack, we are ready.') }}
            </p>
            <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row items-center">
                <button type="button" @click="$dispatch('open-consultation-modal')" class="rr-btn">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Jadwalkan Diskusi Proyek') }}</span>
                        <span class="text-two">{{ __('Jadwalkan Diskusi Proyek') }}</span>
                    </span>
                </button>
                <a href="/contact" class="rr-btn btn-border">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Hitung Estimasi Kebutuhan') }}</span>
                        <span class="text-two">{{ __('Hitung Estimasi Kebutuhan') }}</span>
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
