@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title ?? 'Custom Web Application Development') !!},
    "serviceType": {!! json_encode($service->category ?? 'Web Engineering') !!},
    "description": {!! json_encode($service->short_description ?? 'Enterprise-grade custom web application engineering with high velocity and performance.') !!},
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
            "name": {!! json_encode($service->title ?? 'Web Application Development') !!},
            "item": "{{ url('/services/' . ($service->slug ?? 'web-application-development')) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <main class="flex-grow">
        <section id="service-hero-section" class="relative px-4 py-12 md:py-20 lg:py-28 max-w-7xl mx-auto w-full">
            <div class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl opacity-50">
            </div>
            <div class="flex flex-col gap-10 md:flex-row md:items-center">
                <div class="flex flex-col gap-6 md:w-1/2 lg:pr-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-border-light w-fit">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-xs font-semibold uppercase tracking-wider text-text-secondary">{{ __('Web Development') }}</span>
                    </div>
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] tracking-tight text-text-main dark:text-white">
                        {{ __('High-Performance Web Applications') }}
                    </h1>
                    <p class="text-lg text-text-secondary dark:text-gray-300 max-w-lg leading-relaxed">
                        {{ __('Scalable, secure, and lightning-fast web solutions tailored for your business growth. We build digital products that accelerate your success using cutting-edge architecture.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <a href="/contact"
                            class="flex items-center justify-center h-12 px-6 rounded-lg bg-primary hover:bg-primary-dark text-white text-base font-bold transition-all shadow-lg shadow-primary/20 group">
                            {{ __('Estimate Your Project') }}
                            <x-app-icon name="arrow_forward" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" />
                        </a>
                        <a href="/case-studies"
                            class="flex items-center justify-center h-12 px-6 rounded-lg border border-border-medium dark:border-slate-700 bg-transparent hover:bg-border-light dark:hover:bg-slate-800 text-text-main dark:text-white text-base font-semibold transition-colors">
                            {{ __('Case Studies') }}
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative mt-8 md:mt-0">
                    <div
                        class="relative w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white border border-border-light shadow-2xl">
                        @if ($service->hero_image)
                            <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <!-- Fallback Abstract Art -->
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center text-border-medium"
                                data-alt="Abstract 3D illustration">
                                <div
                                    class="w-3/4 h-3/4 grid grid-cols-6 grid-rows-6 gap-2 opacity-50 rotate-[-12deg] scale-110">
                                    <div class="col-span-2 row-span-2 bg-primary/10 rounded-lg"></div>
                                    <div class="col-span-1 row-span-1 bg-primary/20 rounded-lg"></div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 rounded-lg"></div>
                                    <div class="col-span-1 row-span-3 bg-primary/30 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-slate-300 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-primary/20 rounded-lg col-start-4 row-start-3">
                                    </div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 rounded-lg col-start-2 row-start-5">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="border-y border-border-light dark:border-slate-800 bg-white dark:bg-surface-dark py-10">
            <div class="max-w-7xl mx-auto px-4 md:px-10">
                <p
                    class="text-center text-sm font-semibold text-text-secondary dark:text-gray-400 uppercase tracking-widest mb-8">
                    {{ __('Powered by Modern Technologies') }}</p>
                <div
                    class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale transition-all duration-500 hover:grayscale-0">
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="code_blocks" class="w-7 h-7" /> React
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="dns" class="w-7 h-7" /> Node.js
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="cloud" class="w-7 h-7" /> AWS
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="terminal" class="w-7 h-7" /> Python
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="database" class="w-7 h-7" /> PostgreSQL
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <x-app-icon name="layers" class="w-7 h-7" /> Next.js
                    </div>
                </div>
            </div>
        </section>
        <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 md:px-10">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-4 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black leading-tight text-text-main dark:text-white">
                        {{ __('Why Choose Accelerate Lab?') }}
                    </h2>
                    <p class="text-text-secondary dark:text-gray-300 text-lg">
                        {{ __('We combine engineering excellence with modern design principles to deliver products that stand out.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <x-app-icon name="bolt" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('Lightning Speed') }}</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                {{ __('Optimized specifically for Core Web Vitals and performance metrics that matter to your users and SEO rankings.') }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <x-app-icon name="verified_user" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('Bank-Grade Security') }}</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                {{ __('Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2) built-in from day one.') }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <x-app-icon name="trending_up" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">{{ __('Infinite Scalability') }}</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                {{ __('Cloud-native architectures designed to grow with your business, handling millions of requests without breaking a sweat.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white dark:bg-surface-dark py-16 md:py-24 border-y border-border-light dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 md:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold text-text-main dark:text-white mb-4">{{ __('Our Expertise') }}</h2>
                            <p class="text-text-secondary dark:text-gray-300">{{ __('Comprehensive development services covering every layer of the stack.') }}</p>
                        </div>
                        <div class="flex flex-col gap-3">
                            <details
                                class="group rounded-lg border border-border-medium dark:border-slate-700 bg-background-light dark:bg-slate-900/50 open:bg-white dark:open:bg-slate-800 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="html" class="w-5 h-5 text-primary" />
                                        <p class="text-text-main dark:text-white text-sm font-bold">{{ __('Frontend Development') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-text-main dark:text-white transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary dark:text-gray-300 text-sm leading-relaxed">
                                        {{ __('We craft responsive, interactive, and pixel-perfect user interfaces using modern frontend frameworks.') }}
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium dark:border-slate-700 bg-background-light dark:bg-slate-900/50 open:bg-white dark:open:bg-slate-800 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="storage" class="w-5 h-5 text-primary" />
                                        <p class="text-text-main dark:text-white text-sm font-bold">{{ __('Backend Architecture') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-text-main dark:text-white transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary dark:text-gray-300 text-sm leading-relaxed">
                                        {{ __('Robust server-side logic and scalable databases that securely power your core business workflows.') }}
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium dark:border-slate-700 bg-background-light dark:bg-slate-900/50 open:bg-white dark:open:bg-slate-800 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="api" class="w-5 h-5 text-primary" />
                                        <p class="text-text-main dark:text-white text-sm font-bold">{{ __('API Integration') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-text-main dark:text-white transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary dark:text-gray-300 text-sm leading-relaxed">
                                        {{ __('Seamless connection between your services and third-party tools.') }}
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium dark:border-slate-700 bg-background-light dark:bg-slate-900/50 open:bg-white dark:open:bg-slate-800 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="cloud_queue" class="w-5 h-5 text-primary" />
                                        <p class="text-text-main dark:text-white text-sm font-bold">{{ __('Cloud Infrastructure') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-text-main dark:text-white transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary dark:text-gray-300 text-sm leading-relaxed">
                                        {{ __('Robust backend architecture on AWS, Azure, or Google Cloud.') }}
                                    </p>
                                </div>
                            </details>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold text-text-main dark:text-white mb-4">{{ __('How We Build') }}</h2>
                            <p class="text-text-secondary dark:text-gray-300">{{ __('A transparent, agile process from concept to deployment.') }}</p>
                        </div>
                        <div class="relative pl-4 border-l border-border-medium dark:border-slate-700 space-y-8">
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-primary ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold text-text-main dark:text-white">{{ __('1. Define') }}</h3>
                                <p class="mt-1 text-sm text-text-secondary dark:text-gray-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium dark:bg-slate-600 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold text-text-main dark:text-white">{{ __('2. Design') }}</h3>
                                <p class="mt-1 text-sm text-text-secondary dark:text-gray-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium dark:bg-slate-600 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold text-text-main dark:text-white">{{ __('3. Develop') }}</h3>
                                <p class="mt-1 text-sm text-text-secondary dark:text-gray-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium dark:bg-slate-600 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold text-text-main dark:text-white">{{ __('4. Deploy') }}</h3>
                                <p class="mt-1 text-sm text-text-secondary dark:text-gray-400">{{ __('Launch, monitor, and scale.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="px-4 pb-12 md:pb-24 max-w-7xl mx-auto w-full pt-16">
            <div class="bg-primary rounded-2xl p-10 md:p-20 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                    <div class="absolute right-[-100px] top-[-100px] w-[300px] h-[300px] rounded-full bg-white blur-3xl">
                    </div>
                    <div class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] rounded-full bg-black blur-3xl">
                    </div>
                </div>
                <div class="relative z-10 flex flex-col items-center gap-6 max-w-2xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-black text-white leading-tight">{{ __('Ready to Accelerate Your Digital Growth?') }}</h2>
                    <p class="text-white/90 text-lg">{{ __('Let\'s build something extraordinary together. Schedule a free consultation with our engineering team.') }}</p>
                    <button type="button" 
                        @click="$dispatch('open-consultation-modal')"
                        class="mt-4 bg-white text-primary hover:bg-slate-50 font-bold py-4 px-8 rounded-lg shadow-xl shadow-black/10 transition-transform active:scale-95 text-lg">
                        {{ __('Book 15-Min Free Call') }}
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection
