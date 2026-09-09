@extends('frontend.components.layout')

@section('content')
    <section id="service-hero-section" class="relative w-full overflow-hidden py-12 pt-20 md:py-20 lg:py-24 bg-white dark:bg-slate-950 text-slate-900 dark:text-white transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <div class="flex flex-col gap-6">
                    <h1
                        class="text-4xl font-black leading-tight tracking-tight sm:text-5xl lg:text-6xl text-slate-900 dark:text-white font-instrumentsans">
                        {{ __('Digital Innovation, Delivered.') }}
                    </h1>
                    <p class="text-lg text-slate-600 dark:text-slate-300 max-w-lg leading-relaxed">
                        {{ __('We transform complex business challenges into elegant, scalable software solutions. From strategy to deployment, we engineer the future of your product.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="/contact" class="rr-btn">
                            <span class="btn-wrap">
                                <span class="text-one">{{ __('Estimate Your Project') }}</span>
                                <span class="text-two">{{ __('Estimate Your Project') }}</span>
                            </span>
                        </a>
                        <button type="button" 
                            @click="$dispatch('open-consultation-modal')"
                            class="rr-btn btn-border">
                            <span class="btn-wrap">
                                <span class="text-one">{{ __('Book 15-Min Free Call') }}</span>
                                <span class="text-two">{{ __('Book 15-Min Free Call') }}</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div
                    class="relative w-full aspect-square lg:aspect-auto lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-900 border border-slate-200/80 dark:border-white/10">
                    <img src="{{ asset('images/pages/services-hero.jpg') }}"
                        alt="Abstract 3D geometric shapes in teal and dark grey lighting"
                        class="absolute inset-0 w-full h-full object-cover"
                        width="600" height="500" loading="eager" decoding="async">
                    <div class="absolute inset-0 bg-primary/10 mix-blend-overlay" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <div
        class="sticky top-16 z-40 w-full bg-white/95 dark:bg-slate-900/95 border-b border-slate-200/80 dark:border-white/10 backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8 overflow-x-auto no-scrollbar">
                <a class="group flex flex-col items-center justify-center border-b-[3px] border-b-primary pb-3 pt-4 px-2"
                    href="#strategy">
                    <p class="text-slate-900 dark:text-white text-sm font-bold tracking-[0.015em]">{{ __('Product Strategy') }}</p>
                </a>
                <a class="group flex flex-col items-center justify-center border-b-[3px] border-b-transparent hover:border-b-primary/50 pb-3 pt-4 px-2 transition-colors"
                    href="#development">
                    <p
                        class="text-teal-600 group-hover:text-primary dark:text-teal-400 dark:group-hover:text-white text-sm font-bold tracking-[0.015em]">
                        {{ __('Custom Development') }}</p>
                </a>
            </div>
        </div>
    </div>

    <section class="py-16 md:py-24 bg-white dark:bg-slate-950 transition-colors duration-300" id="strategy">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-2 mb-12">
                <span class="text-teal-600 dark:text-teal-400 font-bold uppercase tracking-wider text-sm">{{ __('Discover & Define') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold font-instrumentsans text-slate-900 dark:text-white">
                    {{ __($strategyService->title ?? 'Product Strategy') }}</h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
                <div class="flex flex-col gap-6">
                    <h3 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white">
                        {{ __($strategyService->headline ?? 'Turning Chaos into Order') }}</h3>
                    <div
                        class="text-slate-600 dark:text-slate-300 text-lg leading-relaxed prose prose-slate dark:prose-invert max-w-none">
                        @if ($strategyService)
                            {!! $strategyService->content !!}
                        @else
                            {{ __('Our strategy phase lays the foundation for success. We align business goals with user needs to define a clear roadmap. We don\'t just build what you ask for; we build what your users actually need.') }}
                        @endif
                    </div>

                    @if (isset($strategyService->benefits) && count($strategyService->benefits) > 0)
                        <ul class="flex flex-col gap-4 mt-2">
                            @foreach ($strategyService->benefits as $benefit)
                                <li class="flex items-center gap-3">
                                    <x-app-icon name="check_circle" class="w-5 h-5 text-teal-500 dark:text-teal-400" />
                                    <span class="text-slate-900 dark:text-slate-200">{{ __($benefit) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <!-- Fallback benefits if none provided -->
                        <ul class="flex flex-col gap-4 mt-2">
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-5 h-5 text-teal-500 dark:text-teal-400" />
                                <span class="text-slate-900 dark:text-slate-200">{{ __('Data-driven decision making') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-5 h-5 text-teal-500 dark:text-teal-400" />
                                <span class="text-slate-900 dark:text-slate-200">{{ __('Clear roadmap & MVP definition') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="w-5 h-5 text-teal-500 dark:text-teal-400" />
                                <span class="text-slate-900 dark:text-slate-200">{{ __('User-centric design focus') }}</span>
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if (isset($strategyService->features) && count($strategyService->features) > 0)
                        @foreach ($strategyService->features as $feature)
                            <div
                                class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                                <x-app-icon :name="$feature['icon'] ?? 'star'" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                                <div>
                                    <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">
                                        {{ __($feature['title']) }}</h4>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ __($feature['description'] ?? '') }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback features -->
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="lightbulb" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('Discovery Workshops') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Collaborative sessions to define core problems and solutions.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="analytics" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('Market Research') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('In-depth analysis of competitors and target demographics.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="map" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('MVP Planning') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Prioritizing features for a lean, effective market entry.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="brush" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('UI/UX Design') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Crafting intuitive interfaces that users love.') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50/80 dark:bg-slate-900/50 py-20 border-y border-slate-200/80 dark:border-white/10 transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('Our Methodology') }}</h2>
                <p class="text-slate-600 dark:text-slate-400">{{ __('An agile process refined over dozens of successful product launches.') }}</p>
            </div>
            <div class="relative">
                <div
                    class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-slate-200 dark:bg-slate-800 -translate-y-1/2 z-0">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 rounded-full bg-white dark:bg-slate-800 border-4 border-teal-500 flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <x-app-icon name="search" class="w-6 h-6 text-teal-500" />
                        </div>
                        <h3 class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('1. Define') }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 rounded-full bg-white dark:bg-slate-800 border-4 border-teal-500 flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <x-app-icon name="design_services" class="w-6 h-6 text-teal-500" />
                        </div>
                        <h3 class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('2. Design') }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 rounded-full bg-white dark:bg-slate-800 border-4 border-teal-500 flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <x-app-icon name="code" class="w-6 h-6 text-teal-500" />
                        </div>
                        <h3 class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('3. Develop') }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 rounded-full bg-white dark:bg-slate-800 border-4 border-teal-500 flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <x-app-icon name="rocket_launch" class="w-6 h-6 text-teal-500" />
                        </div>
                        <h3 class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('4. Deploy') }}</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Launch, monitor, and scale.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white dark:bg-slate-950 transition-colors duration-300" id="development">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-2 mb-12">
                <span class="text-teal-600 dark:text-teal-400 font-bold uppercase tracking-wider text-sm">{{ __('Build & Scale') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Custom Development') }}</h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="order-2 lg:order-1 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if (isset($developmentServices) && $developmentServices->count() > 0)
                        @foreach ($developmentServices as $service)
                            <a href="{{ route('service', $service) }}"
                                class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300 group">
                                <x-app-icon :name="$service->icon ?? 'layers'" class="w-8 h-8 text-teal-500 dark:text-teal-400 group-hover:scale-110 transition-transform" />
                                <div>
                                    <h4
                                        class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1 group-hover:text-teal-500 transition-colors">
                                        {{ __($service->title) }}</h4>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2">
                                        {{ __($service->short_description ?? Str::limit(strip_tags($service->content), 80)) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <!-- Fallback Development Services -->
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="devices" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('Web Applications') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Scalable, responsive web apps using modern frameworks.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="smartphone" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('Mobile Development') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Native and cross-platform solutions for iOS and Android.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="api" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('API Integration') }}</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Seamless connection between your services and third-party tools.') }}</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/80 dark:bg-slate-900/90 p-6 hover:shadow-lg transition-shadow duration-300">
                            <x-app-icon name="cloud_sync" class="w-8 h-8 text-teal-500 dark:text-teal-400" />
                            <div>
                                <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-1">{{ __('Cloud Infrastructure') }}
                                </h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Robust backend architecture on AWS, Azure, or Google Cloud.') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="order-1 lg:order-2 flex flex-col gap-6 lg:sticky lg:top-32">
                    <h3 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Engineering for Growth') }}</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-lg leading-relaxed">
                        {{ __('We don\'t just write code; we architect solutions that scale with your business. Our engineering team utilizes the latest technologies to ensure your product is fast, secure, and ready for the future.') }}
                    </p>
                    <div
                        class="p-6 bg-slate-50 dark:bg-slate-900/90 rounded-2xl border border-slate-200/80 dark:border-white/10">
                        <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('Tech Stack Highlights') }}</h4>
                        <div class="flex flex-wrap gap-2">
                            @if (isset($techStack) && $techStack->count() > 0)
                                @foreach ($techStack as $tech)
                                    <span
                                        class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @else
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">React</span>
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">Node.js</span>
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">Python</span>
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">TypeScript</span>
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">PostgreSQL</span>
                                <span
                                    class="px-3 py-1 bg-white dark:bg-slate-800 rounded-full text-xs font-bold text-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700">AWS</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-950 py-16 transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x-0 md:divide-x divide-slate-100 dark:divide-slate-800">
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-black text-teal-500 mb-2 font-instrumentsans">50+</div>
                    <div class="text-sm font-medium text-slate-700 dark:text-slate-400">{{ __('Products Launched') }}</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-black text-teal-500 mb-2 font-instrumentsans">99%</div>
                    <div class="text-sm font-medium text-slate-700 dark:text-slate-400">{{ __('Client Retention') }}</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-black text-teal-500 mb-2 font-instrumentsans">2x</div>
                    <div class="text-sm font-medium text-slate-700 dark:text-slate-400">{{ __('Faster Delivery') }}</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-black text-teal-500 mb-2 font-instrumentsans">24/7</div>
                    <div class="text-sm font-medium text-slate-700 dark:text-slate-400">{{ __('Support & Monitoring') }}</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Service Tiers: Starter vs Enterprise --}}
    <section class="py-20 bg-white dark:bg-slate-950 border-t border-slate-200/80 dark:border-white/10 transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-teal-600 dark:text-teal-400 font-bold uppercase tracking-wider text-xs">{{ __('Paket Layanan Fleksibel') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold font-instrumentsans text-slate-900 dark:text-white mt-2">
                    {{ __('Pilihan Tepat untuk Setiap Skala Usaha') }}
                </h2>
                <p class="mt-3 text-base text-slate-600 dark:text-slate-400">
                    {{ __('Kami melayani kebutuhan dari peluncuran landing page instan hingga rekayasa arsitektur sistem operasional bisnis.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-8 rounded-2xl bg-slate-50/80 dark:bg-slate-900/90 border border-emerald-500/30 shadow-md">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                        {{ __('Peluncuran Cepat 24-48 Jam') }}
                    </span>
                    <h3 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white mt-4 mb-2">
                        {{ __('Website Bisnis Express') }}
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        {{ __('Cocok untuk UMKM dan bisnis jasa lokal yang butuh landing page modern, terhubung WhatsApp, dan cepat tayang dengan anggaran terjangkau.') }}
                    </p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: \App\Models\SiteSetting::get('contact_phone', '6287721312985'))) }}?text={{ urlencode('Halo Accelerate Lab, saya tertarik dengan paket Website Bisnis Express.') }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center text-emerald-600 dark:text-emerald-400 font-bold text-sm hover:underline">
                        {{ __('Pesan via WhatsApp') }} &rarr;
                    </a>
                </div>

                <div class="p-8 rounded-2xl bg-slate-50/80 dark:bg-slate-900/90 border border-teal-500/30 shadow-md">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-600 dark:text-teal-400 bg-teal-500/10 px-3 py-1 rounded-full border border-teal-500/20">
                        {{ __('Arsitektur Mandiri 2-6 Minggu') }}
                    </span>
                    <h3 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white mt-4 mb-2">
                        {{ __('Sistem Operasional Kustom') }}
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        {{ __('Portal manajemen dan sistem operasional bisnis terpadu untuk distributor, manufaktur, dan perusahaan berkembang dengan alur kerja spesifik.') }}
                    </p>
                    <a href="/contact" class="inline-flex items-center text-teal-600 dark:text-teal-400 font-bold text-sm hover:underline">
                        {{ __('Hitung Estimasi Proyek') }} &rarr;
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50/80 dark:bg-slate-900/80 border-t border-slate-200/80 dark:border-white/10 transition-colors duration-300">
        <div class="mx-auto max-w-4xl px-4 text-center">
            <h2 class="text-3xl sm:text-4xl font-black font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('Ready to launch or upgrade your software?') }}</h2>
            <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 mb-10 max-w-2xl mx-auto">
                {{ __('Whether you have a new app idea or need to modernize an existing system, get an honest evaluation and timeline from our Principal Architect.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact" class="rr-btn">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Estimate Your Project') }}</span>
                        <span class="text-two">{{ __('Estimate Your Project') }}</span>
                    </span>
                </a>
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')"
                    class="rr-btn btn-border">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Book 15-Min Free Call') }}</span>
                        <span class="text-two">{{ __('Book 15-Min Free Call') }}</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
@endsection
