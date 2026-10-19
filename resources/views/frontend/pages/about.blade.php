@extends('frontend.components.layout', [
    'title' => $title ?? 'About Accelerate Lab - Our Story, Mission & Team',
    'description' => $description ?? 'Learn about Accelerate Lab, a digital engineering studio. Discover our mission, core values, and engineering philosophy.'
])

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting Orbs --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-24 lg:mb-32 fade-anim" data-direction="bottom">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>Who We Are &amp; Why We Build</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Engineering Without <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Compromise</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed mb-12">
            Accelerate Lab is a boutique digital engineering studio. We build dependable software, high-performance web systems, and custom business platforms for ambitious teams.
        </p>

        {{-- Dynamic Stats Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12 p-4 rounded-3xl bg-slate-900/5 dark:bg-white/5 border border-slate-200 dark:border-white/10 backdrop-blur-xl fade-anim" data-direction="bottom">
            @if(isset($stats) && $stats->isNotEmpty())
                @foreach($stats as $stat)
                    <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                        <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight flex items-baseline justify-center gap-1">
                            <span class="t-counter">{{ $stat->value }}</span>
                            @if($stat->unit)
                                <span class="text-sm font-mono text-[#00BFA5]">{{ $stat->unit }}</span>
                            @endif
                        </div>
                        <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">{{ $stat->label }}</div>
                    </div>
                @endforeach
            @else
                {{-- Honest methodology pillars -- no fabricated delivery/uptime numbers --}}
                <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                    <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                        TDD
                    </div>
                    <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">Test-First Engineering</div>
                </div>
                <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                    <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight flex items-baseline justify-center gap-1">
                        <span class="t-counter">100</span>
                        <span class="text-sm font-mono text-[#00BFA5]">%</span>
                    </div>
                    <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">Client Code Ownership</div>
                </div>
                <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                    <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                        NDA
                    </div>
                    <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">Available for All Projects</div>
                </div>
                <div class="p-6 text-center rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/50 dark:border-white/5">
                    <div class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight">
                        Zero
                    </div>
                    <div class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400 mt-2">Zero Tech Debt Policy</div>
                </div>
            @endif
        </div>
    </section>

    {{-- Trust & Compliance Signals Strip --}}
    <div class="mb-24 lg:mb-32">
        @include('frontend.components.trust-signals')
    </div>

    {{-- The Manifesto Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32 fade-anim" data-direction="bottom">
        <div class="rounded-3xl p-8 sm:p-12 lg:p-16 bg-gradient-to-br from-slate-900 via-[#0B132B] to-[#0A1020] text-white border border-white/10 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-80 h-80 rounded-full bg-[#00BFA5]/15 blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <span class="text-[#00BFA5] font-mono text-sm font-bold tracking-wider uppercase block mb-3">Our Core Manifesto</span>
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white mb-6">
                        Practical Engineering for Real Business Results.
                    </h2>
                    <p class="text-slate-300 leading-relaxed text-base mb-6">
                        Many digital initiatives fail because of fragile, hasty solutions that break under load. At Accelerate Lab, we practice disciplined engineering, proven architecture patterns, and rigorous quality standards from day one so your software investment yields lasting returns.
                    </p>
                    <div class="flex flex-wrap items-center gap-3 text-xs font-mono text-[#00BFA5]">
                        <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 border border-[#00BFA5]/20">Zero Tech Debt Policy</span>
                        <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 border border-[#00BFA5]/20">Strict TDD Enforced</span>
                        <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 border border-[#00BFA5]/20" data-entity="Entitas Hukum Resmi">Official Legal Entity: {{ \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri') }}</span>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">01</div>
                        <h3 class="text-lg font-bold text-white mb-2">Speed &amp; Efficiency</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Integrated architectures that eliminate sluggish workflows and keep transactions fast.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">02</div>
                        <h3 class="text-lg font-bold text-white mb-2">Resilience &amp; Security</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Proactive automated testing and secure data practices to maintain 24/7 reliability.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">03</div>
                        <h3 class="text-lg font-bold text-white mb-2">High-Conversion Design</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Intuitive interfaces and frictionless interactions that improve customer retention.</p>
                    </div>

                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                        <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/20 flex items-center justify-center text-[#00BFA5] mb-4 font-mono font-bold">04</div>
                        <h3 class="text-lg font-bold text-white mb-2">Clarity &amp; Real ROI</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">Regular communication, clear accountability, and honest focus on metrics that grow your business.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision, Mission & Culture Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32 fade-anim" data-direction="bottom">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">Purpose &amp; Direction</span>
            <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Vision, Mission &amp; Culture</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">Grounded goals and working principles that guide everything we engineer.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Vision Card --}}
            <div class="relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <span class="text-xs font-mono font-bold text-[#00BFA5] uppercase tracking-wider block mb-2">Our Vision</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Where We Are Headed</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    To be the most dependable digital engineering partner for growing businesses. We build software that works smoothly, looks great, and creates real value.
                </p>
            </div>

            {{-- Mission Card --}}
            <div class="relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="text-xs font-mono font-bold text-[#00BFA5] uppercase tracking-wider block mb-2">Our Mission</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">What We Deliver Every Day</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    To deliver clean, fast, and secure digital products with honest timelines, clear communication, and complete ownership for our clients.
                </p>
            </div>

            {{-- Culture Card --}}
            <div class="relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300 md:col-span-2 lg:col-span-1">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <span class="text-xs font-mono font-bold text-[#00BFA5] uppercase tracking-wider block mb-2">Studio Culture</span>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">How We Work Together</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    Build it right the first time, be helpful rather than intimidating, and always keep commitments.
                </p>
            </div>
        </div>
    </section>

    {{-- Company Profile Download Section (Gracefully renders if PDF configured) --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
        @include('frontend.components.company-profile-download')
    </section>

    {{-- Core Values Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32 fade-anim" data-direction="bottom">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Pillars</span>
            <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Core Values</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">The guiding principles that dictate how we architect systems and treat client partnerships.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(isset($coreValues) && $coreValues->isNotEmpty())
                @foreach($coreValues as $value)
                    <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                        <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                            {{ $value->title }}
                        </h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ $value->description }}
                        </p>
                    </div>
                @endforeach
            @else
                {{-- Default Grounded Core Values (resilient fallback) --}}
                <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                        Quality Over Hype
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Clean code, fast loading speeds, and solid architecture, without unnecessary technical jargon or overcomplicated solutions.
                    </p>
                </div>

                <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                        Honest &amp; Clear Communication
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        No corporate buzzwords or hidden fees. Realistic estimates and plain terms.
                    </p>
                </div>

                <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                        100% Client Ownership
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Everything we build belongs to the client with zero vendor lock-in.
                    </p>
                </div>

                <div class="group relative rounded-3xl p-8 bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] font-bold text-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-[#00BFA5] transition-colors">
                        Reliability &amp; Care
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Thorough testing, meeting deadlines, and dependable long-term support.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- Company Milestones Timeline --}}
    @if(isset($milestones) && $milestones->isNotEmpty())
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32 fade-anim" data-direction="bottom">
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
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32 fade-anim" data-direction="bottom">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Minds Behind Accelerate Lab</span>
                <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Leadership &amp; Engineering</h2>
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
</main>
@endsection
