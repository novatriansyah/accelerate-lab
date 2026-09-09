@extends('frontend.components.layout', [
    'title' => $title ?? 'Careers at Accelerate Lab - Join Our Engineering Team',
    'description' => $description ?? 'Join Accelerate Lab and build cutting-edge digital products. Browse open positions in engineering, design, and strategy.'
])

@push('schema')
@if(isset($jobs) && $jobs->isNotEmpty())
    @foreach($jobs as $job)
    <script type="application/ld+json">
    {
        "{{ '@' }}context": "https://schema.org",
        "{{ '@' }}type": "JobPosting",
        "title": {!! json_encode($job->title) !!},
        "description": {!! json_encode($job->description ?? 'Engineering role at Accelerate Lab.') !!},
        "datePosted": "{{ $job->created_at?->toIso8601String() ?? now()->toIso8601String() }}",
        "validThrough": "{{ now()->addMonths(3)->toIso8601String() }}",
        "employmentType": "FULL_TIME",
        "hiringOrganization": {
            "{{ '@' }}type": "Organization",
            "name": "Accelerate Lab",
            "sameAs": "{{ config('app.url') }}"
        },
        "jobLocation": {
            "{{ '@' }}type": "Place",
            "address": {
                "{{ '@' }}type": "PostalAddress",
                "addressLocality": "Jakarta",
                "addressCountry": "ID"
            }
        }
    }
    </script>
    @endforeach
@endif
@endpush

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Glow --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-20 lg:mb-28">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>Join Our Engineering Cohort</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Build Systems That Handle <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Real Scale</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed mb-10">
            We are looking for engineers, architects, and designers who care deeply about code quality, distributed performance, and software longevity. No corporate theatre, no useless meetings.
        </p>
    </section>

    {{-- Engineering Culture Bento Grid --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">The Operating System</span>
            <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Why Work With Us</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">We designed Accelerate Lab to be the dream studio for high-agency engineers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/40 transition-all">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Deep Focus Hours</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">No mandatory back-to-back standups. We communicate asynchronously and protect multi-hour uninterrupted coding blocks.</p>
            </div>

            <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/40 transition-all">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Remote-First Culture</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">Work from anywhere across Indonesia or Asia-Pacific. We judge outcomes, reliability, and code quality, not desk hours.</p>
            </div>

            <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/40 transition-all">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Strict Test Hygiene</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">No PR gets merged without thorough automated tests. You will work on a clean, maintainable, regression-proof codebase.</p>
            </div>

            <div class="p-8 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/40 transition-all">
                <div class="w-12 h-12 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Learning & Tools Budget</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">Annual stipend for hardware upgrades, books, conference tickets, and IDE/developer tool licenses.</p>
            </div>
        </div>
    </section>

    {{-- Dynamic Open Positions Section --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 lg:mb-32">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">Available Roles</span>
            <h2 class="text-3xl sm:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">Open Positions</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 text-base">Explore active openings or send us an unsolicited application.</p>
        </div>

        @if(isset($jobs) && $jobs->isNotEmpty())
            <div class="space-y-6">
                @foreach($jobs as $job)
                    <div class="group p-6 sm:p-8 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg hover:border-[#00BFA5]/50 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                            <div>
                                <div class="flex flex-wrap items-center gap-3 mb-2">
                                    <span class="px-3 py-1 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] text-xs font-mono font-semibold">
                                        {{ $job->department ?? 'Engineering' }}
                                    </span>
                                    <span class="px-3 py-1 rounded-md bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 text-xs font-mono">
                                        {{ $job->type ?? 'Full-time' }}
                                    </span>
                                    <span class="px-3 py-1 rounded-md bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 text-xs font-mono flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-[#00BFA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        {{ $job->location ?? 'Remote, Indonesia' }}
                                    </span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white group-hover:text-[#00BFA5] transition-colors">
                                    {{ $job->title }}
                                </h3>
                                @if(!empty($job->description))
                                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-3 max-w-2xl leading-relaxed">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($job->description), 160) }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex-shrink-0">
                                <a href="mailto:careers@acceleratelab.id?subject=Application for {{ rawurlencode($job->title) }}" class="rr-btn rr-btn-primary">
                                    <span class="btn-wrap">
                                        <span class="text-1">Apply For Role</span>
                                        <span class="text-2">Apply For Role</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-12 sm:p-16 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-lg">
                <div class="w-16 h-16 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">No Active Openings Right Now</h3>
                <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto text-base mb-8">
                    We are not actively recruiting for a specific desk today, but we are always eager to talk to exceptional talent who want to build high-grade software.
                </p>
                <a href="mailto:careers@acceleratelab.id?subject=Unsolicited Engineering Inquiry" class="rr-btn rr-btn-outline">
                    <span class="btn-wrap">
                        <span class="text-1">Send Unsolicited CV</span>
                        <span class="text-2">Send Unsolicited CV</span>
                    </span>
                </a>
            </div>
        @endif
    </section>

    {{-- Bottom CTA --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl p-8 sm:p-12 bg-gradient-to-r from-slate-900 via-[#0A1A2F] to-[#090D16] text-white border border-white/10 shadow-2xl text-center">
            <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight mb-4">Want to Collaborate as a Client?</h2>
            <p class="text-slate-300 max-w-2xl mx-auto text-base mb-8">If you have a digital initiative that requires our engineering squad, start a conversation with us.</p>
            <a href="{{ url('/contact') }}" class="rr-btn rr-btn-primary">
                <span class="btn-wrap">
                    <span class="text-1">Get in Touch</span>
                    <span class="text-2">Get in Touch</span>
                </span>
            </a>
        </div>
    </section>
</main>
@endsection
