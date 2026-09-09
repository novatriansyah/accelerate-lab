@extends('frontend.components.layout', [
    'title' => 'The Lab - Experimental R&D & Prototypes | Accelerate Lab',
    'description' => 'Explore experimental prototypes, architectural sandboxes, and proof-of-concepts engineered by Accelerate Lab.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-16 lg:mb-20 fade-anim" data-direction="bottom">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>R&D Solusi Digital</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Laboratorium <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Eksperimen Digital</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed mb-8">
            Eksplorasi prototipe interaktif, pengujian efisiensi alur kerja, dan validasi inovasi masa depan yang memberikan keunggulan kompetitif bagi para mitra Accelerate Lab.
        </p>

        <div class="flex items-center justify-center gap-4">
            <a href="{{ url('/case-studies') }}" class="rr-btn rr-btn-primary">
                <span class="btn-wrap">
                    <span class="text-1">Lihat Hasil Studi Kasus</span>
                    <span class="text-2">Lihat Hasil Studi Kasus</span>
                </span>
            </a>
            <a href="{{ url('/blog') }}" class="rr-btn rr-btn-outline">
                <span class="btn-wrap">
                    <span class="text-1">Baca Wawasan & Riset</span>
                    <span class="text-2">Baca Wawasan & Riset</span>
                </span>
            </a>
        </div>
    </section>
</main>
@endsection
