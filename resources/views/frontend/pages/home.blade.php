@extends('frontend.components.layout', ['title' => 'Accelerate Lab - Digital Innovation Agency'])

@push('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Accelerate Lab",
    "url": "{{ url('/') }}",
    "description": "The digital innovation partner for forward-thinking enterprises. We engineer high-performance web applications that drive growth.",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/blog') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush

@section('content')
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden bg-grid-pattern" aria-labelledby="hero-heading">
        <div
            class="absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[60px] lg:blur-[100px] animate-pulse-slow -z-10" aria-hidden="true">
        </div>
        <div
            class="absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[60px] lg:blur-[100px] animate-pulse-slow -z-10" aria-hidden="true">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left animate-fade-in-up">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm mb-8">
                        <span class="relative flex h-2 w-2" aria-hidden="true">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                        </span>
                        <span
                            class="text-xs font-semibold text-slate-600 dark:text-slate-300 tracking-wide uppercase">System
                            Operational</span>
                    </div>
                    <h1 id="hero-heading"
                        class="text-5xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-6 leading-tight">
                        Build Faster. <br />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-500">Scale
                            Smarter.</span>
                    </h1>
                    <p
                        class="mt-4 text-lg lg:text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto lg:mx-0 mb-10 leading-relaxed">
                        The digital innovation partner for forward-thinking enterprises. We engineer high-performance web
                        applications that drive growth and optimize efficiency.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="/contact" id="hero-cta-primary"
                            class="bg-primary hover:bg-primary-dark text-white text-lg font-semibold px-8 py-4 rounded-lg shadow-lg shadow-primary/30 transition-all hover:scale-105 flex items-center justify-center gap-2 group">
                            Start Your Project
                            <span
                                class="material-icons-round group-hover:translate-x-1 transition-transform" aria-hidden="true">arrow_forward</span>
                        </a>
                        <a href="/case-studies" id="hero-cta-secondary"
                            class="bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-700 hover:border-primary text-lg font-semibold px-8 py-4 rounded-lg transition-all hover:shadow-md flex items-center justify-center gap-2">
                            View Case Studies
                        </a>
                    </div>
                    @if (isset($heroStats) && count($heroStats) > 0)
                    <div
                        class="mt-12 flex items-center justify-center lg:justify-start gap-8 border-t border-slate-200 dark:border-slate-800 pt-8 opacity-80">
                            @foreach ($heroStats as $stat)
                                <div>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stat->value }}<span
                                            class="text-primary text-xl">{{ $stat->unit }}</span></p>
                                    <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">
                                        {{ $stat->label }}</p>
                                </div>
                                @if (!$loop->last)
                                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-700" aria-hidden="true"></div>
                                @endif
                            @endforeach
                    </div>
                    @endif
                </div>
                <div class="relative hidden lg:block h-[600px] w-full [perspective:1000px]" aria-hidden="true">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-[500px] h-[500px] border border-slate-200/50 dark:border-slate-700/50 rounded-full animate-spin-slow dashed-border">
                        </div>
                    </div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white dark:bg-slate-900 rounded-xl shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden animate-float z-20">
                        <div class="flex items-center px-4 py-3 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
                            <div class="flex space-x-2 mr-auto">
                                <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                            </div>
                            <span class="text-xs text-slate-500 font-mono">deploy.sh</span>
                        </div>
                        <div class="p-6 font-mono text-sm text-slate-600 dark:text-slate-300">
                            <div class="flex gap-2 mb-2">
                                <span class="text-primary font-bold">➜</span>
                                <span>git push origin production</span>
                            </div>
                            <div class="flex gap-2 mb-2 text-slate-500 dark:text-slate-400">
                                <span class="text-primary font-bold">➜</span>
                                <span>Building optimizations...</span>
                            </div>
                            <div class="space-y-1 pl-5 mb-3 text-slate-500 text-xs border-l border-slate-200 dark:border-slate-700 ml-1">
                                <p>✓ Minifying assets</p>
                                <p>✓ Compressing images</p>
                                <p>✓ Database migrations [OK]</p>
                            </div>
                            <div class="flex gap-2">
                                <span class="text-primary font-bold">➜</span>
                                <span class="text-green-400">Deployed successfully (124ms)</span>
                                <span class="animate-pulse">_</span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute top-1/4 right-0 w-64 bg-surface-light dark:bg-surface-dark rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 p-5 animate-float-delayed z-10 opacity-95 backdrop-blur-md">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <span class="material-icons-round text-primary text-sm">speed</span>
                                <h4 class="text-xs font-bold text-slate-500 uppercase">Velocity</h4>
                            </div>
                            <span class="text-green-500 text-xs font-mono font-bold">98/100</span>
                        </div>
                        <div class="flex items-end gap-2 h-20">
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-sm relative group overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-primary/80 h-[40%] animate-pulse"></div>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-sm relative overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-primary/80 h-[70%] animate-pulse delay-75"></div>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-sm relative overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-primary/80 h-[55%] animate-pulse delay-100"></div>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-sm relative overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-primary/80 h-[85%] animate-pulse delay-150"></div>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-sm relative overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-primary/80 h-[60%] animate-pulse delay-200"></div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute bottom-1/4 left-0 w-auto bg-surface-light dark:bg-surface-dark rounded-full shadow-lg border border-slate-200 dark:border-slate-700 py-2 px-4 flex items-center gap-3 animate-float-delayed z-30">
                        <div class="relative flex items-center justify-center">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </div>
                        <div class="text-xs font-medium text-slate-600 dark:text-slate-300">
                            System Status: <span class="text-slate-900 dark:text-white font-bold">Optimized</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div
        class="w-full bg-white dark:bg-slate-900 border-y border-gray-100 dark:border-gray-800 py-10 overflow-hidden relative" aria-label="Technology partners" role="marquee">
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white dark:from-slate-900 to-transparent z-10" aria-hidden="true">
        </div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white dark:from-slate-900 to-transparent z-10" aria-hidden="true">
        </div>
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-16 mx-8">
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">AWS</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">LARAVEL</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">REACT</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">TAILWIND</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">NEXT.JS</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">NODE</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">DOCKER</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">TYPESCRIPT</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">AWS</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">LARAVEL</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">REACT</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">TAILWIND</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">NEXT.JS</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">NODE</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">DOCKER</span>
                <span class="text-2xl font-bold text-gray-400 dark:text-gray-600 font-mono">TYPESCRIPT</span>
            </div>
        </div>
    </div>
    <section class="py-24 bg-background-light dark:bg-background-dark" aria-labelledby="capabilities-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <h2 id="capabilities-heading" class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Core Capabilities</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg max-w-2xl">We don't just write code; we build
                    resilient digital assets.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[minmax(300px,auto)]">
                <div
                    class="group relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 md:col-span-2">
                    <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity" aria-hidden="true">
                        <span class="material-icons-round text-[150px] text-primary transform rotate-12">radar</span>
                    </div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                                <span class="material-icons-round text-primary text-2xl" aria-hidden="true">explore</span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Product Strategy</h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed max-w-md">
                                From MVP definition to enterprise scaling roadmaps. We validate market assumptions and
                                architect scalable systems before writing a single line of code.
                            </p>
                        </div>
                        <a class="inline-flex items-center text-primary font-semibold mt-8 group-hover:translate-x-2 transition-transform"
                            href="/services">
                            Learn more <span class="material-icons-round ml-1 text-sm" aria-hidden="true">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 flex flex-col justify-between">
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div
                                class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                                <span class="material-icons-round text-primary text-2xl" aria-hidden="true">code</span>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Custom Development</h3>
                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                                We are not limited by a specific tech stack. Our versatile team leverages the best
                                technologies for each project, ensuring capability, performance, and adaptability across any
                                ecosystem.
                            </p>
                        </div>
                        <div class="flex gap-2 mt-8 opacity-50" aria-hidden="true">
                            <div class="h-1.5 w-8 bg-primary rounded-full"></div>
                            <div class="h-1.5 w-4 bg-white rounded-full"></div>
                            <div class="h-1.5 w-12 bg-slate-500 rounded-full"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="group md:col-span-3 relative overflow-hidden rounded-2xl bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all p-8 flex items-center">
                        @if (isset($capabilityStats) && count($capabilityStats) > 0)
                        <div
                            class="grid grid-cols-1 sm:grid-cols-3 w-full gap-8 divide-y sm:divide-y-0 sm:divide-x divide-slate-100 dark:divide-slate-700">
                            @foreach ($capabilityStats as $stat)
                                <div class="text-center pt-4 sm:pt-0">
                                    <p class="text-4xl font-extrabold text-slate-900 dark:text-white mb-1">
                                        {{ $stat->value }}<span
                                            class="text-primary text-2xl ml-1">{{ $stat->unit }}</span></p>
                                    <p
                                        class="text-sm text-slate-500 dark:text-slate-400 font-medium uppercase tracking-wide">
                                        {{ $stat->label }}</p>
                                </div>
                            @endforeach
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </section>

    {{-- How We Work --}}
    <section class="py-16 bg-slate-50 dark:bg-slate-900/50 border-y border-slate-200 dark:border-slate-800" aria-labelledby="how-we-work-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="how-we-work-heading" class="text-2xl font-bold text-slate-900 dark:text-white">How We Work</h2>
                <p class="mt-2 text-slate-500 dark:text-slate-400">A proven process, from concept to deployment.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative flex flex-col items-center text-center p-6">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">search</span>
                    </div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Step 1</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Discover</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We analyze your requirements, audience, and business goals.</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center text-center p-6">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">palette</span>
                    </div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Step 2</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Design</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We craft wireframes, prototypes, and a polished UI/UX system.</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </div>
                </div>
                <div class="relative flex flex-col items-center text-center p-6">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">code</span>
                    </div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Step 3</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Develop</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We build with modern stacks, agile sprints, and CI/CD pipelines.</p>
                    <div class="hidden lg:block absolute top-1/2 -right-3 w-6 text-slate-300 dark:text-slate-600" aria-hidden="true">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center p-6">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl" aria-hidden="true">rocket_launch</span>
                    </div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest mb-2">Step 4</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Deploy</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We launch, monitor, and iterate based on real-world data.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white dark:bg-slate-900 relative overflow-hidden" aria-labelledby="projects-heading">
        <div
            class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-primary/5 rounded-full blur-[80px]" aria-hidden="true">
        </div>
        <div
            class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-64 h-64 bg-blue-600/5 rounded-full blur-[60px]" aria-hidden="true">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="mb-16 text-center max-w-3xl mx-auto">
                <h2 id="projects-heading" class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Our Recent Projects</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">
                    Delivering impact through engineering excellence. Here is a selection of our recent deployments.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($recentProjects as $project)
                    <article
                        class="group bg-surface-light dark:bg-surface-dark border border-slate-200 dark:border-slate-700 rounded-2xl overflow-hidden hover:shadow-2xl hover:border-primary/50 transition-all duration-300 flex flex-col h-full">
                        <div
                            class="h-48 bg-slate-100 dark:bg-slate-800 relative overflow-hidden group-hover:opacity-90 transition-opacity">
                            <div class="absolute inset-0 bg-grid-pattern opacity-20" aria-hidden="true"></div>
                            @if ($project->image_path)
                                <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover" loading="lazy" width="400" height="192" decoding="async">
                            @else
                                <div
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-primary/20 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500" aria-hidden="true">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span
                                        class="material-icons-round text-4xl text-slate-400 dark:text-slate-500 group-hover:text-primary transition-colors" aria-hidden="true">{{ $project->icon ?? 'layers' }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <div class="mb-4 flex flex-wrap gap-2 items-center">
                                @if ($project->industry)
                                    <span
                                        class="text-xs font-mono text-primary bg-primary/10 px-2 py-1 rounded">{{ $project->industry }}</span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">{{ $project->title }}</h3>
                            <div class="space-y-4 mb-8 flex-grow">
                                <div>
                                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Challenge
                                    </p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">
                                        {{ $project->plain_challenge }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Solution
                                    </p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">
                                        {{ $project->plain_solution }}</p>
                                </div>
                            </div>
                            <a href="/case-studies"
                                class="w-full mt-auto py-3 px-4 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-900 dark:text-white text-sm font-semibold rounded-lg border border-slate-200 dark:border-slate-700 transition-colors flex items-center justify-center gap-2 group-hover:border-primary/30">
                                View Case Study
                                <span class="material-icons-round text-sm" aria-hidden="true">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-24 bg-background-light dark:bg-background-dark relative overflow-hidden" aria-labelledby="lab-heading">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[100px]" aria-hidden="true"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px]" aria-hidden="true"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <div
                    class="inline-block px-3 py-1 rounded border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-900 text-xs font-mono text-primary mb-6">
                    ~/source/core-values.js
                </div>
                <h2 id="lab-heading" class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">The Lab</h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg mb-8 leading-relaxed">
                    Innovation isn't accidental. It's engineered. Our "Lab" methodology combines agile sprints with deep
                    technical research to solve problems others can't.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="material-icons-round text-primary mr-3 mt-1" aria-hidden="true">check_circle</span>
                        <span class="text-slate-700 dark:text-slate-300">Clean, maintainable architecture</span>
                    </li>
                    <li class="flex items-start">
                        <span class="material-icons-round text-primary mr-3 mt-1" aria-hidden="true">check_circle</span>
                        <span class="text-slate-700 dark:text-slate-300">Security-first development lifecycle</span>
                    </li>
                    <li class="flex items-start">
                        <span class="material-icons-round text-primary mr-3 mt-1" aria-hidden="true">check_circle</span>
                        <span class="text-slate-700 dark:text-slate-300">Automated CI/CD pipelines</span>
                    </li>
                </ul>
            </div>
            <div class="lg:w-1/2 w-full" aria-hidden="true">
                <div
                    class="rounded-xl overflow-hidden shadow-2xl bg-[#0d1117] border border-slate-800 transform lg:rotate-2 hover:rotate-0 transition-transform duration-500">
                    <div class="flex items-center px-4 py-3 bg-[#161b22] border-b border-slate-800">
                        <div class="flex space-x-2 mr-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="text-xs text-slate-500 font-mono">AccelerateLabController.ts</div>
                    </div>
                    <div class="p-6 overflow-x-auto code-scroll">
                        <pre class="font-mono text-sm leading-relaxed"><span class="text-pink-400">import</span> { <span class="text-yellow-200">Innovation</span>, <span class="text-yellow-200">Scale</span> } <span class="text-pink-400">from</span> <span class="text-green-300">'@accelerate-lab/core'</span>;
<span class="text-pink-400">class</span> <span class="text-blue-300">Project</span> <span class="text-pink-400">implements</span> <span class="text-yellow-200">DigitalTransformation</span> {
  <span class="text-pink-400">private</span> <span class="text-blue-300">client</span>: <span class="text-yellow-200">Partner</span>;
  <span class="text-pink-400">async</span> <span class="text-blue-300">execute</span>(<span class="text-orange-300">goals</span>: <span class="text-yellow-200">Metrics</span>[]): <span class="text-yellow-200">Promise</span>&lt;<span class="text-yellow-200">Growth</span>&gt; {
    <span class="text-slate-500">// Optimize performance bottlenecks</span>
    <span class="text-pink-400">const</span> <span class="text-white">strategy</span> = <span class="text-pink-400">await</span> <span class="text-blue-300">analyze</span>(<span class="text-orange-300">this</span>.client);
    <span class="text-pink-400">return</span> <span class="text-blue-300">deploy</span>({
      <span class="text-white">techStack:</span> [<span class="text-green-300">'React'</span>, <span class="text-green-300">'Laravel'</span>, <span class="text-green-300">'AWS'</span>],
      <span class="text-white">velocity:</span> <span class="text-purple-400">100</span>,
      <span class="text-white">quality:</span> <span class="text-yellow-200">Standards</span>.<span class="text-purple-400">ENTERPRISE</span>
    });
  }
}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    @if (isset($testimonials) && count($testimonials) > 0)
    <section class="py-20 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800" aria-labelledby="testimonials-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="testimonials-heading" class="text-3xl font-bold text-slate-900 dark:text-white">What Our Clients Say</h2>
                <p class="mt-3 text-slate-500 dark:text-slate-400 max-w-xl mx-auto">Real feedback from teams we've partnered with.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                <article class="bg-white dark:bg-surface-dark rounded-2xl p-8 shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4" aria-label="5 out of 5 stars">
                        @for ($i = 0; $i < 5; $i++)
                        <span class="material-symbols-outlined text-amber-400 text-lg" aria-hidden="true">star</span>
                        @endfor
                    </div>
                    <blockquote class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                        "{{ $testimonial->quote }}"
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4 border-t border-slate-100 dark:border-slate-700">
                        @if ($testimonial->avatar_path)
                        <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->client_name }}"
                            class="w-10 h-10 rounded-full object-cover" loading="lazy" width="40" height="40" decoding="async">
                        @else
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-lg" aria-hidden="true">person</span>
                        </div>
                        @endif
                        <div>
                            <p class="text-sm font-bold text-slate-900 dark:text-white">{{ $testimonial->client_name }}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $testimonial->client_role }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}
                            </p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Closing CTA --}}
    <section class="relative isolate overflow-hidden bg-slate-900 py-16 sm:py-24" aria-labelledby="cta-heading">
        <div class="absolute inset-0 -z-10 h-full w-full" style="background-image: radial-gradient(#14b8a7 1px, transparent 1px); background-size: 32px 32px; opacity: 0.08;" aria-hidden="true"></div>
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/15 to-transparent skew-x-12 pointer-events-none" aria-hidden="true"></div>
        <div class="mx-auto max-w-4xl px-6 lg:px-8 text-center relative z-10">
            <h2 id="cta-heading" class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to Accelerate?</h2>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-slate-300">
                Let's turn your vision into a high-performance digital product. Start a conversation today.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a class="rounded-lg bg-primary px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-primary/25 hover:bg-teal-500 transition-all"
                    href="/contact" id="cta-start-project">
                    Start a Project
                </a>
                <a class="text-sm font-semibold leading-6 text-white hover:text-primary transition-colors"
                    href="/case-studies">
                    View Our Work <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>
@endsection
