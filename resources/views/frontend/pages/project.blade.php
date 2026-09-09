@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "CreativeWork",
    "name": {!! json_encode($project->title) !!},
    "headline": {!! json_encode($project->title) !!},
    "description": {!! json_encode($project->description ?? \Illuminate\Support\Str::limit(strip_tags($project->challenge ?? ''), 160)) !!},
    "image": {!! json_encode($project->image_path ? url(\Illuminate\Support\Facades\Storage::url($project->image_path)) : asset('images/logo.webp')) !!},
    "creator": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab"
    },
    "mainEntityOfPage": {
        "{{ '@' }}type": "WebPage",
        "{{ '@' }}id": "{{ url('/case-studies/' . $project->slug) }}"
    }
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
            "name": "Case Studies",
            "item": "{{ url('/case-studies') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 3,
            "name": {!! json_encode($project->title) !!},
            "item": "{{ url('/case-studies/' . $project->slug) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="project-hero-section" class="relative pt-32 pb-20 overflow-hidden bg-white dark:bg-[#090D16]">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent dark:from-primary/10"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl">
                <div class="flex items-center gap-4 mb-6">
                    @if ($project->industry)
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-teal-100 dark:bg-teal-900/50 text-teal-700 dark:text-teal-400">
                            {{ __($project->industry) }}
                        </span>
                    @endif
                    @if ($project->client)
                        <span class="text-sm font-medium text-slate-500 dark:text-slate-400">
                            {{ __('Client') }}: {{ $project->client }}
                        </span>
                    @endif
                </div>
                <h1 class="text-4xl md:text-6xl font-black font-instrumentsans text-slate-900 dark:text-white mb-6 leading-tight">
                    {{ $project->title }}
                </h1>
                <p class="text-xl text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl">
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Image -->
    @if ($project->image_path)
        <section class="relative -mt-12 z-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-2xl overflow-hidden shadow-2xl border border-slate-200/80 dark:border-white/10">
                    <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}"
                        class="w-full h-auto object-cover max-h-[600px]">
                </div>
            </div>
        </section>
    @endif

    <!-- Stats Section -->
    @if ($project->stats && count($project->stats) > 0)
        <section class="py-16 md:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($project->stats as $stat)
                        <div
                            class="p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-white/10 shadow-sm text-center">
                            <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ $stat['value'] }}</div>
                            <div class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wide">
                                {{ __($stat['label']) }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Challenge & Solution -->
    <section id="project-architecture-overview" class="py-16 bg-white dark:bg-[#090D16]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Content -->
                <div class="flex flex-col gap-12">
                    @if ($project->challenge)
                        <div>
                            <h2 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4 flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400">
                                    <x-app-icon name="crisis_alert" class="w-5 h-5" />
                                </span>
                                {{ __('The Challenge') }}
                            </h2>
                            <div class="prose prose-lg prose-slate dark:prose-invert text-slate-600 dark:text-slate-300">
                                {!! $project->challenge !!}
                            </div>
                        </div>
                    @endif

                    @if ($project->solution)
                        <div>
                            <h2 class="text-2xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-4 flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-teal-100 dark:bg-teal-900/30 text-teal-600 dark:text-teal-400">
                                    <x-app-icon name="lightbulb" class="w-5 h-5" />
                                </span>
                                {{ __('The Solution') }}
                            </h2>
                            <div class="prose prose-lg prose-slate dark:prose-invert text-slate-600 dark:text-slate-300">
                                {!! $project->solution !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:sticky lg:top-32 h-fit flex flex-col gap-8">
                    <!-- Technologies -->
                    @if ($project->technology_tags && count($project->technology_tags) > 0)
                        <div
                            class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/80 dark:border-white/10">
                            <h3 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-4">{{ __('Tech Stack') }}</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project->technology_tags as $tech)
                                    <span
                                        class="px-3 py-1 bg-white dark:bg-slate-700 rounded-full text-sm font-medium text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    @if ($project->gallery && count($project->gallery) > 0)
        <section class="py-16 md:py-24 bg-slate-50/80 dark:bg-slate-900/50 border-y border-slate-200/80 dark:border-white/10 transition-colors duration-300">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold font-instrumentsans text-center text-slate-900 dark:text-white mb-12">{{ __('Project Gallery') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($project->gallery as $image)
                        <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200/80 dark:border-white/10">
                            <img src="{{ Storage::url($image) }}" alt="{{ $project->title }} Screenshot"
                                class="w-full h-auto hover:scale-105 transition-transform duration-500">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Footer CTA -->
    <section class="py-20 bg-primary text-slate-900">
        <div class="mx-auto max-w-4xl px-4 text-center">
            <h2 class="text-3xl md:text-5xl font-black font-instrumentsans mb-6">{{ __('Building something similar?') }}</h2>
            <p class="text-lg md:text-xl font-medium opacity-90 mb-10 max-w-2xl mx-auto">
                {{ __('We can architect, design, and launch a tailored version for your business. Get a fast scope and timeline estimate in 30 seconds.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/contact"
                    class="rr-btn !bg-slate-950 !text-white !border-slate-950">
                    <span class="btn-wrap">
                        <span class="text-one text-white">{{ __('Estimate Your Project') }}</span>
                        <span class="text-two text-white">{{ __('Estimate Your Project') }}</span>
                    </span>
                </a>
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')"
                    class="rr-btn btn-border !border-slate-900/40 !text-slate-900">
                    <span class="btn-wrap">
                        <span class="text-one text-slate-900">{{ __('Book 15-Min Free Call') }}</span>
                        <span class="text-two text-slate-900">{{ __('Book 15-Min Free Call') }}</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
@endsection
