@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title ?? 'Mobile App Development') !!},
    "serviceType": {!! json_encode($service->category ?? 'Mobile Applications') !!},
    "description": {!! json_encode($service->short_description ?? 'Native and cross-platform mobile application development.') !!},
    "provider": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
        "url": "{{ config('app.url') }}"
    },
    "areaServed": "Worldwide"
}
</script>
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "BreadcrumbList",
    "itemListElement": [
        {
            "{{ '@' }}type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 2,
            "name": "Services",
            "item": "{{ url('/services') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 3,
            "name": {!! json_encode($service->title ?? 'Mobile App Development') !!},
            "item": "{{ url('/services/' . ($service->slug ?? 'mobile-app-development')) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <!-- Hero Section -->
        <section id="service-hero-section" class="relative w-full overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 bg-grid-pattern">
            <div class="absolute inset-0 bg-white/80 dark:bg-[#090D16]/90 pointer-events-none"></div>
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                    <div class="flex flex-col gap-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/20 w-fit">
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                            <span class="text-xs font-semibold text-teal-600 dark:text-teal-400 uppercase tracking-wider">{{ __('Mobile Development') }}</span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-instrumentsans tracking-tight text-slate-900 dark:text-white leading-tight">
                            {{ __('Mobile Experiences, Accelerated.') }}
                        </h1>
                        <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                            {{ __('We build high-performance mobile applications using cutting-edge technologies. Experience the future of mobile interaction with precision engineering.') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 mt-2">
                            <a href="/contact" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">{{ __('Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                                    <span class="text-two">{{ __('Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                                </span>
                            </a>
                            <a href="/case-studies" class="rr-btn btn-border">
                                <span class="btn-wrap">
                                    <span class="text-one">{{ __('Case Studies') }}</span>
                                    <span class="text-two">{{ __('Case Studies') }}</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl relative group border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900">
                        @if ($service->hero_image)
                            <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-tr from-teal-500/20 to-transparent z-10"></div>
                            <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAicYLCUClxs-ZEUF84de2qDQLq6uAL-u9Prz_lyYLCU9K4B71i1-4v4MKo0uOxcpLFoCLNERe-xRxnuL-yfaXsqHrgJXdkj_HtfhyFZU2Sj4HKfVG3vZ_eSrHoSOQf43IrVKEVz3nIbmaCN3kdSs2q0u0aKV4fQxXhcjPZvpMXOvbJQ1Y8cHIqMoOY18coDIYD1PbWpkuxk52T4lw3FIuNDMuWeT1Z0ba7M6Qw92xrLUubWo7FIU1Id77lw2BXSCDaUVFDIdJn8W4');">
                            </div>
                            <div
                                class="absolute bottom-6 left-6 right-6 bg-white/90 dark:bg-slate-900/90 backdrop-blur p-4 rounded-xl shadow-lg border border-slate-200/80 dark:border-white/10 z-20 transform translate-y-2 group-hover:translate-y-0 transition-transform">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-full bg-teal-500/20 flex items-center justify-center text-teal-600 dark:text-teal-400">
                                        <x-app-icon name="rocket_launch" class="w-5 h-5 text-teal-500 dark:text-teal-400" />
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">{{ __('Performance Score') }}</p>
                                        <p class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">99/100</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack Section -->
        <section class="w-full py-16 border-t border-slate-200/80 dark:border-white/10 bg-white dark:bg-[#090D16]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 border-b border-slate-200/80 dark:border-white/10 pb-6">
                    <div>
                        <h2 class="text-teal-600 dark:text-teal-400 font-bold tracking-wider uppercase text-sm mb-2">{{ __('Our Mobile Arsenal') }}</h2>
                        <h3 class="text-slate-900 dark:text-white text-3xl font-bold font-instrumentsans leading-tight">
                            {{ __('Technologies We Master') }}
                        </h3>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 max-w-md">
                        {{ __('From native mastery to cross-platform efficiency, we leverage the best tools for the job.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="h-12 w-12 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="code_blocks" class="w-7 h-7" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-slate-900 dark:text-white text-lg font-bold font-instrumentsans">React Native</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Cross-platform efficiency with near-native performance using JavaScript.') }}</p>
                        </div>
                    </div>
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="h-12 w-12 rounded-xl bg-cyan-500/10 text-cyan-500 flex items-center justify-center group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="layers" class="w-7 h-7" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-slate-900 dark:text-white text-lg font-bold font-instrumentsans">Flutter</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Beautiful, natively compiled applications from a single codebase.') }}</p>
                        </div>
                    </div>
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="h-12 w-12 rounded-xl bg-slate-500/10 text-slate-700 dark:text-slate-300 flex items-center justify-center group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="phone_iphone" class="w-7 h-7" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-slate-900 dark:text-white text-lg font-bold font-instrumentsans">Native iOS</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('High-performance Swift development for the Apple ecosystem.') }}</p>
                        </div>
                    </div>
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 p-6 hover:shadow-xl transition-all duration-300">
                        <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="android" class="w-7 h-7" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h4 class="text-slate-900 dark:text-white text-lg font-bold font-instrumentsans">Native Android</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Robust Kotlin solutions for the diverse Android market.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="w-full py-20 bg-slate-50/60 dark:bg-[#090D16]/50 border-t border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-slate-900 dark:text-white text-3xl font-black font-instrumentsans tracking-tight mb-4">
                        {{ __('How We Work') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">{{ __('A proven process, from concept to deployment.') }}</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-white dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-teal-500/10 border-2 border-teal-500 flex items-center justify-center mb-6">
                            <x-app-icon name="search" class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                        </div>
                        <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('1. Define') }}</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-white dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-teal-500/10 border-2 border-teal-500 flex items-center justify-center mb-6">
                            <x-app-icon name="design_services" class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                        </div>
                        <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('2. Design') }}</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-white dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-teal-500/10 border-2 border-teal-500 flex items-center justify-center mb-6">
                            <x-app-icon name="construction" class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                        </div>
                        <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('3. Develop') }}</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-white dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="w-16 h-16 rounded-full bg-teal-500/10 border-2 border-teal-500 flex items-center justify-center mb-6">
                            <x-app-icon name="rocket_launch" class="w-6 h-6 text-teal-600 dark:text-teal-400" />
                        </div>
                        <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('4. Deploy') }}</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Launch, monitor, and scale.') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Expertise Grid -->
        <section class="w-full py-20 bg-white dark:bg-[#090D16] border-t border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-slate-900 dark:text-white text-3xl font-black font-instrumentsans tracking-tight pb-8">
                    {{ __('Our Expertise') }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="smartphone" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Product Strategy') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Market research, user persona definition, and roadmap planning to ensure product-market fit.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="palette" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('UI/UX Design') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Crafting intuitive interfaces that users love.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="cloud_sync" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Cloud Infrastructure') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Robust backend architecture on AWS, Azure, or Google Cloud.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="bug_report" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Tested for High Reliability') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Every feature is backed by automated tests before release so your application won\'t break on your users.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="update" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Support & Monitoring') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Ongoing support, updates, and optimization to keep your app ahead of the curve.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-slate-50/60 dark:bg-slate-900/80 hover:shadow-lg transition-shadow">
                        <div class="flex items-center gap-3 mb-4">
                            <x-app-icon name="security" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                            <h4 class="font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('Bank-Grade Security') }}</h4>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ __('Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2) built-in from day one.') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="w-full py-20 bg-teal-600 dark:bg-slate-900 text-center relative overflow-hidden">
            <div class="max-w-4xl mx-auto px-4">
                <h2 class="text-4xl md:text-5xl font-black font-instrumentsans text-white mb-6 tracking-tight">
                    {{ __('Ready to Accelerate Your Digital Growth?') }}
                </h2>
                <p class="text-lg text-teal-100 max-w-2xl mx-auto mb-10">
                    {{ __('Let\'s build something extraordinary together. Schedule a free consultation with our engineering team.') }}
                </p>
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')"
                    class="rr-btn !bg-white !text-slate-900 hover:!text-white border-0 shadow-xl">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Book 15-Min Free Call') }}</span>
                        <span class="text-two">{{ __('Book 15-Min Free Call') }}</span>
                    </span>
                </button>
            </div>
        </section>
    </main>
@endsection
