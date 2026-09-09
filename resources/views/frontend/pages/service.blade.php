@extends('frontend.components.layout', [
    'title' => $title ?? ($service->title . ' - Accelerate Lab'),
    'description' => $description ?? ($service->short_description ?? 'Enterprise digital capabilities by Accelerate Lab.')
])

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
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     SERVICE HERO (70% Redox Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumbs --}}
        <div class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#00BFA5]">HOME</a>
            <span>/</span>
            <a href="{{ route('services') }}" class="hover:text-[#00BFA5]">SERVICES</a>
            <span>/</span>
            <span class="text-[#00BFA5] uppercase">{{ $service->slug }}</span>
        </div>

        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-4">
                <span>✦ {{ strtoupper($service->category ?? 'ENGINEERING') }}</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                {{ $service->title }}
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8">
                {{ $service->short_description }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-7 py-3.5 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $service->cta_text ?? ($currentLocale === 'id' ? 'Mulai Proyek Ini' : 'Initiate Project') }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Hubungi Tim Rekayasa' : 'Talk with Architects' }}</span>
                    </span>
                </a>
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-border px-6 py-3.5 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">Direct Consultation</span>
                        <span class="text-2">&lt; 24h Response</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================
     SERVICE CONTENT & BLUEPRINT (30% NextSaaS Container)
     ======================================================================== --}}
<section class="py-16 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            {{-- Main Content Column --}}
            <div class="lg:col-span-2 flex flex-col gap-10">
                @if(!empty($service->content))
                    <div class="bento-card p-8 sm:p-10 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl prose dark:prose-invert max-w-none text-slate-700 dark:text-slate-300">
                        {!! $service->content !!}
                    </div>
                @endif

                {{-- Key Features Bento Cards --}}
                @if(!empty($service->features) && is_array($service->features))
                    <div>
                        <h2 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-6">
                            Technical Capabilities & Key Features
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($service->features as $feature)
                                <div class="bento-card p-5 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10">
                                    <div class="w-8 h-8 rounded-lg bg-[#00BFA5]/10 text-[#00BFA5] flex items-center justify-center font-bold mb-3">✓</div>
                                    <h4 class="font-instrumentsans text-base font-bold text-slate-900 dark:text-white">
                                        {{ is_array($feature) ? ($feature['title'] ?? '') : $feature }}
                                    </h4>
                                    @if(is_array($feature) && !empty($feature['description']))
                                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-1 leading-relaxed">
                                            {{ $feature['description'] }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar Blueprint Column --}}
            <div class="flex flex-col gap-6">
                {{-- Technologies Blueprint Card --}}
                @if(!empty($service->technologies) && is_array($service->technologies))
                    <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl">
                        <span class="text-xs font-mono font-semibold uppercase text-slate-400">TECHNOLOGY STACK</span>
                        <h3 class="font-instrumentsans text-lg font-bold text-slate-900 dark:text-white mt-1 mb-4">Core Frameworks & Tools</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($service->technologies as $tech)
                                <span class="px-3 py-1.5 rounded-lg text-xs font-mono font-medium bg-slate-100 dark:bg-white/5 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-white/10">
                                    {{ is_array($tech) ? ($tech['name'] ?? '') : $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Direct Contact Box --}}
                <div class="bento-card p-6 bg-slate-900 text-white border border-slate-800 shadow-xl">
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">READY TO ARCHITECT?</span>
                    <h3 class="font-instrumentsans text-xl font-bold mt-1 mb-3">Let's discuss this service</h3>
                    <p class="text-xs text-slate-300 leading-relaxed mb-6">
                        Get direct architectural guidance from senior software engineers within 24 hours.
                    </p>
                    <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary w-full py-3 text-xs font-semibold text-center">
                        <span class="btn-wrap">
                            <span class="text-1">Request Technical Scoping</span>
                            <span class="text-2">hello@acceleratelab.id</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
