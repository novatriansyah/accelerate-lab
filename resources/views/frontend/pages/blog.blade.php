@extends('frontend.components.layout')

@section('content')
    <main class="flex-1 flex flex-col items-center w-full bg-white dark:bg-slate-950 text-slate-900 dark:text-white transition-colors duration-300">
        <section id="blog-hero-section" class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-32 pb-6" aria-labelledby="blog-heading">
            <div class="flex flex-col gap-4 max-w-3xl">
                <h1 id="blog-heading"
                    class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] font-instrumentsans text-slate-900 dark:text-white">
                    {{ __('Articles & Tech Insights') }}
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-400 font-normal leading-relaxed">
                    {{ __('Explore insights, tutorials, and engineering best practices from our team.') }}
                </p>
            </div>
        </section>

        @if ($featured)
            <section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-6" aria-label="Featured article">
                <a href="{{ route('article', $featured) }}"
                    class="group relative block overflow-hidden rounded-2xl bg-white dark:bg-slate-900/90 border border-slate-200/80 dark:border-white/10 shadow-sm transition-all hover:shadow-md">
                    <div class="grid lg:grid-cols-2 gap-0">
                        <div class="relative h-64 lg:h-auto overflow-hidden">
                            @if ($featured->image_path)
                                <img src="{{ Storage::url($featured->image_path) }}"
                                    alt="{{ $featured->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                    loading="eager" width="600" height="400" decoding="async">
                            @else
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-teal-500/20 to-slate-900 transition-transform duration-700 group-hover:scale-105" aria-hidden="true">
                                </div>
                            @endif

                            <div
                                class="absolute top-4 left-4 bg-teal-500 text-slate-950 text-xs font-bold font-mono px-3 py-1 rounded-full">
                                {{ __('Featured') }}
                            </div>
                        </div>
                        <div class="flex flex-col justify-center p-8 lg:p-12 gap-6">
                            <div class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400">
                                <span class="flex items-center gap-1"><x-app-icon name="calendar_today" class="w-4 h-4" />
                                    {{ $featured->published_at->format('M d, Y') }}</span>
                                @if ($featured->category)
                                    <span aria-hidden="true">•</span>
                                    <span class="font-bold text-teal-600 dark:text-teal-400">{{ __($featured->category->name) }}</span>
                                @endif
                            </div>
                            <h2
                                class="text-3xl font-black leading-tight tracking-tight font-instrumentsans text-slate-900 dark:text-white group-hover:text-teal-500 transition-colors">
                                {{ $featured->title }}
                            </h2>
                            <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-3">
                                {!! Str::limit(strip_tags($featured->content), 150) !!}
                            </p>
                            <div class="flex items-center gap-4 pt-2">
                                <div
                                    class="size-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                    <x-app-icon name="person" class="w-5 h-5 text-slate-400" />
                                </div>
                                <div class="text-sm">
                                    <p class="font-bold text-slate-900 dark:text-white">{{ $featured->author?->name ?? 'Accelerate Lab' }}</p>
                                    <p class="text-slate-500 dark:text-slate-400">{{ __('Author') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </section>
        @endif

        <section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            <!-- Optional Category Filter could go here later -->
        </section>

        <section id="articles-grid" class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pb-16" aria-label="Latest articles">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($latest as $article)
                    <article
                        class="group flex flex-col bg-white dark:bg-slate-900/90 rounded-2xl border border-slate-200/80 dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-teal-500/50">
                        <a href="{{ route('article', $article) }}" class="relative h-48 overflow-hidden block">
                            @if ($article->image_path)
                                <img src="{{ Storage::url($article->image_path) }}"
                                    alt="{{ $article->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    loading="lazy" width="400" height="192" decoding="async">
                            @else
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-slate-800 transition-transform duration-500 group-hover:scale-110" aria-hidden="true">
                                </div>
                            @endif

                            @if ($article->category)
                                <div
                                    class="absolute top-3 left-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur text-slate-900 dark:text-white text-xs font-bold px-2 py-1 rounded">
                                    {{ __($article->category->name) }}
                                </div>
                            @endif
                        </a>
                        <div class="flex flex-col flex-1 p-6">
                            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-3">
                                <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('M d, Y') }}</time>
                            </div>
                            <a href="{{ route('article', $article) }}" class="block">
                                <h3
                                    class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-3 group-hover:text-teal-500 transition-colors">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                                {!! Str::limit(strip_tags($article->content), 100) !!}
                            </p>
                            <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-white/10">
                                <div
                                    class="size-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                    <x-app-icon name="person" class="w-4 h-4 text-slate-400" />
                                </div>
                                <span
                                    class="text-xs font-medium text-slate-900 dark:text-white">{{ $article->author?->name ?? 'Accelerate Lab' }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $latest->links() }}
            </div>
        </section>
    </main>
@endsection
