@extends('frontend.components.layout')

@section('content')
<main class="flex-1 flex flex-col items-center w-full">
    <section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-32 pb-6">
        <div class="flex flex-col gap-4 max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] text-slate-dark dark:text-white">
                Insights &amp; Innovation
            </h1>
            <p class="text-lg text-slate-medium dark:text-slate-400 font-normal leading-relaxed">
                Exploring the future of web technology, engineering patterns, and digital product design.
            </p>
        </div>
    </section>

    @if($featured)
    <section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
        <a href="{{ route('article', $featured) }}" class="group relative block overflow-hidden rounded-2xl bg-white dark:bg-white/5 border border-[#e7f3f2] dark:border-white/10 shadow-sm transition-all hover:shadow-md">
            <div class="grid lg:grid-cols-2 gap-0">
                <div class="relative h-64 lg:h-auto overflow-hidden">
                    @if($featured->image_path)
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                         style='background-image: url("{{ Storage::url($featured->image_path) }}");'>
                    </div>
                    @else
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-slate-900 transition-transform duration-700 group-hover:scale-105"></div>
                    @endif
                    
                    <div class="absolute top-4 left-4 bg-primary text-slate-dark text-xs font-bold px-3 py-1 rounded-full">
                        Featured
                    </div>
                </div>
                <div class="flex flex-col justify-center p-8 lg:p-12 gap-6">
                    <div class="flex items-center gap-3 text-sm text-slate-medium dark:text-slate-400">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">calendar_today</span> {{ $featured->published_at->format('M d, Y') }}</span>
                        @if($featured->category)
                        <span>•</span>
                        <span class="font-bold text-primary">{{ $featured->category->name }}</span>
                        @endif
                    </div>
                    <h2 class="text-3xl font-black leading-tight tracking-tight text-slate-dark dark:text-white group-hover:text-primary transition-colors">
                        {{ $featured->title }}
                    </h2>
                    <p class="text-base text-slate-600 dark:text-slate-300 line-clamp-3">
                        {!! Str::limit(strip_tags($featured->content), 150) !!}
                    </p>
                    <div class="flex items-center gap-4 pt-2">
                         <div class="size-10 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-400">person</span>
                         </div>
                        <div class="text-sm">
                            <p class="font-bold text-slate-dark dark:text-white">{{ $featured->author->name }}</p>
                            <p class="text-slate-medium dark:text-slate-500">Author</p>
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

    <section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latest as $article)
            <article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
                <a href="{{ route('article', $article) }}" class="relative h-48 overflow-hidden block">
                    @if($article->image_path)
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" 
                         style='background-image: url("{{ Storage::url($article->image_path) }}");'>
                    </div>
                    @else
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-slate-800 transition-transform duration-500 group-hover:scale-110"></div>
                    @endif
                    
                    @if($article->category)
                    <div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                        {{ $article->category->name }}
                    </div>
                    @endif
                </a>
                <div class="flex flex-col flex-1 p-6">
                    <div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
                        <span>{{ $article->published_at->format('M d, Y') }}</span>
                    </div>
                    <a href="{{ route('article', $article) }}" class="block">
                        <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            {{ $article->title }}
                        </h3>
                    </a>
                    <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                        {!! Str::limit(strip_tags($article->content), 100) !!}
                    </p>
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
                         <div class="size-8 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-xs text-slate-400">person</span>
                         </div>
                        <span class="text-xs font-medium text-slate-dark dark:text-white">{{ $article->author->name }}</span>
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

