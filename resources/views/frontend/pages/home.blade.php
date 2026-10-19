@extends('frontend.components.layout', [
    'title' => $title ?? 'Accelerate Lab - Digital Innovation Agency',
    'description' => $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.'
])

@section('content')

{{-- ========================================================================
     HERO SECTION (Accelerate Studio Hero & Kinetic Metric Bar)
     ======================================================================== --}}
<section class="relative pt-8 pb-16 md:pt-14 md:pb-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto fade-anim" data-direction="bottom">
            
            {{-- Status Pill Badge --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-[#00BFA5]"></span>
                <span>BOUTIQUE DIGITAL ENGINEERING STUDIO</span>
            </div>

            {{-- Display Headline (Instrument Sans) --}}
            <h1 class="font-instrumentsans text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.08] mb-6">
                Custom Software Systems &amp;
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent">
                    Operational Automation
                </span>
                for Measurable Growth.
            </h1>

            {{-- Sub-Headline --}}
            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl max-w-2xl leading-relaxed mb-10">
                Engineered by our dedicated team of senior architects and systems engineers. Automating manual workflows, eliminating operational leakages, and ensuring 100% client code and database ownership.
            </p>

            {{-- Dual Kinetic CTA Buttons --}}
            <div class="flex flex-wrap items-center justify-center gap-4 mb-14">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">Schedule Business Consultation</span>
                        <span class="text-2">Start Conversation</span>
                    </span>
                </a>
                <button type="button" @click="$dispatch('open-consultation-modal')" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">Chat via WhatsApp</span>
                        <span class="text-2">Consult with Engineering Team</span>
                    </span>
                </button>
            </div>

            {{-- Hero Visual Value Proposition Frame (No AI Slop Terminals) --}}
            <div class="relative w-full max-w-5xl rounded-3xl border border-slate-200/80 dark:border-white/10 bg-white/70 dark:bg-slate-900/60 backdrop-blur-xl p-4 sm:p-6 shadow-2xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                    <div class="p-5 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200/60 dark:border-white/5">
                        <div class="w-9 h-9 rounded-xl bg-[#00BFA5]/15 text-[#00BFA5] flex items-center justify-center font-bold text-sm mb-3">01</div>
                        <h2 class="text-base font-bold text-slate-900 dark:text-white">Architectural Precision from Day One</h2>
                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                            Every system decision is scoped and reviewed directly by our senior engineering leadership to guarantee scalability, security, and maximum ROI.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200/60 dark:border-white/5">
                        <div class="w-9 h-9 rounded-xl bg-[#00BFA5]/15 text-[#00BFA5] flex items-center justify-center font-bold text-sm mb-3">02</div>
                        <h2 class="text-base font-bold text-slate-900 dark:text-white">100% Client Ownership</h2>
                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                            Full ownership of all repositories, databases, and deployment keys with zero lock-in.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200/60 dark:border-white/5">
                        <div class="w-9 h-9 rounded-xl bg-[#00BFA5]/15 text-[#00BFA5] flex items-center justify-center font-bold text-sm mb-3">03</div>
                        <h2 class="text-base font-bold text-slate-900 dark:text-white">Rapid 2-4 Weeks Delivery</h2>
                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">
                            Tested development cycles with automated test suites for instant production readiness.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Accelerate Floating Metrics Bar --}}
            <div class="w-full max-w-4xl mt-10 p-4 sm:p-6 rounded-2xl bg-white/75 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                @forelse($heroStats as $stat)
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span class="t-counter">{{ $stat->value }}</span>
                            <span class="text-sm font-mono text-[#00BFA5]">{{ $stat->unit }}</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ __($stat->label) }}</span>
                    </div>
                @empty
                    {{-- Honest methodology pillars - no fabricated numbers --}}
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span>TDD</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">Test-First Engineering</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span class="t-counter">100</span>
                            <span class="text-sm font-mono text-[#00BFA5]">%</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">Client Code Ownership</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="flex items-baseline gap-1 font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white">
                            <span>NDA</span>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium">Available for All Projects</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================
     TRUST & COMPLIANCE SIGNALS STRIP (PDP Law, Legal Entity, NDA, 100% Code Ownership)
     ======================================================================== --}}
@include('frontend.components.trust-signals')


