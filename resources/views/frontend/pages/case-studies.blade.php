@extends('frontend.components.layout', [
    'title' => $title ?? 'Case Studies - Selected Work | Accelerate Lab',
    'description' => $description ?? 'Explore enterprise software case studies and digital transformation platforms engineered by Accelerate Lab.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     PORTFOLIO HERO (Accelerate Studio Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl fade-anim" data-direction="bottom">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-6">
                <span>✦ PORTFOLIO & PROVEN RESULTS</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                {{ $currentLocale === 'id' ? 'Karya Rekayasa Nyata,' : 'Engineered Solutions,' }}
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent">
                    {{ $currentLocale === 'id' ? 'Dampak Terukur.' : 'Measurable Impact.' }}
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed mb-8">
                {{ $currentLocale === 'id'
                    ? 'Jelajahi studi kasus sistem digital, arsitektur cloud, dan aplikasi web berskala enterprise yang telah kami luncurkan bersama mitra bisnis.'
                    : 'Explore technical case studies of mission-critical platforms, cloud architectures, and digital systems successfully deployed in production.' }}
            </p>
        </div>
    </div>
</section>

{{-- ========================================================================
     PORTFOLIO GRID & FILTER BAR (Accelerate Matrix Grid & Filter)
     ======================================================================== --}}
<section class="py-12 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Filter Bar --}}
        <div class="flex flex-wrap items-center justify-between gap-4 mb-12 fade-anim" data-direction="bottom">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('case-studies') }}"
                   class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ empty($currentIndustry) ? 'bg-[#00BFA5] text-[#090D16] shadow-md shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10' }}">
                    All Industries
                </a>
                @foreach($industries as $ind)
                    <a href="{{ route('case-studies', ['industry' => $ind]) }}"
                       class="px-4 py-2 rounded-full text-xs font-semibold transition-all {{ $currentIndustry === $ind ? 'bg-[#00BFA5] text-[#090D16] shadow-md shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10' }}">
                        {{ $ind }}
                    </a>
                @endforeach
            </div>
            <span class="text-xs font-mono text-slate-400">{{ $projects->count() }} Case Studies Published</span>
        </div>

        {{-- Projects Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($projects as $project)
                <div class="bento-card group relative overflow-hidden bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl flex flex-col justify-between fade-anim" data-direction="bottom">
                    <div>
                        {{-- Project Visual Container --}}
                        <div class="relative h-64 sm:h-72 w-full overflow-hidden bg-slate-950">
                            @if(!empty($project->image_path))
                                <img src="{{ asset('storage/' . $project->image_path) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-600 font-mono text-sm">
                                    [Accelerate Lab System Blueprint]
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                            
                            {{-- Client / Industry Badge --}}
                            <div class="absolute top-4 left-4 flex items-center gap-2">
                                @if(!empty($project->client))
                                    <span class="px-3 py-1 rounded-full text-[11px] font-mono font-semibold bg-black/70 text-[#00BFA5] backdrop-blur-md border border-white/10">
                                        {{ $project->client }}
                                    </span>
                                @endif
                                @if(!empty($project->industry))
                                    <span class="px-3 py-1 rounded-full text-[11px] font-mono font-medium bg-white/10 text-white backdrop-blur-md border border-white/10">
                                        {{ $project->industry }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Card Details --}}
                        <div class="p-6 sm:p-8">
                            <h3 class="font-instrumentsans text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-[#00BFA5] transition-colors">
                                {{ $project->title }}
                            </h3>

                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ $project->description }}
                            </p>

                            {{-- Technology Tags --}}
                            @if(!empty($project->technology_tags) && is_array($project->technology_tags))
                                <div class="flex flex-wrap gap-1.5 mb-6">
                                    @foreach(array_slice($project->technology_tags, 0, 4) as $tag)
                                        <span class="px-2.5 py-1 rounded text-[11px] font-mono bg-slate-100 dark:bg-white/5 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-white/5">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="px-6 sm:px-8 pb-6 sm:pb-8 pt-2 flex items-center justify-between border-t border-slate-100 dark:border-white/5">
                        <span class="text-xs font-mono text-slate-400">Production Deployed</span>
                        <a href="{{ route('project', $project->slug) }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs font-semibold">
                            <span class="btn-wrap">
                                <span class="text-1">{{ $currentLocale === 'id' ? 'Buka Studi Kasus' : 'View Case Study' }}</span>
                                <span class="text-2">{{ $currentLocale === 'id' ? 'Lihat Solusi & Hasil' : 'Explore Impact' }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 p-16 text-center text-slate-400 font-mono">
                    No case studies found for the selected filter.
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
