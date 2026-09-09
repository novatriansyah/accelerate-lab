@extends('frontend.components.layout')

@push('schema')
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
            "name": "Careers",
            "item": "{{ url('/careers') }}"
        }
    ]
}
</script>
@if (isset($jobs) && $jobs->count() > 0)
@foreach ($jobs as $job)
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "JobPosting",
    "title": {!! json_encode($job->title) !!},
    "description": {!! json_encode($job->description ?? ($job->title . ' at Accelerate Lab')) !!},
    "datePosted": "{{ $job->created_at?->toIso8601String() ?? now()->toIso8601String() }}",
    "employmentType": {!! json_encode(strtoupper(str_replace(' ', '_', $job->type ?? 'FULL_TIME'))) !!},
    "hiringOrganization": {
        "{{ '@' }}type": "Organization",
        "name": "Accelerate Lab",
        "sameAs": "{{ config('app.url') }}",
        "logo": "{{ asset('images/logo.webp') }}"
    },
    "jobLocation": {
        "{{ '@' }}type": "Place",
        "address": {
            "{{ '@' }}type": "PostalAddress",
            "addressLocality": {!! json_encode($job->location ?? 'Remote') !!},
            "addressCountry": "ID"
        }
    }
}
</script>
@endforeach
@endif
@endpush

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <section id="careers-hero-section" class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-32 pb-12 text-center">
            <h1
                class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] text-slate-dark dark:text-white mb-6">
                {{ __('Join Our Team') }}
            </h1>
            <p class="text-lg text-slate-medium dark:text-slate-400 font-normal leading-relaxed max-w-2xl mx-auto">
                {{ __('We are looking for passionate engineers, designers, and problem solvers to help us build the next generation of digital products.') }}
            </p>
        </section>

        <section id="open-roles-section" class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 pb-20">
            @if ($jobs->count() > 0)
                <div class="flex flex-col gap-4">
                    @foreach ($jobs as $job)
                        <div
                            class="bg-white dark:bg-white/5 border border-[#e7f3f2] dark:border-white/10 rounded-xl p-6 hover:border-primary/50 transition-colors group">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <h3
                                        class="text-xl font-bold text-slate-dark dark:text-white mb-2 group-hover:text-primary transition-colors">
                                        {{ __($job->title) }}
                                    </h3>
                                    <div class="flex items-center gap-4 text-sm text-slate-medium dark:text-slate-400">
                                        <span class="flex items-center gap-1">
                                            <x-app-icon name="apartment" class="w-4 h-4" />
                                            {{ __($job->department) }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <x-app-icon name="location_on" class="w-4 h-4" />
                                            {{ __($job->location) }}
                                        </span>
                                        <span
                                            class="px-2 py-0.5 rounded bg-slate-100 dark:bg-white/10 text-xs font-bold text-slate-600 dark:text-slate-300">
                                            {{ __($job->type) }}
                                        </span>
                                    </div>
                                </div>
                                <a href="mailto:careers@acceleratelab.io?subject=Application for {{ $job->title }}"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-slate-dark dark:bg-white text-white dark:text-slate-900 font-bold text-sm hover:opacity-90 transition-opacity">
                                    {{ __('Apply Now') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div
                    class="text-center py-12 bg-slate-50 dark:bg-white/5 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700">
                    <x-app-icon name="search_off" class="w-10 h-10 text-slate-400 mb-4" />
                    <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-2">{{ __('No Openings Currently') }}</h3>
                    <p class="text-slate-medium dark:text-slate-400">
                        {{ __('We don\'t have any active listings right now, but we\'re always happy to hear from talented people.') }}
                        <a href="mailto:careers@acceleratelab.io" class="text-primary font-bold hover:underline">{{ __('Send us your CV') }}</a>.
                    </p>
                </div>
            @endif
        </section>
    </main>
@endsection
