@extends('frontend.components.layout', [
    'title' => $title ?? 'About Accelerate Lab - Our Story, Mission & Team',
    'description' => $description ?? 'Learn about Accelerate Lab, a digital innovation agency founded by Nova Triansyah Azis. Discover our mission, core values, and engineering philosophy.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting Orbs --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-24 lg:mb-32">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>Who We Are & Why We Build</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Engineering Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Compromise</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed mb-12">
            Accelerate Lab is a modern high-performance engineering studio. We architect high-throughput monolithic systems, resilient cloud infrastructures, and digital products for industry leaders who cannot afford second best.
        </p>

        {{-- Dynamic Stats Grid --}}
        @if(isset($stats) && $stats->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12 p-4 rounded-3xl bg-slate-900/5 dark:bg-white/5 border border-slate-200 dark:border-white/10 backdrop-blur-xl">
                @foreach($stats as $stat)
                    <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                        <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight flex items-baseline justify-center gap-1">
                            <span>{{ $stat->value }}</span>
                            @if($stat->unit)
                                <span class="text-sm font-mono text-[#00BFA5]">{{ $stat->unit }}</span>
                            @endif
                        </div>
                        <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">{{ $stat->label }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- The Manifesto Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
        <div class="rounded-3xl p-8 sm:p-12 lg:p-16 bg-gradient-to-br from-slate-900 via-[#0B132B] to-[#0A1020] text-white border border-white/10 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-80 h-80 rounded-full bg-[#00BFA5]/15 blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <span class="text-[#00BFA5] font-mono text-sm font-bold tracking-wider uppercase block mb-3">Our Core Manifesto</span>
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white mb-6">
                        We Reject Sloppy Code and Disposable Prototypes.
                    </h2>
                    <p class="text-slate-300 leading-relaxed text-base mb-6">
                        Most digital agencies rush MVP releases with fragile duct-tape code that falls apart under enterprise load. We take the opposite stance: mathematically sound architecture, strict test coverage, and clean craftsmanship from day one.
                    </p>
                    <div class="flex items-center gap-4 text-xs font-mono text-[#00BFA5]">
                        <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 border border-[#00BFA5]/20">Zero Tech Debt Policy</span>
                        <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 border border-[#00BFA5]/20">Strict TDD Enforced</span>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">01</div>
                        <h3 class="text-lg font-bold text-white mb-2">Monolithic Speed</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Single unified domain models that eliminate distributed latency and serialization overhead while keeping development velocity ultra-fast.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">02</div>
                        <h3 class="text-lg font-bold text-white mb-2">Architectural Observability</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Telemetry, APM instrumentation, and actionable error tracking baked right into every system endpoint.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">03</div>
                        <h3 class="text-lg font-bold text-white mb-2">Bespoke Design Systems</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">We design custom typography, fluid tokens, and micro-animations tailored uniquely to your brand identity, never cookie-cutter templates.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">04</div>
                        <h3 class="text-lg font-bold text-white mb-2">Radical Transparency</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Weekly demos, direct access to the engineers building your software, and clear measurable ROI on every sprint.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Dynamic Core Values Section --}}
    @if(isset($coreValues) && $coreValues->isNotEmpty())
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Pillars</span>
                <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Core Values</h2>
                <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">The guiding principles that dictate how we architect systems and treat client partnerships.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($coreValues as $value)
                    <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                        <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                            @if(!empty($value->icon))
                                <span class="font-mono text-sm">{{ substr($value->icon, 0, 3) }}</span>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                            {{ $value->title }}
                        </h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ $value->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Company Milestones Timeline --}}
    @if(isset($milestones) && $milestones->isNotEmpty())
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Journey</span>
                <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Milestones</h2>
                <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">Key achievements on our path to redefining digital engineering standards.</p>
            </div>

            <div class="relative border-l-2 border-slate-200 dark:border-white/10 ml-4 sm:ml-32 space-y-12">
                @foreach($milestones as $milestone)
                    <div class="relative pl-8 sm:pl-12 group">
                        {{-- Node Dot --}}
                        <div class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-[#00BFA5] border-4 border-white dark:border-[#090D16] group-hover:scale-125 transition-transform shadow-[0_0_12px_rgba(0,191,165,0.6)]"></div>
                        
                        {{-- Year Label --}}
                        <div class="sm:absolute sm:-left-32 sm:top-1 font-mono text-sm font-bold text-[#00BFA5] mb-2 sm:mb-0">
                            {{ $milestone->year }}
                        </div>

                        <div class="p-6 rounded-2xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-md group-hover:border-[#00BFA5]/30 transition-colors">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $milestone->title }}</h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ $milestone->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Team / Leadership Section --}}
    @if(isset($teamMembers) && $teamMembers->isNotEmpty())
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Minds Behind Accelerate Lab</span>
                <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Leadership & Engineering</h2>
                <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">Architects, engineers, and product specialists dedicated to technological excellence.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($teamMembers as $member)
                    <div class="group relative rounded-3xl overflow-hidden bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                        {{-- Avatar / Header --}}
                        <div class="h-64 relative bg-gradient-to-br from-slate-100 to-slate-200 dark:from-[#090D16] dark:to-[#111A30] overflow-hidden flex items-center justify-center">
                            @if(!empty($member->image_path))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($member->image_path) }}" alt="{{ $member->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-24 h-24 rounded-2xl bg-[#00BFA5]/15 border border-[#00BFA5]/30 flex items-center justify-center text-3xl font-mono font-bold text-[#00BFA5]">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-4 left-6 right-6 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-white tracking-tight">{{ $member->name }}</h3>
                                    <div class="text-xs font-mono text-[#00BFA5]">{{ $member->role }}</div>
                                </div>
                                @if(!empty($member->linkedin_url))
                                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#00BFA5] text-white flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Bio Body --}}
                        <div class="p-6">
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ $member->bio }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- 70% Redox Full-Width CTA Banner --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl p-8 sm:p-16 bg-gradient-to-r from-slate-900 via-[#0A1A2F] to-[#090D16] text-white border border-white/10 shadow-2xl relative overflow-hidden text-center">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#00BFA5]/20 via-transparent to-transparent pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase mb-4 block">Take the Next Step</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-6">
                    Ready to Partner with Accelerate Lab?
                </h2>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-8">
                    Whether you require a complete monolithic rewrite, cloud infrastructure hardening, or a custom digital product, our architects are ready to evaluate your requirements.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ url('/contact') }}" class="rr-btn rr-btn-primary">
                        <span class="btn-wrap">
                            <span class="text-1">Schedule Technical Consultation</span>
                            <span class="text-2">Schedule Technical Consultation</span>
                        </span>
                    </a>
                    <a href="{{ url('/case-studies') }}" class="rr-btn rr-btn-outline">
                        <span class="btn-wrap">
                            <span class="text-1">Explore Case Studies</span>
                            <span class="text-2">Explore Case Studies</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
