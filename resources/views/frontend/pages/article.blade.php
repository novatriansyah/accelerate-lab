@extends('frontend.components.layout')

@section('content')
<main class="flex-1 flex flex-col items-center w-full">
    <!-- Hero / Header -->
    <section class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 pt-32 pb-6">
        <div class="flex flex-col gap-6">
            <div class="flex items-center gap-3 text-sm text-slate-medium dark:text-slate-400">
                <span class="px-2 py-1 bg-[#e7f3f2] dark:bg-white/10 text-primary dark:text-primary-light rounded font-bold">
                    {{ $article->category->name ?? 'Uncategorized' }}
                </span>
                <span>•</span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">calendar_today</span> 
                    {{ $article->published_at->format('M d, Y') }}
                </span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] text-slate-dark dark:text-white">
                {{ $article->title }}
            </h1>

            <div class="flex items-center gap-4 pt-2">
                <div class="size-12 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden">
                     <!-- Placeholder or User Avatar if we had one -->
                     <span class="material-symbols-outlined text-4xl text-slate-400">person</span>
                </div>
                <div class="text-sm">
                    <p class="font-bold text-slate-dark dark:text-white">{{ $article->author->name }}</p>
                    <p class="text-slate-medium dark:text-slate-500">Author</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($article->image_path)
    <section class="w-full max-w-5xl px-4 sm:px-6 lg:px-8 py-6">
        <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-xl">
            <img src="{{ Storage::url($article->image_path) }}" 
                 alt="{{ $article->title }}" 
                 class="w-full h-full object-cover">
        </div>
    </section>
    @endif

    <!-- Content -->
    <section class="w-full max-w-3xl px-4 sm:px-6 lg:px-8 py-8">
        <div class="prose prose-lg prose-slate dark:prose-invert max-w-none">
            {!! $article->content !!}
        </div>
    </section>

    <!-- Back to Blog -->
    <section class="w-full max-w-3xl px-4 sm:px-6 lg:px-8 pb-16 pt-8 border-t border-gray-100 dark:border-white/10">
        <a href="{{ route('blog') }}" class="flex items-center gap-2 text-primary font-bold hover:underline">
            <span class="material-symbols-outlined">arrow_back</span>
            Back to Insights
        </a>
    </section>
</main>
@endsection