{{-- ========================================================================
     CAPABILITIES BENTO GRID (Accelerate Dynamic Bento Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(isset($capabilityStats) && $capabilityStats->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10 p-4 rounded-2xl bg-white/60 dark:bg-[#0E1526]/60 border border-slate-200/80 dark:border-white/10">
                @foreach($capabilityStats as $cStat)
                    <div class="text-center">
                        <div class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">
                            {{ $cStat->value }}{{ $cStat->unit }}
                        </div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                            {{ __($cStat->label) }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    01 // CORE CAPABILITIES
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    End-to-End Digital Engineering
                </h2>
            </div>
            <a href="{{ route('services') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">View All Services</span>
                    <span class="text-2">Explore Stack</span>
                </span>
            </a>
        </div>

        {{-- Bento Grid Looped from CMS Services --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $index => $service)
                <div class="bento-card relative flex flex-col justify-between p-7 sm:p-8 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg fade-anim {{ $loop->first ? 'md:col-span-2 lg:col-span-2' : '' }}" data-direction="bottom">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span class="font-mono text-xs font-bold text-[#00BFA5]">
                                0{{ $index + 1 }} // {{ strtoupper($service->category ?? 'DEVELOPMENT') }}
                            </span>
                            <div class="w-9 h-9 rounded-full bg-[#00BFA5]/10 text-[#00BFA5] flex items-center justify-center font-mono text-xs font-bold">
                                /&gt;
                            </div>
                        </div>

                        <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-3">
                            {{ $service->title }}
                        </h3>

                        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                            {{ $service->short_description }}
                        </p>

                        @if(!empty($service->features) && is_array($service->features))
                            <div class="space-y-2 mb-6 pt-4 border-t border-slate-100 dark:border-white/5">
                                @foreach(array_slice($service->features, 0, 3) as $feat)
                                    <div class="flex items-center gap-2 text-xs font-medium text-slate-700 dark:text-slate-300">
                                        <span class="text-[#00BFA5]">✓</span>
                                        <span>{{ is_array($feat) ? ($feat['title'] ?? '') : $feat }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-4 flex items-center justify-between border-t border-slate-100 dark:border-white/5">
                        <span class="text-xs font-mono text-slate-400">NDA Ready · 100% Client Code Ownership</span>
                        <a href="{{ route('service', $service->slug) }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs font-semibold">
                            <span class="btn-wrap">
                                <span class="text-1">View Details</span>
                                <span class="text-2">Learn More</span>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ========================================================================
     INTERACTIVE ARCHITECTURE SWITCHER (Accelerate Blueprint Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-100/50 dark:bg-slate-950/40 relative"
         x-data="{ activeTab: 'web' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                SYSTEM ARCHITECTURE BLUEPRINT
            </span>
            <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                Engineered for High-Concurrence Workloads
            </h2>
        </div>

        {{-- Tab Switcher Bar --}}
        <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
            <button @click="activeTab = 'web'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'web' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Full-Stack Web Systems
            </button>
            <button @click="activeTab = 'cloud'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'cloud' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Cloud Infrastructure & DevOps
            </button>
            <button @click="activeTab = 'mobile'"
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all"
                    :class="activeTab === 'mobile' ? 'bg-[#00BFA5] text-[#090D16] shadow-lg shadow-[#00BFA5]/20' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-white/10'">
                Native & Cross-Platform Mobile
            </button>
        </div>

        {{-- Tab Panels --}}
        <div class="bento-card p-6 sm:p-10 bg-white/90 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-2xl">
            {{-- Web Tab --}}
            <div x-show="activeTab === 'web'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">DIGITAL PLATFORM SOLUTIONS</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        High-Performance Web Platforms &amp; Business Automation
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Engineered web portals and transactional systems built for speed, security, and scale. Our architecture guarantees high conversion rates and dependable operations under heavy traffic.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Fast Response Time &lt; 50ms</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Enterprise Security Protection</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Intuitive Business Dashboard</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ 100% Accessible &amp; Conversion-Ready</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-900/95 dark:bg-slate-950 p-6 sm:p-7 border border-slate-800 shadow-xl">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-5">
                        <span class="text-xs font-mono font-bold text-[#00BFA5] tracking-wider uppercase">WEB DELIVERABLE STANDARDS</span>
                        <span class="text-xs font-mono text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20">PRODUCTION READY</span>
                    </div>
                    <ul class="space-y-4 text-slate-300 text-xs sm:text-sm">
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Clean Architecture &amp; Complete Documentation:</strong> Well-structured codebases designed for seamless handoff to internal engineering teams.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">100% Repository Ownership:</strong> Full intellectual property rights, repositories, and credentials transferred directly to your organization.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Speed &amp; Conversion Optimization:</strong> Instant load times without bulky third-party scripts that slow down customer transactions.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Cloud Tab --}}
            <div x-show="activeTab === 'cloud'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">INFRASTRUCTURE RESILIENCE</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Resilient Cloud Infrastructure &amp; Operational Continuity
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        High-availability cloud computing foundations built to scale seamlessly as your business expands. Ensuring mission-critical services remain online 24/7 during traffic spikes.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Data Privacy &amp; Cyber Security</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Automated Daily Backups</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Elastic Multi-Region Scalability</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ 99.99% Service Uptime SLA</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-900/95 dark:bg-slate-950 p-6 sm:p-7 border border-slate-800 shadow-xl">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-5">
                        <span class="text-xs font-mono font-bold text-[#00BFA5] tracking-wider uppercase">CLOUD INFRASTRUCTURE STANDARDS</span>
                        <span class="text-xs font-mono text-cyan-400 bg-cyan-500/10 px-2.5 py-1 rounded-full border border-cyan-500/20">FULL CLIENT CONTROL</span>
                    </div>
                    <ul class="space-y-4 text-slate-300 text-xs sm:text-sm">
                        <li class="flex items-start gap-3">
                            <span class="text-cyan-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Dedicated Client Accounts:</strong> Configured directly in your company official cloud accounts, never shared hosting.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-cyan-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Automated Daily Backups &amp; Disaster Recovery:</strong> Encrypted automated recovery pipelines ensure zero data loss under all circumstances.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-cyan-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Operational Cost Optimization:</strong> Right-sized infrastructure blueprints that eliminate unnecessary recurring cloud overhead.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Mobile Tab --}}
            <div x-show="activeTab === 'mobile'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-mono text-[#00BFA5] uppercase">CONSUMER &amp; ENTERPRISE MOBILE</span>
                    <h3 class="font-instrumentsans text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">
                        Responsive Mobile Applications for Customer Retention
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        Native and cross-platform mobile experiences for iOS and Android that drive engagement, streamline customer transactions, and boost user retention.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-mono text-slate-600 dark:text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Fluid 60fps User Interface</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Direct Push Notifications &amp; Updates</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Biometric Authentication Security</div>
                        <div class="p-3 rounded-xl bg-slate-100 dark:bg-white/5">✓ Integrated Digital Payment Flows</div>
                    </div>
                </div>
                <div class="rounded-2xl bg-slate-900/95 dark:bg-slate-950 p-6 sm:p-7 border border-slate-800 shadow-xl">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-5">
                        <span class="text-xs font-mono font-bold text-[#00BFA5] tracking-wider uppercase">MOBILE APPLICATION STANDARDS</span>
                        <span class="text-xs font-mono text-teal-400 bg-teal-500/10 px-2.5 py-1 rounded-full border border-teal-500/20">STORE READY</span>
                    </div>
                    <ul class="space-y-4 text-slate-300 text-xs sm:text-sm">
                        <li class="flex items-start gap-3">
                            <span class="text-teal-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Optimized Performance on Local Networks:</strong> Lightweight data consumption ensuring seamless operation across varying mobile bandwidths.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-teal-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Secure Access &amp; Biometric Protection:</strong> Enterprise grade biometric verification conforming to international privacy and data protection standards.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-teal-400 font-bold shrink-0 mt-0.5">✓</span>
                            <span><strong class="text-white">Dedicated Client App Store Ownership:</strong> Published directly under your corporate entity name on Apple App Store and Google Play Store.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ========================================================================
     SELECTED WORK / CASE STUDIES (Accelerate Portfolio Matrix)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    02 // SELECTED PORTFOLIO
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    Proven Track Record &amp; Case Studies
                </h2>
            </div>
            <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">View All Projects</span>
                    <span class="text-2">Explore Case Studies</span>
                </span>
            </a>
        </div>

        {{-- Projects Looped from CMS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($recentProjects as $project)
                <div class="bento-card group relative overflow-hidden bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-xl fade-anim" data-direction="bottom">
                    {{-- Project Image / Visual Container --}}
                    <div class="relative h-64 sm:h-80 w-full overflow-hidden bg-slate-950">
                        @php
                            $projectImage = $project->image_path ?? $project->image;
                        @endphp
                        @if(!empty($projectImage))
                            <img src="{{ asset('storage/' . $projectImage) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-600 font-mono text-sm">
                                [Accelerate Lab System Blueprint]
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        
                        {{-- Client Tag & Industry --}}
                        <div class="absolute top-4 left-4 flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-mono font-semibold bg-black/60 text-[#00BFA5] backdrop-blur-md border border-white/10">
                                {{ $project->client ?? 'ENTERPRISE CLIENT' }}
                            </span>
                            @if(!empty($project->industry))
                                <span class="px-3 py-1 rounded-full text-xs font-mono font-medium bg-white/10 text-white backdrop-blur-md border border-white/10">
                                    {{ $project->industry }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Project Content --}}
                    <div class="p-6 sm:p-8">
                        <h3 class="font-instrumentsans text-2xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-[#00BFA5] transition-colors">
                            {{ $project->title }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ $project->description }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-white/5">
                            <span class="text-xs font-mono text-slate-400">Production Deployed</span>
                            <a href="{{ route('project', $project->slug) }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs font-semibold">
                                <span class="btn-wrap">
                                    <span class="text-1">View Case Study</span>
                                    <span class="text-2">Learn Architecture</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 p-12 text-center text-slate-400 font-mono">
                    No projects currently published.
                </div>
            @endforelse
        </div>
    </div>
</section>


{{-- ========================================================================
     LATEST INSIGHTS & DISPATCHES (Accelerate Technical Papers Matrix)
     ======================================================================== --}}
@if(isset($latestArticles) && $latestArticles->isNotEmpty())
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 fade-anim" data-direction="bottom">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    03 // LATEST INSIGHTS
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    Engineering Notes &amp; Architectural Field Notes
                </h2>
            </div>
            <a href="{{ route('blog') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">View All Insights</span>
                    <span class="text-2">Explore Articles</span>
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestArticles as $art)
                <div class="bento-card p-6 sm:p-7 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg flex flex-col justify-between fade-anim" data-direction="bottom">
                    <div>
                        <div class="flex items-center gap-2 mb-3 text-xs font-mono">
                            @if($art->category)
                                <span class="px-2.5 py-1 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] font-semibold">
                                    {{ $art->category->name }}
                                </span>
                            @endif
                            <span class="text-slate-400">
                                {{ $art->published_at ? $art->published_at->format('M d, Y') : '' }}
                            </span>
                        </div>
                        <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mb-2 hover:text-[#00BFA5] transition-colors">
                            <a href="{{ route('article', $art->slug) }}">
                                {{ $art->title }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($art->content), 100) }}
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-white/5">
                        <a href="{{ route('article', $art->slug) }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold text-[#00BFA5] hover:underline">
                            <span>Read Paper</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ========================================================================
     CLIENT TESTIMONIALS (Accelerate Client Feedback Cards)
     ======================================================================== --}}
@if($testimonials->isNotEmpty())
    <section class="py-20 border-t border-slate-200/80 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    04 // CLIENT EXPERIENCES
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    Trusted by Visionary Leaders
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                    <div class="bento-card p-7 sm:p-8 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg flex flex-col justify-between">
                        <div>
                            {{-- 5-star rating --}}
                            <div class="flex items-center gap-1 text-[#00BFA5] mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <blockquote class="text-slate-700 dark:text-slate-300 text-sm sm:text-base leading-relaxed mb-6 italic">
                                "{{ $testimonial->quote }}"
                            </blockquote>
                        </div>
                        <div class="pt-4 border-t border-slate-100 dark:border-white/5 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#00BFA5]/15 text-[#00BFA5] font-bold font-mono flex items-center justify-center">
                                {{ substr($testimonial->client_name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-instrumentsans text-sm font-bold text-slate-900 dark:text-white">{{ $testimonial->client_name }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 font-mono">{{ $testimonial->client_role }} • {{ $testimonial->client_company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- ========================================================================
     FAQ SECTION (Direct Answers for Business Decision Makers)
     ======================================================================== --}}
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                05 // TRANSPARENCY &amp; FAQ
            </span>
            <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                Frequently Asked Questions
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mt-3">
                Straightforward answers about our workflow, code ownership, and engineering quality.
            </p>
        </div>

        <div x-data="{ openFaq: 1 }" class="space-y-4">
            {{-- FAQ 1: Who builds it? --}}
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-md">
                <button @click="openFaq = openFaq === 1 ? null : 1" 
                        class="w-full flex items-center justify-between text-left gap-4 cursor-pointer"
                        :aria-expanded="openFaq === 1">
                    <span class="font-instrumentsans text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                        What team composition and engineering standards will handle my project?
                    </span>
                    <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 shrink-0 text-sm font-mono font-bold transition-transform duration-200"
                          :class="{ 'rotate-180': openFaq === 1 }">
                        ↓
                    </span>
                </button>
                <div x-show="openFaq === 1" x-transition class="mt-4 pt-4 border-t border-slate-100 dark:border-white/5 text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Your project is engineered by our premier technical team, led by Senior Systems Architects and seasoned software engineers. With rigorous automated testing (Strict TDD) and multi-tier architectural reviews, you collaborate directly with technical experts dedicated to building high-performance systems for your business.
                </div>
            </div>

            {{-- FAQ 2: IP and Source Code Ownership --}}
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-md">
                <button @click="openFaq = openFaq === 2 ? null : 2" 
                        class="w-full flex items-center justify-between text-left gap-4 cursor-pointer"
                        :aria-expanded="openFaq === 2">
                    <span class="font-instrumentsans text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                        Who owns the intellectual property and code repository upon completion?
                    </span>
                    <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 shrink-0 text-sm font-mono font-bold transition-transform duration-200"
                          :class="{ 'rotate-180': openFaq === 2 }">
                        ↓
                    </span>
                </button>
                <div x-show="openFaq === 2" x-transition class="mt-4 pt-4 border-t border-slate-100 dark:border-white/5 text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    100% full intellectual property and source code belongs entirely to your company. All code repositories, database schemas, and documentation are transferred with zero recurring royalties or vendor lock-in.
                </div>
            </div>

            {{-- FAQ 3: Delivery Timeline --}}
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-md">
                <button @click="openFaq = openFaq === 3 ? null : 3" 
                        class="w-full flex items-center justify-between text-left gap-4 cursor-pointer"
                        :aria-expanded="openFaq === 3">
                    <span class="font-instrumentsans text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                        What is the typical delivery timeline for a project?
                    </span>
                    <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 shrink-0 text-sm font-mono font-bold transition-transform duration-200"
                          :class="{ 'rotate-180': openFaq === 3 }">
                        ↓
                    </span>
                </button>
                <div x-show="openFaq === 3" x-transition class="mt-4 pt-4 border-t border-slate-100 dark:border-white/5 text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Most functional business platforms, operational portals, and system improvements are delivered within 2 to 4 weeks through structured weekly sprints with transparent demo sessions.
                </div>
            </div>

            {{-- FAQ 4: Legal Protection --}}
            <div class="bento-card p-6 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-md">
                <button @click="openFaq = openFaq === 4 ? null : 4" 
                        class="w-full flex items-center justify-between text-left gap-4 cursor-pointer"
                        :aria-expanded="openFaq === 4">
                    <span class="font-instrumentsans text-base sm:text-lg font-bold text-slate-900 dark:text-white">
                        Is our engagement protected by an official corporate legal entity?
                    </span>
                    <span class="w-8 h-8 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 dark:text-slate-400 shrink-0 text-sm font-mono font-bold transition-transform duration-200"
                          :class="{ 'rotate-180': openFaq === 4 }">
                        ↓
                    </span>
                </button>
                <div x-show="openFaq === 4" x-transition class="mt-4 pt-4 border-t border-slate-100 dark:border-white/5 text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Yes. All engagements are legally contracted under PT Akselerasi Digital Mandiri with comprehensive Non-Disclosure Agreements (NDA) and formal service contracts protecting your confidentiality and business interests.
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
