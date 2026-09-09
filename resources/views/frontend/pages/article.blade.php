@extends('frontend.components.layout', [
    'title' => ($article->title ?? 'Article') . ' - Accelerate Lab',
    'description' => \Illuminate\Support\Str::limit(strip_tags($article->content ?? ''), 160)
])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "BlogPosting",
    "headline": {!! json_encode($article->title) !!},
    "description": {!! json_encode(\Illuminate\Support\Str::limit(strip_tags($article->content ?? ''), 160)) !!},
    "image": {!! json_encode($article->image_path ? url(\Illuminate\Support\Facades\Storage::url($article->image_path)) : asset('images/logo.webp')) !!},
    "datePublished": "{{ $article->published_at?->toIso8601String() }}",
    "dateModified": "{{ $article->updated_at?->toIso8601String() }}",
    "author": {
        "{{ '@' }}type": "Person",
        "name": {!! json_encode($article->author?->name ?? 'Nova Triansyah Azis') !!}
    },
    "publisher": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
        "logo": {
            "{{ '@' }}type": "ImageObject",
            "url": "{{ asset('images/logo.webp') }}"
        }
    },
    "mainEntityOfPage": {
        "{{ '@' }}type": "WebPage",
        "{{ '@' }}id": "{{ url('/blog/' . $article->slug) }}"
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
            "name": "Blog",
            "item": "{{ url('/blog') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 3,
            "name": {!! json_encode($article->title) !!},
            "item": "{{ url('/blog/' . $article->slug) }}"
        }
    ]
}
</script>
@endpush

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb & Category --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('blog') }}" class="text-xs font-mono text-slate-500 dark:text-slate-400 hover:text-[#00BFA5] transition-colors flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <span>Back to All Articles</span>
            </a>
            <span class="text-slate-400 dark:text-slate-600">/</span>
            <span class="px-2.5 py-0.5 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] text-xs font-mono font-semibold">
                {{ $article->category->name ?? 'Uncategorized' }}
            </span>
        </div>

        {{-- Article Header --}}
        <header class="fade-anim" data-direction="bottom">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.15] mb-8">
                {{ $article->title }}
            </h1>

            {{-- Metadata Row --}}
            <div class="flex flex-wrap items-center justify-between gap-4 pb-8 mb-10 border-b border-slate-200 dark:border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#00BFA5]/15 border border-[#00BFA5]/30 flex items-center justify-center font-mono font-bold text-[#00BFA5]">
                        {{ substr($article->author?->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <div class="text-sm font-bold text-slate-900 dark:text-white">
                            {{ $article->author?->name ?? 'Accelerate Lab Engineering' }}
                        </div>
                        <div class="text-xs font-mono text-slate-500 dark:text-slate-400">
                            {{ $article->published_at ? $article->published_at->format('F d, Y') : now()->format('F d, Y') }}
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-xs font-mono text-slate-500 dark:text-slate-400">
                    <svg class="w-4 h-4 text-[#00BFA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ max(1, round(str_word_count(strip_tags($article->content ?? '')) / 200)) }} min read</span>
                </div>
            </div>
        </header>

        {{-- Featured Image if present --}}
        @if(!empty($article->image_path))
            <div class="rounded-3xl overflow-hidden mb-12 shadow-xl border border-slate-200 dark:border-white/10 fade-anim" data-direction="bottom">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-auto max-h-[500px] object-cover">
            </div>
        @endif

        {{-- Article Content --}}
        <div class="prose prose-lg dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed font-sans space-y-6 fade-anim" data-direction="bottom">
            {!! $article->content !!}
        </div>

        {{-- Post Article Footnote & Navigation --}}
        <div class="mt-16 pt-8 border-t border-slate-200 dark:border-white/10 flex flex-wrap items-center justify-between gap-6 fade-anim" data-direction="bottom">
            <a href="{{ route('blog') }}" class="rr-btn rr-btn-outline">
                <span class="btn-wrap">
                    <span class="text-1">&larr; Return to Blog</span>
                    <span class="text-2">&larr; Return to Blog</span>
                </span>
            </a>

            <a href="{{ url('/contact') }}" class="rr-btn rr-btn-primary">
                <span class="btn-wrap">
                    <span class="text-1">Discuss Project Architecture</span>
                    <span class="text-2">Discuss Project Architecture</span>
                </span>
            </a>
        </div>
    </article>
</main>
@endsection
