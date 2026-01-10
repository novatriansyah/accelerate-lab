@extends('frontend.components.layout')

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <!-- Hero / Header -->
        <section class="relative px-4 py-12 md:py-20 lg:py-28 max-w-7xl mx-auto w-full">
            <div
                class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 dark:bg-primary/10 rounded-full blur-3xl opacity-50">
            </div>
            <div class="flex flex-col gap-10 md:flex-row md:items-center">
                <div class="flex flex-col gap-6 md:w-1/2 lg:pr-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 w-fit">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span
                            class="text-xs font-semibold uppercase tracking-wider text-text-secondary dark:text-gray-400">Service</span>
                    </div>
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] tracking-tight text-text-main dark:text-white">
                        {{ $service->title }}
                    </h1>
                    <p class="text-lg text-text-secondary dark:text-gray-300 max-w-lg leading-relaxed">
                        {{ $service->short_description }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <a href="/contact"
                            class="flex items-center justify-center h-12 px-6 rounded-lg bg-primary hover:bg-primary-dark text-white text-base font-bold transition-all shadow-lg shadow-primary/20 group">
                            {{ $service->cta_text ?? 'Start Your Project' }}
                            <span
                                class="material-symbols-outlined ml-2 text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                        <a href="/case-studies"
                            class="flex items-center justify-center h-12 px-6 rounded-lg border border-border-medium dark:border-slate-700 bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800 text-text-main dark:text-white text-base font-semibold transition-colors">
                            View Case Studies
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative mt-8 md:mt-0">
                    <div
                        class="relative w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white dark:bg-slate-800 border border-border-light dark:border-slate-700 shadow-2xl flex items-center justify-center">
                        @if ($service->hero_image)
                            <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-900 flex items-center justify-center text-border-medium dark:text-slate-700">
                                <span
                                    class="material-symbols-outlined text-[15rem] text-primary/10">{{ $service->icon ?? 'layers' }}</span>
                            </div>
                            @if (isset($service->features) && count($service->features) > 0)
                                <div
                                    class="absolute bottom-6 left-6 right-12 p-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-xl border border-border-light dark:border-slate-700 shadow-lg">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                            <span
                                                class="material-symbols-outlined text-sm">{{ $service->features[0]['icon'] ?? 'check_circle' }}</span>
                                        </div>
                                        <span
                                            class="font-bold text-text-main dark:text-white text-sm">{{ $service->features[0]['title'] ?? 'Top Feature' }}</span>
                                    </div>
                                    <div class="h-1 w-full bg-slate-100 dark:bg-slate-700 rounded overflow-hidden">
                                        <div class="h-full bg-primary w-3/4"></div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Technologies -->
        @if (isset($service->technologies) && count($service->technologies) > 0)
            <section class="border-y border-border-light dark:border-slate-800 bg-white dark:bg-surface-dark py-10 w-full">
                <div class="max-w-7xl mx-auto px-4 md:px-10">
                    <p
                        class="text-center text-sm font-semibold text-text-secondary dark:text-gray-400 uppercase tracking-widest mb-8">
                        Powered by Modern Technologies</p>
                    <div
                        class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale transition-all duration-500 hover:grayscale-0">
                        @foreach ($service->technologies as $tech)
                            <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                                <span class="material-symbols-outlined text-3xl">{{ $tech['icon'] }}</span>
                                {{ $tech['name'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Content / Features -->
        <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 md:px-10 w-full">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-4 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black leading-tight text-text-main dark:text-white">
                        Why Choose Accelerate Lab?
                    </h2>
                    <div
                        class="prose prose-lg prose-slate dark:prose-invert max-w-none text-text-secondary dark:text-gray-300">
                        {!! $service->content !!}
                    </div>
                </div>

                @if (isset($service->features) && count($service->features) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        @foreach ($service->features as $feature)
                            <div
                                class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-2xl">{{ $feature['icon'] }}</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">
                                        {{ $feature['title'] }}</h3>
                                    <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                        {{ $feature['description'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- Process -->
        @if (isset($service->process) && count($service->process) > 0)
            <section
                class="bg-white dark:bg-surface-dark py-16 md:py-24 border-y border-border-light dark:border-slate-800 w-full">
                <div class="max-w-7xl mx-auto px-4 md:px-10">
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold text-text-main dark:text-white mb-4">How We Build</h2>
                            <p class="text-text-secondary dark:text-gray-300">A transparent, agile process from concept to
                                deployment.</p>
                        </div>
                        <div class="relative pl-4 border-l border-border-medium dark:border-slate-700 space-y-8">
                            @foreach ($service->process as $step)
                                <div class="relative pl-8">
                                    <span
                                        class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-primary ring-4 ring-white dark:ring-slate-900"></span>
                                    <h3 class="text-lg font-bold text-text-main dark:text-white">{{ $step['title'] }}</h3>
                                    <p class="mt-1 text-sm text-text-secondary dark:text-gray-400">
                                        {{ $step['description'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- CTA -->
        <section class="px-4 pb-12 md:pb-24 max-w-7xl mx-auto w-full pt-16">
            <div class="bg-primary rounded-2xl p-10 md:p-20 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                    <div class="absolute right-[-100px] top-[-100px] w-[300px] h-[300px] rounded-full bg-white blur-3xl">
                    </div>
                    <div class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] rounded-full bg-black blur-3xl">
                    </div>
                </div>
                <div class="relative z-10 flex flex-col items-center gap-6 max-w-2xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-black text-white leading-tight">Ready to Accelerate Your Digital
                        Growth?</h2>
                    <p class="text-white/90 text-lg">Let's build something extraordinary together. Schedule a free
                        consultation with our engineering team.</p>
                    <a href="/contact"
                        class="mt-4 bg-white text-primary hover:bg-slate-50 font-bold py-4 px-8 rounded-lg shadow-xl shadow-black/10 transition-transform active:scale-95 text-lg">
                        Book a Consultation
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
