@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title ?? 'Web Application Development') !!},
    "serviceType": {!! json_encode($service->category ?? 'Web Development') !!},
    "description": {!! json_encode($service->short_description ?? 'High-performance web applications engineered for scalability and speed.') !!},
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
    <main class="flex-1 flex flex-col items-center w-full">
        <!-- Hero Section -->
        <section id="service-hero-section" class="relative w-full overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 bg-grid-pattern">
            <div class="absolute inset-0 bg-white/80 dark:bg-[#090D16]/90 pointer-events-none"></div>
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                    <div class="flex flex-col gap-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/20 w-fit">
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                            <span class="text-xs font-semibold uppercase tracking-wider text-teal-600 dark:text-teal-400">{{ __('Web Development') }}</span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-instrumentsans tracking-tight text-slate-900 dark:text-white leading-tight">
                            {{ __('High-Performance Web Applications') }}
                        </h1>
                        <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                            {{ __('Scalable, secure, and lightning-fast web solutions tailored for your business growth. We build digital products that accelerate your success using cutting-edge architecture.') }}
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
                                class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center text-slate-300 dark:text-slate-700">
                                <div class="w-3/4 h-3/4 grid grid-cols-6 grid-rows-6 gap-2 opacity-50 rotate-[-12deg] scale-110">
                                    <div class="col-span-2 row-span-2 bg-teal-500/10 rounded-lg"></div>
                                    <div class="col-span-1 row-span-1 bg-teal-500/20 rounded-lg"></div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 dark:bg-slate-700 rounded-lg"></div>
                                    <div class="col-span-1 row-span-3 bg-teal-500/30 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-slate-300 dark:bg-slate-600 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-teal-500/20 rounded-lg col-start-4 row-start-3"></div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 dark:bg-slate-700 rounded-lg col-start-2 row-start-5"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack -->
        <section class="w-full border-y border-slate-200/80 dark:border-white/10 bg-white dark:bg-[#090D16] py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-8">
                    {{ __('Powered by Modern Technologies') }}
                </p>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale transition-all duration-500 hover:grayscale-0">
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="code_blocks" class="w-7 h-7" /> React
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="dns" class="w-7 h-7" /> Node.js
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="cloud" class="w-7 h-7" /> AWS
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="terminal" class="w-7 h-7" /> Python
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="database" class="w-7 h-7" /> PostgreSQL
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                        <x-app-icon name="layers" class="w-7 h-7" /> Next.js
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Accelerate Lab -->
        <section class="w-full py-16 md:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-4 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black font-instrumentsans leading-tight text-slate-900 dark:text-white">
                        {{ __('Why Choose Accelerate Lab?') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-300 text-lg">
                        {{ __('We combine engineering excellence with modern design principles to deliver products that stand out.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 transition-all hover:shadow-lg">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="bolt" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('Lightning Speed') }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Optimized specifically for Core Web Vitals and performance metrics that matter to your users and SEO rankings.') }}
                            </p>
                        </div>
                    </div>
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 transition-all hover:shadow-lg">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="verified_user" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('Bank-Grade Security') }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2) built-in from day one.') }}
                            </p>
                        </div>
                    </div>
                    <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 transition-all hover:shadow-lg">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                            <x-app-icon name="trending_up" class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('Infinite Scalability') }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Cloud-native architectures designed to grow with your business, handling millions of requests without breaking a sweat.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Expertise & Process -->
        <section class="w-full bg-slate-50/60 dark:bg-[#090D16]/50 py-16 md:py-24 border-y border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('Our Expertise') }}</h2>
                            <p class="text-slate-600 dark:text-slate-400">{{ __('Comprehensive development services covering every layer of the stack.') }}</p>
                        </div>
                        <div class="flex flex-col gap-3">
                            <details class="group rounded-xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="html" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                                        <p class="text-slate-900 dark:text-white text-sm font-bold">{{ __('Frontend Development') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-slate-700 dark:text-slate-300 transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                        {{ __('We craft responsive, interactive, and pixel-perfect user interfaces using modern frontend frameworks.') }}
                                    </p>
                                </div>
                            </details>
                            <details class="group rounded-xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="storage" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                                        <p class="text-slate-900 dark:text-white text-sm font-bold">{{ __('Backend Architecture') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-slate-700 dark:text-slate-300 transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                        {{ __('Robust server-side logic and scalable databases that securely power your core business workflows.') }}
                                    </p>
                                </div>
                            </details>
                            <details class="group rounded-xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="api" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                                        <p class="text-slate-900 dark:text-white text-sm font-bold">{{ __('API Integration') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-slate-700 dark:text-slate-300 transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                        {{ __('Seamless connection between your services and third-party tools.') }}
                                    </p>
                                </div>
                            </details>
                            <details class="group rounded-xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <x-app-icon name="cloud_queue" class="w-5 h-5 text-teal-600 dark:text-teal-400" />
                                        <p class="text-slate-900 dark:text-white text-sm font-bold">{{ __('Cloud Infrastructure') }}</p>
                                    </div>
                                    <x-app-icon name="expand_more" class="w-5 h-5 text-slate-700 dark:text-slate-300 transition-transform group-open:rotate-180" />
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                        {{ __('Scalable, cost-effective, and highly available cloud deployments on AWS, GCP, and Azure.') }}
                                    </p>
                                </div>
                            </details>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('How We Work') }}</h2>
                            <p class="text-slate-600 dark:text-slate-400">{{ __('A transparent, agile process from concept to deployment.') }}</p>
                        </div>
                        <div class="relative pl-4 border-l border-slate-200 dark:border-slate-800 space-y-8">
                            <div class="relative pl-8">
                                <span class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-teal-500 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('1. Define') }}</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-teal-500 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('2. Design') }}</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-teal-500 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('3. Develop') }}</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                            </div>
                            <div class="relative pl-8">
                                <span class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-teal-500 ring-4 ring-white dark:ring-slate-900"></span>
                                <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __('4. Deploy') }}</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ __('Launch, monitor, and scale.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="w-full py-20 bg-teal-600 dark:bg-slate-900 text-center relative overflow-hidden">
            <div class="max-w-4xl mx-auto px-4 flex flex-col items-center gap-6">
                <h2 class="text-3xl md:text-5xl font-black font-instrumentsans text-white leading-tight">
                    {{ __('Ready to Accelerate Your Digital Growth?') }}
                </h2>
                <p class="text-teal-100 text-lg max-w-2xl">
                    {{ __('Let\'s build something extraordinary together. Schedule a free consultation with our engineering team.') }}
                </p>
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')"
                    class="rr-btn !bg-white !text-slate-900 hover:!text-white border-0 shadow-xl mt-4">
                    <span class="btn-wrap">
                        <span class="text-one">{{ __('Book 15-Min Free Call') }}</span>
                        <span class="text-two">{{ __('Book 15-Min Free Call') }}</span>
                    </span>
                </button>
            </div>
        </section>
    </main>
@endsection
