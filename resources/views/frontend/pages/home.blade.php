@extends('frontend.components.layout', ['title' => 'Accelerate Lab - Digital Innovation & Software Engineering Agency'])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "WebSite",
    "name": "Accelerate Lab",
    "url": "{{ config('app.url') }}",
    "description": "Boutique software engineering lab and digital innovation agency. We build high-performance web applications, scalable operational portals, and high-converting digital platforms.",
    "potentialAction": {
        "{{ '@' }}type": "SearchAction",
        "target": "{{ url('/blog') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush

@section('content')
    {{-- =========================================================================
         1. HERO AREA (Authentic Redox Lines 213-270)
         ========================================================================= --}}
    <section class="hero-area pt-36 pb-20 md:pt-48 md:pb-28 relative overflow-hidden bg-slate-950 text-white" aria-labelledby="hero-heading">
        {{-- Ambient Background Glow --}}
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-teal-500/10 rounded-full blur-[140px] pointer-events-none -z-10" aria-hidden="true"></div>

        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="hero-area-inner">
                <div class="hero-content">
                    {{-- Rotating Circle Badge (Redox Signature) --}}
                    <div class="award-wrapper mb-8">
                        <div class="circle-text-wrapper">
                            <div class="circle-text">
                                <svg class="text" viewBox="0 0 100 100" width="130" height="130" aria-hidden="true">
                                    <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="none" />
                                    <text font-size="9.5" font-weight="700" letter-spacing="2" fill="#00BFA5">
                                        <textPath href="#circlePath" startOffset="0%">
                                            ACCELERATE LAB * INNOVATION & CODE *
                                        </textPath>
                                    </text>
                                </svg>
                                <div class="icon">
                                    <x-app-icon name="brand-rocket" class="size-7 text-teal-400" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Hero Headline --}}
                    <div class="section-header max-w-4xl">
                        <h1 id="hero-heading" class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-[1.08] font-instrumentsans">
                            Accelerate your brand with 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-teal-400 to-emerald-400">precision engineering</span>
                            and high-impact design.
                        </h1>
                    </div>

                    {{-- Metrics & Intro Content --}}
                    <div class="section-content mt-12 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
                        <div class="md:col-span-6 flex items-center gap-10">
                            <div class="feature-box">
                                <span class="block text-4xl sm:text-5xl font-bold text-white font-mono">98%</span>
                                <p class="text-xs sm:text-sm text-slate-400 mt-1 uppercase tracking-wider">Client satisfaction rate</p>
                            </div>
                            <div class="h-12 w-px bg-white/10" aria-hidden="true"></div>
                            <div class="feature-box">
                                <span class="block text-4xl sm:text-5xl font-bold text-teal-400 font-mono">120+</span>
                                <p class="text-xs sm:text-sm text-slate-400 mt-1 uppercase tracking-wider">Digital products shipped</p>
                            </div>
                        </div>

                        <div class="md:col-span-6 flex flex-col sm:flex-row items-start sm:items-center justify-end gap-5">
                            <p class="text-slate-400 text-sm sm:text-base max-w-md leading-relaxed">
                                We architect high-performance web applications, enterprise software, and conversion-optimized digital systems for ambitious teams.
                            </p>
                            <a href="{{ route('contact') }}" class="rr-btn shrink-0">
                                <span class="btn-wrap">
                                    <span class="text-one">Start a Project</span>
                                    <span class="text-two">Start a Project</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Client & Partner Proof Marquee --}}
    <div id="trusted-partners-marquee" class="w-full bg-slate-900 border-y border-white/10 py-6 overflow-hidden relative" aria-label="Fokus Solusi Industri" role="region">
        <div class="absolute inset-y-0 left-0 w-24 sm:w-36 bg-gradient-to-r from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute inset-y-0 right-0 w-24 sm:w-36 bg-gradient-to-l from-slate-900 to-transparent z-10 pointer-events-none" aria-hidden="true"></div>
        
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex items-center gap-10 mx-6 text-xs sm:text-sm font-bold text-slate-400 tracking-wider">
                <span>DISTRIBUTOR &amp; GROSIR</span>
                <span class="text-teal-400">•</span>
                <span>LOGISTIK &amp; PENGIRIMAN</span>
                <span class="text-teal-400">•</span>
                <span>MANUFAKTUR</span>
                <span class="text-teal-400">•</span>
                <span>RETAIL &amp; KULINER</span>
                <span class="text-teal-400">•</span>
                <span>JASA PROFESIONAL</span>
                <span class="text-teal-400">•</span>
                <span>KESEHATAN</span>
                <span class="text-teal-400">•</span>
                <span>LEGAL TECH</span>
                <span class="text-teal-400">•</span>
                <span>FINTECH &amp; SAAS</span>
            </div>
        </div>
    </div>

    {{-- =========================================================================
         2. NEXTSAAS TECHNICAL BENTO GRID SECTION (Lines 2480-2580)
         ========================================================================= --}}
    <section class="py-24 bg-slate-950 relative" aria-labelledby="bento-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-14">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                    Why Accelerate Lab
                </span>
                <h2 id="bento-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white font-instrumentsans max-w-2xl">
                    More than developers: your long-term technology partners
                </h2>
            </div>

            <div class="grid grid-cols-12 gap-6 items-stretch">
                {{-- Bento Card 1: 8-col Hero Highlight --}}
                <div class="col-span-12 lg:col-span-8 relative overflow-hidden rounded-[20px] bg-gradient-to-br from-slate-900 to-slate-800/90 border border-white/10 p-8 sm:p-12 flex flex-col justify-between">
                    <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-teal-500/10 blur-3xl pointer-events-none" aria-hidden="true"></div>
                    <div class="relative z-10 max-w-xl">
                        <span class="text-xs font-mono uppercase tracking-widest text-teal-400 font-bold mb-3 block">Architecture First</span>
                        <h3 class="text-2xl sm:text-3xl font-bold text-white font-instrumentsans mb-4">
                            Architecture First: engineered for high-throughput enterprise stability
                        </h3>
                        <p class="text-slate-400 text-sm sm:text-base leading-relaxed mb-8">
                            We design software solutions built on resilient modular foundations. Clean boundaries, comprehensive automated tests, and scalable deployment pipelines mean zero tech debt.
                        </p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ route('services') }}" class="rr-btn btn-border">
                            <span class="btn-wrap">
                                <span class="text-one">Explore Capabilities</span>
                                <span class="text-two">Explore Capabilities</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Bento Card 2: 4-col Reliable Code Card --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-slate-900/90 border border-white/10 p-8 flex flex-col justify-between">
                    <div>
                        <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 mb-6">
                            <x-app-icon name="brand-rocket" class="size-6 text-teal-400" />
                        </span>
                        <h3 class="text-xl font-bold text-white mb-2 font-instrumentsans">Reliable &amp; Scalable Code</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Every system is engineered to handle 10x traffic spikes with sub-100ms response latencies.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs font-mono text-slate-400">Regression Rate</span>
                        <span class="text-xs font-mono text-teal-400 font-bold">100% CI Verified</span>
                    </div>
                </div>

                {{-- Bento Card 3: 4-col Security Card --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-slate-900/90 border border-white/10 p-8 flex flex-col justify-between">
                    <div>
                        <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 mb-6">
                            <x-app-icon name="check_circle" class="size-6 text-teal-400" />
                        </span>
                        <h3 class="text-xl font-bold text-white mb-2 font-instrumentsans">Hardened Security by Design</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            End-to-end encryption, strict role-based access control, and automated vulnerability scanning built-in.
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs font-mono text-slate-400">Security Audit</span>
                        <span class="text-xs font-mono text-teal-400 font-bold">Passed</span>
                    </div>
                </div>

                {{-- Bento Card 4: 8-col Velocity Card --}}
                <div class="col-span-12 lg:col-span-8 rounded-[20px] bg-slate-900/90 border border-white/10 p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between gap-8">
                    <div class="space-y-2 max-w-md">
                        <h3 class="text-2xl font-bold text-white font-instrumentsans">Rapid Time to Market</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Iterative sprints delivering production-ready releases every 2 weeks without compromising code stability.
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-center px-4 py-3 rounded-xl bg-slate-950 border border-white/10">
                            <span class="block text-2xl font-bold text-teal-400 font-mono">14d</span>
                            <span class="text-[11px] text-slate-400 uppercase">Avg Sprint</span>
                        </div>
                        <div class="text-center px-4 py-3 rounded-xl bg-slate-950 border border-white/10">
                            <span class="block text-2xl font-bold text-white font-mono">99.9%</span>
                            <span class="text-[11px] text-slate-400 uppercase">Uptime SLA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         3. COMPLEX PROFICIENCY SERVICES LIST (Authentic Redox Lines 500-580)
         ========================================================================= --}}
    <section class="service-area py-24 bg-slate-900/40 border-t border-white/5 relative" aria-labelledby="services-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-header mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                        Core Capabilities
                    </span>
                    <h2 id="services-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-white font-instrumentsans">
                        Complex Proficiency
                    </h2>
                </div>
                <p class="text-slate-400 text-sm sm:text-base max-w-md leading-relaxed">
                    End-to-end technical execution across modern web platforms, mobile architecture, cloud infrastructure, and product strategy.
                </p>
            </div>

            <div class="services-wrapper-box">
                <div class="services-wrapper-1">
                    {{-- Service 01 --}}
                    <div class="service-box">
                        <div class="count">
                            <span class="number">(01)</span>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors">
                                    Full-Stack Web Development
                                </a>
                            </h3>
                            <ul class="service-list">
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Laravel 12 Architecture</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">React &amp; Vue SPAs</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">High-Throughput REST &amp; GraphQL APIs</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Database Optimization</a></li>
                            </ul>
                        </div>
                        <div class="thumb">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop&q=80" alt="Full-Stack Web Development">
                        </div>
                    </div>

                    {{-- Service 02 --}}
                    <div class="service-box">
                        <div class="count">
                            <span class="number">(02)</span>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors">
                                    Mobile Application Engineering
                                </a>
                            </h3>
                            <ul class="service-list">
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Flutter Cross-Platform</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">React Native Apps</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Offline-First Synchronization</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">App Store Deployment</a></li>
                            </ul>
                        </div>
                        <div class="thumb">
                            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&auto=format&fit=crop&q=80" alt="Mobile Application Engineering">
                        </div>
                    </div>

                    {{-- Service 03 --}}
                    <div class="service-box">
                        <div class="count">
                            <span class="number">(03)</span>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors">
                                    Product Design &amp; UI/UX Systems
                                </a>
                            </h3>
                            <ul class="service-list">
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Design Systems &amp; Tokens</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Interactive Prototyping</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Usability Testing</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Conversion Rate Optimization</a></li>
                            </ul>
                        </div>
                        <div class="thumb">
                            <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=600&auto=format&fit=crop&q=80" alt="Product Design & UI/UX Systems">
                        </div>
                    </div>

                    {{-- Service 04 --}}
                    <div class="service-box">
                        <div class="count">
                            <span class="number">(04)</span>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors">
                                    Cloud Architecture &amp; DevOps
                                </a>
                            </h3>
                            <ul class="service-list">
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Docker &amp; Kubernetes</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">CI/CD Automation Pipelines</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">AWS &amp; Cloud Infrastructure</a></li>
                                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Zero-Downtime Deployments</a></li>
                            </ul>
                        </div>
                        <div class="thumb">
                            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&auto=format&fit=crop&q=80" alt="Cloud Architecture & DevOps">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         4. FEATURED WORK GRID SECTION (Authentic Redox Lines 370-480)
         ========================================================================= --}}
    <section class="work-area py-24 bg-slate-950 border-t border-white/5 relative" aria-labelledby="work-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-header mb-14 flex items-end justify-between">
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                        Case Studies
                    </span>
                    <h2 id="work-heading" class="text-4xl sm:text-5xl font-bold tracking-tight text-white font-instrumentsans">
                        Featured Work
                    </h2>
                </div>
                <div class="hidden sm:block">
                    <span class="text-2xl font-mono text-slate-500">(04)</span>
                </div>
            </div>

            <div class="works-wrapper-box">
                <div class="works-wrapper-1">
                    {{-- Work Box 1 --}}
                    <div class="work-box group">
                        <div class="thumb">
                            <div class="image scale">
                                <a href="{{ route('case-studies') }}">
                                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80" alt="Fintech Intelligence Engine">
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('case-studies') }}" class="text-white hover:text-teal-400 transition-colors">
                                    Fintech Intelligence Engine
                                </a>
                            </h3>
                            <div class="meta">
                                <span class="tag">Laravel &amp; Vue</span>
                                <span class="date">2025</span>
                            </div>
                        </div>
                    </div>

                    {{-- Work Box 2 --}}
                    <div class="work-box group">
                        <div class="thumb">
                            <div class="image scale">
                                <a href="{{ route('case-studies') }}">
                                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80" alt="Telehealth Analytics Portal">
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('case-studies') }}" class="text-white hover:text-teal-400 transition-colors">
                                    Telehealth Analytics Portal
                                </a>
                            </h3>
                            <div class="meta">
                                <span class="tag">Healthcare</span>
                                <span class="date">2025</span>
                            </div>
                        </div>
                    </div>

                    {{-- Work Box 3 --}}
                    <div class="work-box group">
                        <div class="thumb">
                            <div class="image scale">
                                <a href="{{ route('case-studies') }}">
                                    <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&auto=format&fit=crop&q=80" alt="Cybersecurity Threat Map">
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('case-studies') }}" class="text-white hover:text-teal-400 transition-colors">
                                    Cybersecurity Threat Map
                                </a>
                            </h3>
                            <div class="meta">
                                <span class="tag">Real-Time Data</span>
                                <span class="date">2025</span>
                            </div>
                        </div>
                    </div>

                    {{-- Work Box 4 --}}
                    <div class="work-box group">
                        <div class="thumb">
                            <div class="image scale">
                                <a href="{{ route('case-studies') }}">
                                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&auto=format&fit=crop&q=80" alt="Enterprise Logistics Suite">
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ route('case-studies') }}" class="text-white hover:text-teal-400 transition-colors">
                                    Enterprise Logistics Suite
                                </a>
                            </h3>
                            <div class="meta">
                                <span class="tag">Cloud Architecture</span>
                                <span class="date">2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-14 text-center">
                <a href="{{ route('case-studies') }}" class="rr-btn btn-border">
                    <span class="btn-wrap">
                        <span class="text-one">View All Work</span>
                        <span class="text-two">View All Work</span>
                    </span>
                </a>
            </div>
        </div>
    </section>

    {{-- Two-Tier Commercial Offer Ladder Section --}}
    <section class="py-24 bg-slate-900/60 border-t border-white/5" aria-labelledby="pricing-heading">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-teal-500/10 text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                    Transparent Engagement
                </span>
                <h2 id="pricing-heading" class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white font-instrumentsans">
                    Model Kerja Sama Fleksibel dan Transparan
                </h2>
                <p class="text-slate-400 text-base sm:text-lg mt-3">
                    Mulai dari landing page kilat hingga sistem portal operasional terintegrasi penuh.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                {{-- Tier 1: Sprint --}}
                <div class="p-8 sm:p-10 rounded-[20px] bg-slate-900 border border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-teal-400 bg-teal-500/10 px-3 py-1 rounded-full border border-teal-500/20">Product Sprint</span>
                            <span class="text-xs text-slate-400 font-mono">1-2 Minggu</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2 font-instrumentsans">Website Bisnis &amp; Landing Page</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Website profil berkonversi tinggi, desain custom elegan, mobile responsif, dan siap meluncurkan bisnis Anda ke publik.
                        </p>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>Desain kustom tanpa template generik</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>Core Web Vitals skor 95+ (LCP &lt; 1.0s)</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>100% Hak Milik Source Code &amp; Domain</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('contact') }}" class="rr-btn btn-border w-full text-center">
                            <span class="btn-wrap">
                                <span class="text-one">Konsultasi Paket Sprint</span>
                                <span class="text-two">Konsultasi Paket Sprint</span>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Tier 2: Enterprise Lab --}}
                <div class="p-8 sm:p-10 rounded-[20px] bg-gradient-to-br from-slate-900 to-slate-800 border border-teal-500/40 relative flex flex-col justify-between shadow-xl">
                    <div class="absolute -top-3 right-6 bg-teal-500 text-slate-950 text-xs font-bold font-mono uppercase px-3 py-1 rounded-full shadow">
                        Paling Dipilih
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-bold uppercase tracking-wider text-teal-400 bg-teal-500/10 px-3 py-1 rounded-full border border-teal-500/20">Custom Platform</span>
                            <span class="text-xs text-slate-400 font-mono">Bespoke Engineering</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2 font-instrumentsans">Portal Bisnis &amp; Sistem Internal</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            Rekayasa sistem operasional back-office, multi-cabang, otomasi invoice, dan integrasi database menyeluruh.
                        </p>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>Arsitektur monolitik Laravel 12 tahan lonjakan</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>Role-based access control &amp; audit log</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <x-app-icon name="check_circle" class="size-5 text-teal-400 shrink-0" />
                                <span>Garansi pemeliharaan &amp; SLA uptime 99.9%</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10">
                        <a href="{{ route('contact') }}" class="rr-btn w-full text-center">
                            <span class="btn-wrap">
                                <span class="text-one">Mulai Proyek Kustom</span>
                                <span class="text-two">Mulai Proyek Kustom</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-24 bg-slate-950 border-t border-white/5" aria-labelledby="faq-heading">
        <div class="max-w-[860px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-teal-500/10 text-teal-400 text-xs font-mono uppercase tracking-widest border border-teal-500/20 mb-4">
                    Pertanyaan Umum
                </span>
                <h2 id="faq-heading" class="text-3xl sm:text-4xl font-bold tracking-tight text-white font-instrumentsans">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="space-y-4" x-data="{ active: null }">
                <div class="rounded-2xl bg-slate-900 border border-white/10 overflow-hidden">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full p-6 text-left flex items-center justify-between text-white font-semibold focus:outline-none">
                        <span>Berapa lama estimasi pengerjaan proyek software atau website?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 1 }" />
                    </button>
                    <div x-show="active === 1" x-collapse class="px-6 pb-6 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                        Untuk landing page dan website profil bisnis, sprint rata-rata memakan waktu 7 hingga 14 hari kerja. Untuk sistem portal operasional kustom terintegrasi, waktu pengerjaan berkisar antara 4 hingga 8 minggu tergantung kompleksitas modul.
                    </div>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-white/10 overflow-hidden">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full p-6 text-left flex items-center justify-between text-white font-semibold focus:outline-none">
                        <span>Apakah source code dan database menjadi hak milik penuh klien?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 2 }" />
                    </button>
                    <div x-show="active === 2" x-collapse class="px-6 pb-6 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                        Ya, 100%. Kami menyerahkan seluruh source code di Git repository privat Anda, konfigurasi database, dan hak akses server. Anda memiliki aset digital tersebut selamanya tanpa biaya langganan software proprietary.
                    </div>
                </div>

                <div class="rounded-2xl bg-slate-900 border border-white/10 overflow-hidden">
                    <button @click="active = (active === 3 ? null : 3)" class="w-full p-6 text-left flex items-center justify-between text-white font-semibold focus:outline-none">
                        <span>Bagaimana Accelerate Lab menjamin kualitas dan stabilitas kode?</span>
                        <x-app-icon name="keyboard_arrow_down" class="size-5 text-teal-400 transition-transform duration-200" ::class="{ 'rotate-180': active === 3 }" />
                    </button>
                    <div x-show="active === 3" x-collapse class="px-6 pb-6 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-4">
                        Kami menerapkan Strict Test-Driven Development (TDD) dengan suite pengujian otomatis PHPUnit, validasi keamanan, pemeriksaan aksesibilitas WCAG 2.2 AA, dan optimasi performa Core Web Vitals pada setiap rilis produksi.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Final Action CTA Banner --}}
    <section class="py-24 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 border-t border-white/10 relative text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-5xl font-bold text-white font-instrumentsans mb-6">
                Siap Melipatgandakan Efisiensi Digital Bisnis Anda?
            </h2>
            <p class="text-slate-400 text-base sm:text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
                Jadwalkan konsultasi arsitektur langsung bersama principal engineer kami. Diskusikan solusi yang paling efektif untuk kebutuhan spesifik perusahaan Anda.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn !px-8 !py-4">
                    <span class="btn-wrap">
                        <span class="text-one">Mulai Diskusi Proyek</span>
                        <span class="text-two">Mulai Diskusi Proyek</span>
                    </span>
                </a>
                <a href="{{ route('services') }}" class="rr-btn btn-border !px-8 !py-4">
                    <span class="btn-wrap">
                        <span class="text-one">Lihat Kapabilitas</span>
                        <span class="text-two">Lihat Kapabilitas</span>
                    </span>
                </a>
            </div>
        </div>
    </section>
@endsection
