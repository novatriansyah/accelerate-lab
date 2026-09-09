@extends('frontend.components.layout', [
    'title' => 'Cloud Architecture & DevOps Infrastructure - Accelerate Lab',
    'description' => 'Enterprise cloud architecture, container orchestration, automated CI/CD pipelines, and high-availability infrastructure engineered by Accelerate Lab.'
])

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": "Cloud Architecture",
    "serviceType": "Cloud Infrastructure & DevOps",
    "description": "Enterprise cloud architecture, container orchestration, automated CI/CD pipelines, and high-availability infrastructure engineered by Accelerate Lab.",
    "provider": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
        "url": "{{ config('app.url') }}"
    },
    "areaServed": "Worldwide"
}
</script>
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "BreadcrumbList",
    "itemListElement": [
        {
            "{{ '@' }}type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 2,
            "name": "Services",
            "item": "{{ url('/services') }}"
        },
        {
            "{{ '@' }}type": "ListItem",
            "position": 3,
            "name": "Cloud Architecture",
            "item": "{{ url('/services/cloud-architecture') }}"
        }
    ]
}
</script>
@endpush

@section('content')
@php
    $currentLocale = app()->getLocale();
@endphp

{{-- ========================================================================
     HERO SECTION (Accelerate Studio Header)
     ======================================================================== --}}
<section class="relative pt-6 pb-16 md:pt-12 md:pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumbs --}}
        <div class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-[#00BFA5]">HOME</a>
            <span>/</span>
            <a href="{{ route('services') }}" class="hover:text-[#00BFA5]">SERVICES</a>
            <span>/</span>
            <span class="text-[#00BFA5]">CLOUD-ARCHITECTURE</span>
        </div>

        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/10 text-[#00BFA5] border border-[#00BFA5]/25 shadow-sm mb-4">
                <span>✦ INFRASTRUCTURE & DEVOPS</span>
            </div>

            <h1 class="font-instrumentsans text-4xl sm:text-6xl font-bold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                Cloud Architecture
                <span class="bg-gradient-to-r from-[#00BFA5] via-[#00D5B5] to-[#00E5C0] bg-clip-text text-transparent block">
                    & Resilient DevOps
                </span>
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 max-w-3xl">
                {{ $currentLocale === 'id'
                    ? 'Merancang dan mengoperasikan infrastruktur cloud skala enterprise dengan toleransi kegagalan nol, otomatisasi CI/CD, dan efisiensi biaya komputasi maksimal.'
                    : 'Architecting and operating fault-tolerant enterprise cloud environments with automated CI/CD pipelines, Kubernetes orchestration, and optimized multi-cloud efficiency.' }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-8 py-4 text-sm font-semibold">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Konsultasi Cloud Arsitektur' : 'Consult with Cloud Architect' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Audit Infrastruktur' : 'Request Infrastructure Audit' }}</span>
                    </span>
                </a>
                <a href="{{ route('case-studies') }}" class="rr-btn rr-btn-border px-7 py-4 text-sm font-medium">
                    <span class="btn-wrap">
                        <span class="text-1">View DevOps Case Studies</span>
                        <span class="text-2">Explore Real Systems</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================
     BLUEPRINT BENTO GRID (Accelerate Architecture Container)
     ======================================================================== --}}
<section class="py-16 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Bento Card 1 --}}
            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">CONTAINERIZATION</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Docker & Kubernetes Engine</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Zero-downtime rolling deployments, automated pod autoscaling, ingress load balancing, and multi-node resilience.
                </p>
            </div>

            {{-- Bento Card 2 --}}
            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">CI/CD AUTOMATION</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Zero-Downtime Migration</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Automated GitHub Actions pipelines with pre-merge linting, security audits, database migration locks, and instant rollback.
                </p>
            </div>

            {{-- Bento Card 3 --}}
            <div class="bento-card p-8 bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-white/10 shadow-lg">
                <span class="text-xs font-mono text-[#00BFA5] uppercase">HIGH AVAILABILITY</span>
                <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mt-2 mb-3">Multi-Region Disaster Recovery</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                    Automated offsite database replication, encrypted snapshots, Redis sentinel clustering, and SLA-backed recovery objectives.
                </p>
            </div>
        </div>

        {{-- Tech Stack Badges --}}
        <div class="mt-12 p-8 bento-card bg-slate-100/60 dark:bg-slate-900/40 border border-slate-200/80 dark:border-white/10">
            <span class="text-xs font-mono font-semibold uppercase text-slate-400 block mb-4">Supported Cloud Stacks</span>
            <div class="flex flex-wrap gap-3">
                @foreach(['AWS EC2 & ECS', 'Google Cloud Platform', 'DigitalOcean Kubernetes', 'Docker Swarm', 'Terraform (IaC)', 'Cloudflare Enterprise WAF', 'Nginx High-Concurrency', 'Redis Cluster'] as $stack)
                    <span class="px-3.5 py-1.5 rounded-lg text-xs font-mono font-medium bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-white/10 shadow-sm">
                        {{ $stack }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
