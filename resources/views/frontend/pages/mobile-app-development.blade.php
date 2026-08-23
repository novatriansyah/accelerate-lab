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
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="@container">
                        <div class="flex flex-col gap-6 py-10 @[480px]:gap-8 @[864px]:flex-row items-center">
                            <div
                                class="flex flex-col gap-6 @[480px]:min-w-[400px] @[480px]:gap-8 @[864px]:justify-center flex-1">
                                <div class="flex flex-col gap-2 text-left">
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 w-fit mb-2">
                                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                        <span class="text-xs font-semibold text-primary uppercase tracking-wider">{{ __('Mobile Development') }}</span>
                                    </div>
                                    <h1
                                        class="text-text-main dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        {{ __('Mobile Experiences, Accelerated.') }}
                                    </h1>
                                    <h2
                                        class="text-text-secondary dark:text-gray-300 text-lg font-normal leading-relaxed">
                                        {{ __('We build high-performance mobile applications using cutting-edge technologies. Experience the future of mobile interaction with precision engineering.') }}
                                    </h2>
                                </div>
                                <div class="flex gap-4">
                                    <a href="/contact"
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white hover:bg-teal-600 transition-all shadow-lg shadow-primary/20 text-base font-bold leading-normal tracking-[0.015em]">
                                        <span class="truncate">{{ __('Estimate Your Project') }}</span>
                                    </a>
                                    <a href="/case-studies"
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-transparent border border-gray-300 dark:border-gray-700 hover:border-primary dark:hover:border-primary text-text-main dark:text-white transition-all text-base font-bold leading-normal tracking-[0.015em]">
                                        <span class="truncate">{{ __('Case Studies') }}</span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="w-full h-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl relative group">
                                @if ($service->hero_image)
                                    <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent z-10">
                                    </div>
                                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAicYLCUClxs-ZEUF84de2qDQLq6uAL-u9Prz_lyYLCU9K4B71i1-4v4MKo0uOxcpLFoCLNERe-xRxnuL-yfaXsqHrgJXdkj_HtfhyFZU2Sj4HKfVG3vZ_eSrHoSOQf43IrVKEVz3nIbmaCN3kdSs2q0u0aKV4fQxXhcjPZvpMXOvbJQ1Y8cHIqMoOY18coDIYD1PbWpkuxk52T4lw3FIuNDMuWeT1Z0ba7M6Qw92xrLUubWo7FIU1Id77lw2BXSCDaUVFDIdJn8W4');">
                                    </div>
                                    <div
                                        class="absolute bottom-6 left-6 right-6 bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur p-4 rounded-xl shadow-lg border border-white/20 z-20 transform translate-y-2 group-hover:translate-y-0 transition-transform">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                                <x-app-icon name="rocket_launch" class="w-5 h-5 text-primary" />
                                            </div>
                                            <div>
                                                <p class="text-xs text-text-secondary dark:text-gray-400 font-medium">
                                                    {{ __('Performance Score') }}</p>
                                                <p class="text-lg font-bold text-text-main dark:text-white">
                                                    99/100</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div
                        class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10 pt-10 px-4 border-b border-gray-100 dark:border-gray-800 pb-6">
                        <div>
                            <h2 class="text-primary font-bold tracking-wider uppercase text-sm mb-2">{{ __('Our Mobile Arsenal') }}</h2>
                            <h3
                                 class="text-text-main dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em]">
                                 {{ __('Technologies We Master') }}</h3>
                        </div>
                        <p class="text-text-secondary dark:text-gray-400 max-w-md text-right md:text-left">
                            {{ __('From native mastery to cross-platform efficiency, we leverage the best tools for the job.') }}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-4 pb-12">
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-500 group-hover:bg-primary group-hover:text-white transition-colors">
                                <x-app-icon name="code_blocks" class="w-7 h-7" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main dark:text-white text-lg font-bold leading-tight">React Native</h2>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ __('Cross-platform efficiency with near-native performance using JavaScript.') }}</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-cyan-50 dark:bg-cyan-900/20 flex items-center justify-center text-cyan-500 group-hover:bg-primary group-hover:text-white transition-colors">
                                <x-app-icon name="layers" class="w-7 h-7" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main dark:text-white text-lg font-bold leading-tight">Flutter</h2>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ __('Beautiful, natively compiled applications from a single codebase.') }}</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 group-hover:bg-primary group-hover:text-white transition-colors">
                                <x-app-icon name="phone_iphone" class="w-7 h-7" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main dark:text-white text-lg font-bold leading-tight">Native iOS</h2>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ __('High-performance Swift development for the Apple ecosystem.') }}</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-green-50 dark:bg-green-900/20 flex items-center justify-center text-green-600 group-hover:bg-primary group-hover:text-white transition-colors">
                                <x-app-icon name="android" class="w-7 h-7" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main dark:text-white text-lg font-bold leading-tight">Native Android</h2>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">
                                    {{ __('Robust Kotlin solutions for the diverse Android market.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col bg-slate-50 dark:bg-[#0d1817]">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-20">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="text-center mb-16">
                        <h2
                            class="text-text-main dark:text-white text-3xl font-black leading-tight tracking-[-0.015em] mb-4">
                            {{ __('How We Work') }}</h2>
                        <p class="text-text-secondary dark:text-gray-400 max-w-2xl mx-auto">{{ __('A proven process, from concept to deployment.') }}</p>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 dark:bg-gray-800 -translate-y-1/2 hidden md:block z-0">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <x-app-icon name="search" class="w-6 h-6 text-primary" />
                                </div>
                                <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('1. Define') }}</h3>
                                <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <x-app-icon name="design_services" class="w-6 h-6 text-text-secondary dark:text-gray-400 group-hover:text-primary" />
                                </div>
                                <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('2. Design') }}</h3>
                                <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <x-app-icon name="terminal" class="w-6 h-6 text-text-secondary dark:text-gray-400 group-hover:text-primary" />
                                </div>
                                <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('3. Develop') }}</h3>
                                <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <x-app-icon name="rocket_launch" class="w-6 h-6 text-text-secondary dark:text-gray-400 group-hover:text-primary" />
                                </div>
                                <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('4. Deploy') }}</h3>
                                <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Launch, monitor, and scale.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-20">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <h2
                        class="text-text-main dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-8">
                        {{ __('Our Expertise') }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="smartphone" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Product Strategy') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Market research, user persona definition, and roadmap planning to ensure product-market fit.') }}</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="palette" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('UI/UX Design') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Crafting intuitive interfaces that users love.') }}</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="cloud_sync" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Cloud Infrastructure') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Robust backend architecture on AWS, Azure, or Google Cloud.') }}</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="bug_report" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Tested for High Reliability') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Every feature is backed by automated tests before release so your application won\'t break on your users.') }}</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="update" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Support & Monitoring') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Ongoing support, updates, and optimization to keep your app ahead of the curve.') }}</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <x-app-icon name="security" class="w-5 h-5 text-primary" />
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Bank-Grade Security') }}</h3>
                            </div>
                            <p class="text-sm text-text-secondary dark:text-gray-400">{{ __('Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2) built-in from day one.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative w-full py-24 bg-background-light dark:bg-background-dark">
        <div class="layout-container flex flex-col items-center justify-center px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-text-main dark:text-white mb-6 tracking-tight">{{ __('Ready to Accelerate Your Digital Growth?') }}</h2>
            <p class="text-lg text-text-secondary dark:text-gray-400 max-w-2xl mb-10">
                {{ __('Let\'s build something extraordinary together. Schedule a free consultation with our engineering team.') }}
            </p>
            <button type="button" 
                @click="$dispatch('open-consultation-modal')"
                class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-primary text-white hover:bg-teal-600 hover:scale-105 transition-all shadow-xl shadow-primary/30 text-lg font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">{{ __('Book 15-Min Free Call') }}</span>
            </button>
        </div>
    </div>
@endsection
