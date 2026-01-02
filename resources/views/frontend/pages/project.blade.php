@extends('frontend.components.layout')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-background-light dark:bg-background-dark">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent dark:from-primary/10"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl">
            <div class="flex items-center gap-4 mb-6">
                @if($project->industry)
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-teal-100 dark:bg-teal-900/50 text-teal-700 dark:text-teal-400">
                    {{ $project->industry }}
                </span>
                @endif
                @if($project->client)
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    Client: {{ $project->client }}
                </span>
                @endif
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-slate-dark dark:text-white mb-6 leading-tight">
                {{ $project->title }}
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed max-w-2xl">
                {{ $project->description }}
            </p>
        </div>
    </div>
</section>

<!-- Main Image -->
@if($project->image_path)
<section class="relative -mt-12 z-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-800">
            <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-auto object-cover max-h-[600px]">
        </div>
    </div>
</section>
@endif

<!-- Stats Section -->
@if($project->stats && count($project->stats) > 0)
<section class="py-16 md:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($project->stats as $stat)
            <div class="p-8 rounded-2xl bg-white dark:bg-surface-dark border border-gray-100 dark:border-slate-800 shadow-sm text-center">
                <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ $stat['value'] }}</div>
                <div class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Challenge & Solution -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Content -->
            <div class="flex flex-col gap-12">
                @if($project->challenge)
                <div>
                    <h2 class="text-2xl font-bold text-slate-dark dark:text-white mb-4 flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400">
                            <span class="material-symbols-outlined text-lg">crisis_alert</span>
                        </span>
                        The Challenge
                    </h2>
                    <div class="prose prose-lg prose-slate dark:prose-invert text-gray-600 dark:text-gray-300">
                        {!! $project->challenge !!}
                    </div>
                </div>
                @endif

                @if($project->solution)
                <div>
                    <h2 class="text-2xl font-bold text-slate-dark dark:text-white mb-4 flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-teal-100 dark:bg-teal-900/30 text-teal-600 dark:text-teal-400">
                            <span class="material-symbols-outlined text-lg">lightbulb</span>
                        </span>
                        The Solution
                    </h2>
                    <div class="prose prose-lg prose-slate dark:prose-invert text-gray-600 dark:text-gray-300">
                        {!! $project->solution !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:sticky lg:top-32 h-fit flex flex-col gap-8">
                <!-- Technologies -->
                @if($project->technology_tags && count($project->technology_tags) > 0)
                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700">
                    <h3 class="text-lg font-bold text-slate-dark dark:text-white mb-4">Tech Stack</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->technology_tags as $tech)
                        <span class="px-3 py-1 bg-white dark:bg-slate-700 rounded-full text-sm font-medium text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
@if($project->gallery && count($project->gallery) > 0)
<section class="py-16 md:py-24 bg-slate-50 dark:bg-[#0b1615]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-slate-dark dark:text-white mb-12">Project Gallery</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($project->gallery as $image)
            <div class="rounded-xl overflow-hidden shadow-lg border border-gray-100 dark:border-slate-800">
                <img src="{{ Storage::url($image) }}" alt="Project Screenshot" class="w-full h-auto hover:scale-105 transition-transform duration-500">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Footer CTA -->
<section class="py-20 bg-primary text-slate-900">
    <div class="mx-auto max-w-4xl px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-black mb-6">Inspired by this project?</h2>
        <p class="text-xl font-medium opacity-90 mb-10 max-w-2xl mx-auto">
            Let's discuss how we can build something similar for you.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact" class="flex items-center justify-center rounded-lg h-14 px-8 bg-white text-slate-900 text-lg font-bold hover:bg-slate-100 transition-colors shadow-xl">
                Start a Conversation
            </a>
            <a href="{{ route('case-studies') }}" class="flex items-center justify-center rounded-lg h-14 px-8 bg-transparent border-2 border-slate-900 text-slate-900 text-lg font-bold hover:bg-slate-900 hover:text-white transition-colors">
                View More Cases
            </a>
        </div>
    </div>
</section>
@endsection
