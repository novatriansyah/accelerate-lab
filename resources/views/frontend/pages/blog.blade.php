@extends('frontend.components.layout', [
    'title' => $title ?? 'Insights & Engineering Blog - Accelerate Lab',
    'description' => $description ?? 'Explore articles on web technology, software engineering, cloud architecture, and digital product design from Accelerate Lab.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-16 lg:mb-20">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>Engineering Dispatches & Field Notes</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Insights & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Architectural Notes</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
            Practical knowledge, benchmarks, and engineering retrospectives from our active production engagements.
        </p>
    </section>

    {{-- Featured Article Showcase --}}
    @if(isset($featured) && $featured)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20 lg:mb-24">
            <div class="rounded-3xl p-6 sm:p-10 lg:p-12 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl hover:border-[#00BFA5]/40 transition-all duration-300 relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    {{-- Cover Media --}}
                    <div class="lg:col-span-6 h-64 sm:h-80 rounded-2xl overflow-hidden bg-slate-900 relative">
                        @if(!empty($featured->image_path))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($featured->image_path) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#090D16] via-[#0E1B2E] to-slate-900 flex items-center justify-center p-8 text-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#00BFA5]/20 to-transparent"></div>
                                <div class="relative z-10 font-mono text-[#00BFA5] text-xs font-bold tracking-widest uppercase border border-[#00BFA5]/30 px-4 py-2 rounded-full">
                                    Featured Deep Dive
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Metadata & Content --}}
                    <div class="lg:col-span-6 flex flex-col justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                @if($featured->category)
                                    <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] text-xs font-mono font-semibold">
                                        {{ $featured->category->name }}
                                    </span>
                                @endif
                                <span class="text-xs font-mono text-slate-500 dark:text-slate-400">
                                    {{ $featured->published_at ? $featured->published_at->format('M d, Y') : now()->format('M d, Y') }}
                                </span>
                                @if($featured->author)
                                    <span class="text-xs font-mono text-slate-500 dark:text-slate-400">
                                        by {{ $featured->author->name }}
                                    </span>
                                @endif
                            </div>

                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">
                                <a href="{{ route('article', $featured->slug) }}" class="hover:text-[#00BFA5] transition-colors">
                                    {{ $featured->title }}
                                </a>
                            </h2>

                            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-8">
                                {{ \Illuminate\Support\Str::limit(strip_tags($featured->content), 180) }}
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('article', $featured->slug) }}" class="rr-btn rr-btn-primary">
                                <span class="btn-wrap">
                                    <span class="text-1">Read Complete Article</span>
                                    <span class="text-2">Read Complete Article</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- Latest Articles Grid --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
        <div class="flex items-center justify-between mb-12">
            <div>
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">Archive</span>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-slate-900 dark:text-white mt-1">Latest Publications</h2>
            </div>
        </div>

        @if(isset($latest) && $latest->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latest as $article)
                    <article class="group rounded-3xl overflow-hidden bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300 flex flex-col justify-between">
                        <div>
                            {{-- Cover / Fallback --}}
                            <div class="h-48 bg-slate-900 relative overflow-hidden">
                                @if(!empty($article->image_path))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#090D16] to-[#121B30] flex items-center justify-center p-6 text-center">
                                        <span class="font-mono text-xs text-[#00BFA5]/60 uppercase tracking-widest">Accelerate Lab Technical Paper</span>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                @if($article->category)
                                    <span class="absolute top-4 left-4 px-3 py-1 rounded-md bg-[#00BFA5] text-slate-950 text-xs font-mono font-bold shadow-md">
                                        {{ $article->category->name }}
                                    </span>
                                @endif
                            </div>

                            {{-- Details --}}
                            <div class="p-6">
                                <div class="text-xs font-mono text-slate-500 dark:text-slate-400 mb-2">
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : now()->format('M d, Y') }}
                                </div>
                                <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white group-hover:text-[#00BFA5] transition-colors leading-snug mb-3">
                                    <a href="{{ route('article', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                </p>
                            </div>
                        </div>

                        <div class="p-6 pt-0">
                            <a href="{{ route('article', $article->slug) }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold text-[#00BFA5] group-hover:gap-3 transition-all">
                                <span>Read Insight</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $latest->links() }}
            </div>
        @elseif(!isset($featured) || !$featured)
            <div class="text-center p-12 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg">
                <p class="text-slate-600 dark:text-slate-400 text-base">New engineering articles are currently being written. Check back soon.</p>
            </div>
        @endif
    </section>
</main>
@endsection
