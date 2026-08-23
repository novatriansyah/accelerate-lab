@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title ?? 'Cloud Architecture & DevOps') !!},
    "serviceType": {!! json_encode($service->category ?? 'Cloud Infrastructure') !!},
    "description": {!! json_encode($service->short_description ?? 'Scalable, secure, and future-proof cloud infrastructure engineering.') !!},
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
            "name": {!! json_encode($service->title ?? 'Cloud Architecture') !!},
            "item": "{{ url('/services/' . ($service->slug ?? 'cloud-architecture')) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <section class="relative overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 hero-gradient bg-grid-pattern">
        <div class="absolute inset-0 bg-white/60 dark:bg-background-dark/90 pointer-events-none"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                <div class="flex flex-col gap-6">
                    <div
                        class="inline-flex items-center rounded-full border border-primary/20 bg-primary/5 px-3 py-1 text-xs font-semibold text-primary w-fit">
                        <span class="flex h-2 w-2 rounded-full bg-primary mr-2 animate-pulse"></span>
                        {{ __('Cloud Infrastructure') }}
                    </div>
                    <h1 class="text-4xl font-black tracking-tight text-text-header sm:text-5xl lg:text-6xl dark:text-white">
                        {{ __('Scalable. Secure. Future-Proof.') }}
                    </h1>
                    <p class="text-lg text-text-main max-w-xl leading-relaxed dark:text-slate-300">
                        {{ __('We design resilient cloud infrastructure that grows with your business, reducing latency and operational costs while maximizing performance.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <a href="/contact"
                            class="flex h-12 items-center justify-center rounded-lg bg-primary px-8 text-base font-bold text-white transition-all hover:bg-primary-dark shadow-lg shadow-primary/20">
                            {{ __('Estimate Your Project') }}
                        </a>
                        <a href="/case-studies"
                            class="flex h-12 items-center justify-center rounded-lg border border-slate-200 bg-white px-8 text-base font-semibold text-text-header transition-all hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-white dark:hover:bg-slate-700">
                            {{ __('Case Studies') }}
                        </a>
                    </div>
                    <div class="mt-8 flex items-center gap-6 text-sm text-slate-500 font-medium dark:text-slate-400">
                        <div class="flex items-center gap-2">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-primary" />
                            <span>AWS Certified</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-primary" />
                            <span>Azure Partners</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-app-icon name="check_circle" class="w-5 h-5 text-primary" />
                            <span>GCP Experts</span>
                        </div>
                    </div>
                </div>
                <div class="relative lg:ml-auto w-full max-w-lg lg:max-w-none">
                    <div class="absolute -top-12 -right-12 size-64 rounded-full bg-primary/10 blur-3xl"></div>
                    <div class="absolute -bottom-12 -left-12 size-64 rounded-full bg-blue-500/10 blur-3xl"></div>
                    <div class="relative mt-8 md:mt-0">
                        <div
                            class="relative w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white border border-border-light shadow-2xl">
                            @if ($service->hero_image)
                                <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center text-border-medium">
                                    <div class="w-3/4 h-3/4 flex flex-col gap-4 opacity-50 -rotate-6 scale-110">
                                        <div class="h-16 w-full bg-primary/10 rounded-xl"></div>
                                        <div class="flex gap-4 h-full">
                                            <div class="w-1/3 bg-slate-200 rounded-xl"></div>
                                            <div class="w-2/3 bg-primary/5 rounded-xl"></div>
                                        </div>
                                        <div class="h-20 w-full bg-slate-300 rounded-xl"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
    </section>
    <section class="py-10 border-y border-slate-100 bg-white dark:bg-background-dark dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-8">{{ __('Powered by Modern Technologies') }}</p>
            <div
                class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><x-app-icon name="cloud" class="w-5 h-5" /> AWS</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><x-app-icon name="window" class="w-5 h-5" /> Azure</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><x-app-icon name="circle" class="w-5 h-5" /> Google Cloud</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><x-app-icon name="deployed_code" class="w-5 h-5" /> Docker</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><x-app-icon name="anchor" class="w-5 h-5" /> Kubernetes</span>
            </div>
        </div>
    </section>
    <section class="py-20 bg-background-light dark:bg-background-dark">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 md:text-center max-w-3xl mx-auto">
                <h2 class="text-base font-semibold uppercase tracking-wide text-primary">{{ __('Core Capabilities') }}</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-text-header sm:text-4xl dark:text-white">
                    {{ __('Cloud Infrastructure') }}
                </p>
                <p class="mt-4 text-lg text-text-main dark:text-slate-300">
                    {{ __('We don\'t just write code; we architect solutions that scale with your business. Our engineering team utilizes the latest technologies to ensure your product is fast, secure, and ready for the future.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="cloud_upload" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Cloud Infrastructure') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Robust backend architecture on AWS, Azure, or Google Cloud.') }}</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="bolt" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Lightning Speed') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Optimized specifically for Core Web Vitals and performance metrics that matter to your users and SEO rankings.') }}</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="settings_suggest" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Automated CI/CD pipelines') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Streamline deployment with robust CI/CD pipelines to release faster and more reliably.') }}</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="security" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Bank-Grade Security') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2) built-in from day one.') }}</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="hub" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Infinite Scalability') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Cloud-native architectures designed to grow with your business, handling millions of requests without breaking a sweat.') }}</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <x-app-icon name="trending_up" class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">{{ __('Tested for High Reliability') }}</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">{{ __('Every feature is backed by automated tests before release so your application won\'t break on your users.') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white dark:bg-background-dark border-t border-slate-100 dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-black tracking-tight text-text-header sm:text-4xl mb-6 dark:text-white">
                        {{ __('How We Work') }}
                    </h2>
                    <p class="text-lg text-text-main mb-8 dark:text-slate-300">
                        {{ __('A proven process, from concept to deployment.') }}
                    </p>
                    <div class="relative pl-8 border-l-2 border-slate-200 dark:border-slate-700 space-y-10">
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <x-app-icon name="search" class="w-5 h-5" />
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">{{ __('1. Define') }}</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">{{ __('Scoping requirements and setting KPIs.') }}</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <x-app-icon name="design_services" class="w-5 h-5" />
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">{{ __('2. Design') }}</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">{{ __('Prototyping and high-fidelity visuals.') }}</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <x-app-icon name="construction" class="w-5 h-5" />
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">{{ __('3. Develop') }}</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">{{ __('Iterative coding sprints and QA testing.') }}</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <x-app-icon name="rocket_launch" class="w-5 h-5" />
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">{{ __('4. Deploy') }}</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">{{ __('Launch, monitor, and scale.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div
                                class="rounded-xl bg-slate-50 p-6 shadow-sm border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                <x-app-icon name="speed" class="w-8 h-8 text-primary mb-2" />
                                <div class="text-3xl font-black text-text-header dark:text-white">3x</div>
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('Faster Delivery') }}</div>
                            </div>
                            <div class="rounded-xl bg-primary p-6 shadow-sm text-white">
                                <x-app-icon name="savings" class="w-8 h-8 text-white/80 mb-2" />
                                <div class="text-3xl font-black">40%</div>
                                <div class="text-sm font-medium text-white/80">{{ __('Avg. Cost Reduction') }}</div>
                            </div>
                        </div>
                        <div class="space-y-4 mt-8">
                            <div
                                class="rounded-xl bg-slate-50 p-6 shadow-sm border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                <x-app-icon name="shield_lock" class="w-8 h-8 text-primary mb-2" />
                                <div class="text-3xl font-black text-text-header dark:text-white">99.9%</div>
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('SLA Guarantee') }}</div>
                            </div>
                            <div class="rounded-xl bg-slate-900 p-6 shadow-sm text-white border border-slate-800 h-full">
                                <x-app-icon name="support_agent" class="w-8 h-8 text-primary mb-2" />
                                <div class="text-3xl font-black">24/7</div>
                                <div class="text-sm font-medium text-slate-400">{{ __('Support & Monitoring') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20 bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-black text-white sm:text-4xl mb-6">{{ __('Ready to Accelerate Your Digital Growth?') }}</h2>
            <p class="text-xl text-primary-50 max-w-2xl mx-auto mb-10">
                {{ __('Let\'s build something extraordinary together. Schedule a free consultation with our engineering team.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')"
                    class="flex h-12 items-center justify-center rounded-lg bg-white px-8 text-base font-bold text-primary transition-all hover:bg-slate-100 shadow-xl">
                    {{ __('Book 15-Min Free Call') }}
                </button>
            </div>
        </div>
    </section>
@endsection
