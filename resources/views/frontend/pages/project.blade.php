@extends('frontend.components.layout', [
    'title' => $title ?? ($project->title . ' - Case Study | Accelerate Lab'),
    'description' => $description ?? ($project->description ?? 'Case study by Accelerate Lab.'),
    'ogImage' => !empty($ogImage) ? $ogImage : ($project->image_path ? url(\Illuminate\Support\Facades\Storage::url($project->image_path)) : asset('images/og-cover.png')),
])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "CreativeWork",
    "name": {!! json_encode($project->title) !!},
    "headline": {!! json_encode($project->title) !!},
    "description": {!! json_encode($project->description ?? \Illuminate\Support\Str::limit(strip_tags($project->challenge ?? ''), 160)) !!},
    "creator": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab"
    },
    "customer": {!! json_encode($project->client ?? 'Confidential Enterprise Client') !!}
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
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     PROJECT CASE STUDY HERO (Accelerate Studio Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumbs --}}
        <div class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#00BFA5]">HOME</a>
            <span>/</span>
            <a href="{{ route('case-studies') }}" class="hover:text-[#00BFA5]">CASE STUDIES</a>
            <span>/</span>
            <span class="text-[#00BFA5] uppercase">{{ $project->slug }}</span>
        </div>

        <div class="max-w-4xl fade-anim" data-direction="bottom">
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @if(!empty($project->client))
                    <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-[#00BFA5]/15 text-[#00BFA5] border border-[#00BFA5]/30">
                        {{ $project->client }}
                    </span>
                @endif
                @if(!empty($project->industry))
                    <span class="px-3 py-1 rounded-full text-xs font-mono font-medium bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300">
                        {{ $project->industry }}
                    </span>
                @endif
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                {{ $project->title }}
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 max-w-3xl">
                {{ $project->description }}
            </p>
        </div>

        {{-- Main Project Cover Image Container --}}
        <div class="mt-8 rounded-3xl overflow-hidden border border-slate-200/80 dark:border-white/10 shadow-2xl bg-slate-950 h-80 sm:h-[480px] relative fade-anim" data-direction="bottom">
            @if(!empty($project->image_path))
                <img src="{{ asset('storage/' . $project->image_path) }}"
                     alt="{{ $project->title }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-500 font-mono text-base">
                    [Accelerate Lab Production Blueprint: {{ $project->title }}]
                </div>
            @endif
        </div>
    </div>
</section>

{{-- ========================================================================
     CHALLENGE VS SOLUTION & STATS (Accelerate Impact Cards)
     ======================================================================== --}}
<section class="py-16 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Measurable Impact Stats --}}
        @php
            $displayStats = !empty($project->stats) && is_array($project->stats) ? $project->stats : [
                ['value' => '99.9%', 'label' => 'System Reliability & Uptime SLA'],
                ['value' => '4.2x', 'label' => 'Throughput Scalability Multiplier'],
                ['value' => '<120ms', 'label' => 'Global Real-time Latency SLA'],
            ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-16">
            @foreach($displayStats as $stat)
                <div class="bento-card p-6 sm:p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 text-center fade-anim" data-direction="bottom">
                    <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-[#00BFA5] block mb-1 t-counter">
                        {{ $stat['value'] ?? '' }}
                    </span>
                    <span class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 font-medium">
                        {{ $stat['label'] ?? '' }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- Challenge vs Solution Comparison Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            {{-- Challenge Card --}}
            <div class="bento-card p-8 sm:p-10 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg fade-anim" data-direction="left">
                <span class="text-xs font-mono font-semibold uppercase text-red-500 dark:text-red-400 tracking-wider">
                    01 // THE BUSINESS CHALLENGE
                </span>
                <h3 class="font-instrumentsans text-2xl font-bold text-slate-900 dark:text-white mt-2 mb-4">
                    Tantangan Bisnis & Kendala Sistem
                </h3>
                <div class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed prose dark:prose-invert max-w-none">
                    {!! $project->challenge !!}
                </div>
            </div>

            {{-- Solution Card --}}
            <div class="bento-card p-8 sm:p-10 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg fade-anim" data-direction="right">
                <span class="text-xs font-mono font-semibold uppercase text-[#00BFA5] tracking-wider">
                    02 // STRATEGIC SOLUTION
                </span>
                <h3 class="font-instrumentsans text-2xl font-bold text-slate-900 dark:text-white mt-2 mb-4">
                    Solusi Terintegrasi & Rekayasa Skalabel
                </h3>
                <div class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed prose dark:prose-invert max-w-none">
                    {!! $project->solution !!}
                </div>
            </div>
        </div>

        {{-- Capabilities & Methodologies --}}
        @if(!empty($project->technology_tags) && is_array($project->technology_tags))
            <div class="p-8 bento-card bg-slate-100/60 dark:bg-slate-900/40 border border-slate-200/80 dark:border-white/10 mb-16 fade-anim" data-direction="bottom">
                <span class="text-xs font-mono font-semibold uppercase text-slate-400 block mb-4">Capabilities & Methodologies</span>
                <div class="flex flex-wrap gap-2.5">
                    @foreach($project->technology_tags as $tag)
                        <span class="px-3 py-1.5 rounded-lg text-xs font-mono font-medium bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-white/10 shadow-sm">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Return CTA --}}
        <div class="text-center pt-8 border-t border-slate-200/80 dark:border-white/5">
            <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-primary px-8 py-3.5 text-sm font-semibold">
                <span class="btn-wrap">
                    <span class="text-1">← Back to All Case Studies</span>
                    <span class="text-2">Explore More Client Results</span>
                </span>
            </a>
        </div>
    </div>
</section>

@endsection
