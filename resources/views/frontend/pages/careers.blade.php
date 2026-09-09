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
    <main class="flex-1 flex flex-col items-center w-full bg-white dark:bg-slate-950 text-slate-900 dark:text-white transition-colors duration-300">
        <section id="careers-hero-section" class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-32 pb-12 text-center">
            <h1
                class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] font-instrumentsans text-slate-900 dark:text-white mb-6">
                {{ __('Join Our Team') }}
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 font-normal leading-relaxed max-w-2xl mx-auto">
                {{ __('We are looking for passionate engineers, designers, and problem solvers to help us build the next generation of digital products.') }}
            </p>
        </section>

        <section id="open-roles-section" class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 pb-20">
            @if ($jobs->count() > 0)
                <div class="flex flex-col gap-4">
                    @foreach ($jobs as $job)
                        <div
                            class="bg-white dark:bg-slate-900/90 border border-slate-200/80 dark:border-white/10 rounded-2xl p-6 hover:border-teal-500/50 hover:shadow-lg transition-all group">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <h3
                                        class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2 group-hover:text-teal-500 transition-colors">
                                        {{ __($job->title) }}
                                    </h3>
                                    <div class="flex items-center gap-4 text-sm text-slate-600 dark:text-slate-400">
                                        <span class="flex items-center gap-1">
                                            <x-app-icon name="apartment" class="w-4 h-4" />
                                            {{ __($job->department) }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <x-app-icon name="location_on" class="w-4 h-4" />
                                            {{ __($job->location) }}
                                        </span>
                                        <span
                                            class="px-2.5 py-0.5 rounded-full bg-slate-100 dark:bg-white/10 text-xs font-bold text-slate-700 dark:text-slate-300">
                                            {{ __($job->type) }}
                                        </span>
                                    </div>
                                </div>
                                <a href="mailto:careers@acceleratelab.io?subject=Application for {{ $job->title }}"
                                    class="rr-btn !py-2.5 !px-5 !text-xs shrink-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">{{ __('Apply Now') }}</span>
                                        <span class="text-two">{{ __('Apply Now') }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div
                    class="text-center py-12 bg-slate-50/80 dark:bg-slate-900/50 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 p-8">
                    <x-app-icon name="search_off" class="w-10 h-10 text-slate-400 mb-4 mx-auto" />
                    <h3 class="text-xl font-bold font-instrumentsans text-slate-900 dark:text-white mb-2">{{ __('No Openings Currently') }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto mb-6 leading-relaxed">
                        {{ __('We don\'t have any active listings right now, but we\'re always happy to hear from talented people.') }}
                    </p>
                    <div>
                        <a href="mailto:careers@acceleratelab.io?subject=General Career Inquiry" class="rr-btn !py-2.5 !px-5 !text-xs">
                            <span class="btn-wrap">
                                <span class="text-one">{{ __('Send us your CV') }}</span>
                                <span class="text-two">{{ __('Send us your CV') }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            @endif
        </section>
    </main>
@endsection
