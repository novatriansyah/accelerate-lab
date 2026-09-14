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
     SERVICE HERO (Accelerate Studio Header)
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

        <div class="max-w-4xl fade-anim" data-direction="bottom">
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
     SERVICE CONTENT & BLUEPRINT (Accelerate Service Matrix)
     ======================================================================== --}}
<section class="py-16 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 fade-anim" data-direction="bottom">
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

                {{-- Direct Contact Box — WhatsApp First --}}
                @php
                    $sidebarPhone = preg_replace('/[^0-9]/', '', \App\Models\SiteSetting::where('key', 'contact_whatsapp')->first()?->value ?? config('services.whatsapp.number', '6285156543820'));
                    $sidebarWaMsg = urlencode($currentLocale === 'id'
                        ? 'Halo Accelerate Lab, saya ingin mendiskusikan kebutuhan ' . ($service->title ?? 'pengembangan teknologi') . ' untuk bisnis kami.'
                        : 'Hello Accelerate Lab, I would like to discuss ' . ($service->title ?? 'a project') . ' for my business.');
                    $sidebarWaUrl = "https://wa.me/{$sidebarPhone}?text={$sidebarWaMsg}";
                @endphp
                <div class="bento-card p-6 bg-slate-900 text-white border border-slate-800 shadow-xl">
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">{{ $currentLocale === 'id' ? 'MULAI DISKUSI?' : 'READY TO BUILD?' }}</span>
                    <h3 class="font-instrumentsans text-xl font-bold mt-1 mb-3">{{ $currentLocale === 'id' ? 'Chat langsung via WhatsApp' : 'Chat directly via WhatsApp' }}</h3>
                    <p class="text-xs text-slate-300 leading-relaxed mb-6">
                        {{ $currentLocale === 'id'
                            ? 'Diskusi kebutuhan proyek Anda langsung dengan tim teknis. Respons cepat, tanpa formulir panjang.'
                            : 'Discuss your project needs directly with our engineering team. Fast response, no lengthy forms.' }}
                    </p>
                    <a href="{{ $sidebarWaUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-xl bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-xs shadow-md transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.79.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.59.21-1.09.15-1.19-.06-.1-.23-.16-.48-.29z"/></svg>
                        <span>{{ $currentLocale === 'id' ? 'Chat via WhatsApp Sekarang' : 'Chat via WhatsApp Now' }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
