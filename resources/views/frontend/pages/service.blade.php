@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title) !!},
    "serviceType": {!! json_encode($service->category ?? $service->title) !!},
    "description": {!! json_encode($service->short_description ?? \Illuminate\Support\Str::limit(strip_tags($service->content ?? ''), 160)) !!},
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
            "name": {!! json_encode($service->title) !!},
            "item": "{{ url('/services/' . $service->slug) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <!-- Hero / Header -->
        <section id="service-hero-section" class="relative w-full overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 bg-grid-pattern">
            <div class="absolute inset-0 bg-white/80 dark:bg-[#090D16]/90 pointer-events-none"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                    <div class="flex flex-col gap-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/20 w-fit">
                            <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                            <span class="text-xs font-semibold uppercase tracking-wider text-teal-600 dark:text-teal-400">{{ __('Services') }}</span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-instrumentsans tracking-tight text-slate-900 dark:text-white leading-tight">
                            {{ __($service->title) }}
                        </h1>
                        <p class="text-lg text-slate-600 dark:text-slate-300 max-w-lg leading-relaxed">
                            {{ __($service->short_description) }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 mt-2">
                            <a href="/contact" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">{{ __($service->cta_text ?? 'Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                                    <span class="text-two">{{ __($service->cta_text ?? 'Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
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
                    <div class="w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 shadow-2xl flex items-center justify-center relative">
                        @if ($service->hero_image)
                            <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center text-slate-300 dark:text-slate-700">
                                <x-app-icon :name="$service->icon ?? 'layers'" class="w-48 h-48 text-teal-500/10" />
                            </div>
                            @if (isset($service->features) && count($service->features) > 0)
                                <div class="absolute bottom-6 left-6 right-12 p-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur rounded-xl border border-slate-200/80 dark:border-white/10 shadow-lg">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center text-teal-600 dark:text-teal-400">
                                            <x-app-icon :name="$service->features[0]['icon'] ?? 'check_circle'" class="w-4 h-4" />
                                        </div>
                                        <span class="font-bold text-slate-900 dark:text-white text-sm">{{ __($service->features[0]['title'] ?? 'Top Feature') }}</span>
                                    </div>
                                    <div class="h-1 w-full bg-slate-100 dark:bg-slate-700 rounded overflow-hidden">
                                        <div class="h-full bg-teal-500 w-3/4"></div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Technologies -->
        @if (isset($service->technologies) && count($service->technologies) > 0)
            <section class="border-y border-slate-200/80 dark:border-white/10 bg-white dark:bg-[#090D16] py-10 w-full">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-8">
                        {{ __('Powered by Modern Technologies') }}
                    </p>
                    <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale transition-all duration-500 hover:grayscale-0">
                        @foreach ($service->technologies as $tech)
                            <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-slate-300">
                                <x-app-icon :name="$tech['icon'] ?? 'code'" class="w-7 h-7" />
                                {{ $tech['name'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Content / Features -->
        <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-4 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black font-instrumentsans leading-tight text-slate-900 dark:text-white">
                        {{ __('Why Choose Accelerate Lab?') }}
                    </h2>
                    <div class="prose prose-lg prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-300">
                        {!! $service->content !!}
                    </div>
                </div>

                @if (isset($service->features) && count($service->features) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        @foreach ($service->features as $feature)
                            <div class="group flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 transition-all hover:shadow-lg">
                                <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                                    <x-app-icon :name="$feature['icon'] ?? 'star'" class="w-6 h-6" />
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __($feature['title']) }}</h3>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                        {{ __($feature['description'] ?? '') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- Process -->
        @if (isset($service->process) && count($service->process) > 0)
            <section class="w-full bg-slate-50/60 dark:bg-[#090D16]/50 py-16 md:py-24 border-y border-slate-200/80 dark:border-white/10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col gap-10">
                        <div>
                            <h2 class="text-3xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('How We Work') }}</h2>
                            <p class="text-slate-600 dark:text-slate-400">{{ __('A proven methodology from inception to release.') }}</p>
                        </div>
                        <div class="relative pl-4 border-l border-slate-200 dark:border-slate-800 space-y-8">
                            @foreach ($service->process as $step)
                                <div class="relative pl-8">
                                    <span class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-teal-500 ring-4 ring-white dark:ring-slate-900"></span>
                                    <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white">{{ __($step['title']) }}</h3>
                                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                                        {{ __($step['description'] ?? '') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- CTA -->
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
