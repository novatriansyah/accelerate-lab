@extends('frontend.components.layout')

@push('schema')
<script type="application/ld+json">
{
    "{{ '@' }}context": "https://schema.org",
    "{{ '@' }}type": "Service",
    "name": {!! json_encode($service->title ?? 'UI/UX Design & Design Systems') !!},
    "serviceType": {!! json_encode($service->category ?? 'Design & Prototyping') !!},
    "description": {!! json_encode($service->short_description ?? 'Human-centric UI/UX design, wireframing, design systems, and rapid interactive prototypes.') !!},
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
            "name": {!! json_encode($service->title ?? 'UI/UX Design') !!},
            "item": "{{ url('/services/' . ($service->slug ?? 'ui-ux-design')) }}"
        }
    ]
}
</script>
@endpush

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <!-- Hero Section -->
        <section id="service-hero-section" class="relative w-full overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 bg-grid-pattern">
            <div class="absolute inset-0 bg-white/80 dark:bg-[#090D16]/90 pointer-events-none"></div>
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                    <div class="flex flex-col gap-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/20 w-fit">
                            <span class="size-2 rounded-full bg-teal-500 animate-pulse"></span>
                            <span class="text-xs font-semibold uppercase tracking-wide text-teal-600 dark:text-teal-400">{{ __('UI/UX Design') }}</span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-instrumentsans tracking-tight text-slate-900 dark:text-white leading-tight">
                            {{ __('Designing Digital Experiences that Convert') }}
                        </h1>
                        <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                            {{ __('We blend data-driven research with pixel-perfect aesthetics to build products users love. Transform your complex ideas into intuitive interfaces.') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 pt-2">
                            <a href="/contact" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">{{ __('Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                                    <span class="text-two">{{ __('Estimate Your Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                                </span>
                            </a>
                            <a href="/case-studies" class="rr-btn btn-border">
                                <span class="btn-wrap">
                                    <span class="text-one">{{ __('Case Studies') }}</span>
                                    <span class="text-two">{{ __('Case Studies') }}</span>
                                </span>
                            </a>
                        </div>
                        <div class="flex items-center gap-4 pt-4 opacity-70">
                            <div class="flex -space-x-3">
                                <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-slate-200 bg-cover bg-center"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBsBUIyokF1ew_o5gs-mh-elD3CHIkpk-kqUUhATzB4c6o2B297MLt09Jxmt8Ka-sQncynTEIcD0cG3XL72hGdHnROfd9JEskHxFUxwc0nANJj7T_I88bB0Z-weLSbnp2gNPhwkAAG7WE5vtP24JmffknpxQsgaAEiCEw9mzjSxaTDBqB_cEblhqhHg7wZgODUXnvc77q3VaNOTTVLJ-YcNfgsPI9sWT7IsaPw4CcK2-frpKr1vISLrwLcN6vrLCs_8OWskFFcvZu8");'>
                                </div>
                                <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-slate-200 bg-cover bg-center"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHjOS51i6pG3OxytpzGyI7rVpCoLJ5RbM5rlGt96PjbmizdrFq0gkZuOtzP5knG3K_GpSn_way4rTdlOVVyce4PSmKP7_M-9xXzw5j02WNxQjIT0gCl2IV1Y8WNdbucWMbEM2bQEa2LG86Nf4RnRBNY6bnlYdy36UpERpxn0HL4L9cWDjCv_OB5pxe4OVANgoUhq1ghgv_qaPyBs3BPLkB7n4rvqDPixDVKFIGh7N1qz7PA3E8G1PbYKgvqnw2KHTTPWi-i9XsPdY");'>
                                </div>
                                <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-900 bg-slate-200 bg-cover bg-center"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDR9Gppdxa7IXiezhocp4SgtR8OhckBMi5y7kwASKrjXSY8qW7J-T7R5u-p1I9WbSvTQyBa23eLYm1TDBPlUZQBKmEkFz7y7A8ugUCE1tp_c_fSUfSCvO3Um0vqmkZ-kh6b8i_MJJdUDBEIaZbsvO0DgEglaqEVSkQzO_t7UkarITzCRvypL98BFp_Q5JzcBFnzTWj7SJMfsjvl5E1RPbBprB0AVUEc0lvxA9fodAWbnqCIgrX6hYxx9gguSxFc1_D4WtTB5Gm76Xc");'>
                                </div>
                            </div>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-300">Trusted by 100+ innovators</p>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-gradient-to-r from-teal-500 to-cyan-400 rounded-2xl blur-2xl opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                        <div class="relative w-full aspect-[4/3] bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-white/10 shadow-2xl overflow-hidden">
                            @if ($service->hero_image)
                                <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 bg-cover bg-center"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCFQZzmzeLMH89ZmaEBLnQ8ToEms7v4TMy1JcKuWv7uZR_oOlVltFXtULqyZMCuGVNlV11kHWOa8s6SdN4gO6TfdYQJy31F0HZFUhlmZGQ2tosOf0GoyT4fyKjV-hD0gMhWjP9DdRfqcVo8BKHA15OIi4GuYcg5kETO8WJv60XabNk3eFCm1kXHTMnia9REUBx_oMJdMM_Jk3NcwHlhNMCdN1vE4RX89xJOqQ6aOWsb9X1v2DbkdJBnUvY_34xmUHWRA6QmULXi7_k");'>
                                </div>
                                <div class="absolute bottom-8 left-8 right-8 bg-white/90 dark:bg-slate-900/90 backdrop-blur p-4 rounded-xl shadow-lg border border-slate-200/80 dark:border-white/10">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="size-8 rounded-full bg-teal-500 flex items-center justify-center text-white">
                                            <x-app-icon name="analytics" class="w-4 h-4 text-white" />
                                        </div>
                                        <div>
                                            <div class="h-2 w-24 bg-slate-200 dark:bg-slate-700 rounded mb-1"></div>
                                            <div class="h-2 w-16 bg-slate-200 dark:bg-slate-700 rounded"></div>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <div class="h-16 flex-1 bg-slate-100 dark:bg-slate-800 rounded"></div>
                                        <div class="h-16 flex-1 bg-slate-100 dark:bg-slate-800 rounded"></div>
                                        <div class="h-16 flex-1 bg-teal-500/10 rounded border border-teal-500/20"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Arsenal Bar -->
        <section class="w-full bg-white dark:bg-[#090D16] py-10 border-y border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-8">{{ __('Our Design & Prototyping Arsenal') }}</p>
                <div class="flex flex-wrap justify-center items-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-600 dark:text-slate-400"><x-app-icon name="design_services" class="w-5 h-5" /> Figma</div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-600 dark:text-slate-400"><x-app-icon name="diamond" class="w-5 h-5" /> Sketch</div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-600 dark:text-slate-400"><x-app-icon name="layers" class="w-5 h-5" /> Adobe XD</div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-600 dark:text-slate-400"><x-app-icon name="bolt" class="w-5 h-5" /> Framer</div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-600 dark:text-slate-400"><x-app-icon name="draw" class="w-5 h-5" /> Illustrator</div>
                </div>
            </div>
        </section>

        <!-- Philosophy Section -->
        <section class="w-full py-20 bg-slate-50/60 dark:bg-[#090D16]/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <div class="flex flex-col gap-6 lg:w-1/3 sticky top-24">
                        <div class="flex flex-col gap-4">
                            <h2 class="text-teal-600 dark:text-teal-400 text-sm font-bold uppercase tracking-widest">{{ __('Our Philosophy') }}</h2>
                            <h3 class="text-slate-900 dark:text-white font-instrumentsans tracking-tight text-3xl font-bold leading-tight md:text-4xl">
                                {{ __('Design with Purpose') }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed">
                                {{ __('We believe in design that serves a function beyond aesthetics. Every pixel is placed with intent, grounded in user needs and business goals.') }}
                            </p>
                        </div>
                        <a href="/about" class="flex w-fit items-center gap-2 text-teal-600 dark:text-teal-400 font-bold hover:underline group">
                            <span>{{ __('Learn about our values') }}</span>
                            <x-app-icon name="arrow_forward" class="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:w-2/3">
                        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 shadow-sm hover:shadow-md transition-shadow">
                            <div class="size-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-2">
                                <x-app-icon name="person_search" class="w-6 h-6" />
                            </div>
                            <h4 class="text-slate-900 dark:text-white font-instrumentsans text-lg font-bold leading-tight">{{ __('User-Centric Design') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Putting the user at the center of every decision to ensure intuitive experiences that solve real problems.') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 shadow-sm hover:shadow-md transition-shadow">
                            <div class="size-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-2">
                                <x-app-icon name="accessibility_new" class="w-6 h-6" />
                            </div>
                            <h4 class="text-slate-900 dark:text-white font-instrumentsans text-lg font-bold leading-tight">{{ __('Accessibility First') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Ensuring our digital products are usable by everyone, regardless of ability, following WCAG guidelines.') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 shadow-sm hover:shadow-md transition-shadow">
                            <div class="size-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-2">
                                <x-app-icon name="bar_chart" class="w-6 h-6" />
                            </div>
                            <h4 class="text-slate-900 dark:text-white font-instrumentsans text-lg font-bold leading-tight">{{ __('Data-Driven Decisions') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('We validate every design choice with real user data, analytics, and testing frameworks.') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200/80 dark:border-white/10 bg-white dark:bg-slate-900/80 p-6 shadow-sm hover:shadow-md transition-shadow">
                            <div class="size-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 dark:text-teal-400 mb-2">
                                <x-app-icon name="devices" class="w-6 h-6" />
                            </div>
                            <h4 class="text-slate-900 dark:text-white font-instrumentsans text-lg font-bold leading-tight">{{ __('Scalable Systems') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                {{ __('Creating atomic design systems that allow your product to scale consistently across all platforms.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="w-full py-20 bg-white dark:bg-[#090D16] border-t border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-teal-600 dark:text-teal-400 text-sm font-bold uppercase tracking-widest mb-3">{{ __('Methodology') }}</h2>
                    <h3 class="text-slate-900 dark:text-white text-3xl md:text-4xl font-black font-instrumentsans leading-tight mb-4">
                        {{ __('The Design Process') }}
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400">
                        {{ __('From chaos to clarity. Our proven 4-step framework ensures we solve the right problems with the right solutions.') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="p-6 rounded-2xl bg-slate-50/60 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="text-teal-600 dark:text-teal-400 mb-4">
                            <x-app-icon name="search" class="w-8 h-8" />
                        </div>
                        <h4 class="text-slate-900 dark:text-white font-instrumentsans text-xl font-bold mb-2">{{ __('1. Discover') }}</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Deep dive into user research, stakeholder interviews, and competitive analysis.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-slate-50/60 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="text-teal-600 dark:text-teal-400 mb-4">
                            <x-app-icon name="edit_note" class="w-8 h-8" />
                        </div>
                        <h4 class="text-slate-900 dark:text-white font-instrumentsans text-xl font-bold mb-2">{{ __('2. Define') }}</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Structuring the blueprint with information architecture and low-fidelity wireframing.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-slate-50/60 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="text-teal-600 dark:text-teal-400 mb-4">
                            <x-app-icon name="brush" class="w-8 h-8" />
                        </div>
                        <h4 class="text-slate-900 dark:text-white font-instrumentsans text-xl font-bold mb-2">{{ __('3. Design') }}</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Crafting high-fidelity UI, interactions, and prototypes with pixel perfection.') }}</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-slate-50/60 dark:bg-slate-900/80 border border-slate-200/80 dark:border-white/10 shadow-sm">
                        <div class="text-teal-600 dark:text-teal-400 mb-4">
                            <x-app-icon name="rocket_launch" class="w-8 h-8" />
                        </div>
                        <h4 class="text-slate-900 dark:text-white font-instrumentsans text-xl font-bold mb-2">{{ __('4. Deliver') }}</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ __('Creating comprehensive design systems and specifications for seamless handoff.') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Calculator Section -->
        <section class="w-full py-20 bg-slate-50/60 dark:bg-[#090D16]/50 border-t border-slate-200/80 dark:border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-teal-600 dark:text-teal-400 text-sm font-bold uppercase tracking-widest mb-2">{{ __('Impact') }}</h2>
                        <h3 class="text-slate-900 dark:text-white text-3xl sm:text-4xl font-black font-instrumentsans mb-4">
                            {{ __('Good Design is Good Business') }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">
                            {{ __('Investing in UX isn\'t just about making things look pretty. It\'s about reducing churn, increasing conversion, and boosting customer satisfaction.') }}
                        </p>
                        <div class="flex gap-8">
                            <div>
                                <p class="text-3xl font-black font-instrumentsans text-slate-900 dark:text-white">400%</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Possible ROI on UX') }}</p>
                            </div>
                            <div>
                                <p class="text-3xl font-black font-instrumentsans text-slate-900 dark:text-white">50ms</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400">{{ __('Time to make a first impression') }}</p>
                            </div>
                        </div>
                    </div>
                    <div x-data="{
                        visitors: 50000,
                        conversion: 25,
                        get projectedRevenue() {
                            const calculated = Math.round(this.visitors * (this.conversion / 100) * 10);
                            return '$' + calculated.toLocaleString('en-US');
                        }
                    }"
                        class="bg-white dark:bg-slate-900/90 p-8 rounded-2xl shadow-xl border border-slate-200/80 dark:border-white/10">
                        <h4 class="text-lg font-bold font-instrumentsans text-slate-900 dark:text-white mb-6">{{ __('Estimate your potential growth') }}</h4>
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-300">{{ __('Current Monthly Visitors') }}</label>
                                <span class="text-sm font-bold text-teal-600 dark:text-teal-400" x-text="Number(visitors).toLocaleString('en-US')">50,000</span>
                            </div>
                            <input x-model.number="visitors" class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-teal-500"
                                max="100000" min="1000" step="1000" type="range" value="50000" />
                        </div>
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-300">{{ __('Conversion Increase Target') }}</label>
                                <span class="text-sm font-bold text-teal-600 dark:text-teal-400" x-text="conversion + '%'">25%</span>
                            </div>
                            <input x-model.number="conversion" class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-teal-500"
                                max="50" min="1" step="1" type="range" value="25" />
                        </div>
                        <div class="bg-teal-500/10 rounded-xl p-4 flex items-center justify-between border border-teal-500/20">
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold">{{ __('Projected Annual Revenue Increase') }}</p>
                                <p class="text-2xl font-black font-instrumentsans text-teal-600 dark:text-teal-400" x-text="projectedRevenue">$125,000</p>
                            </div>
                            <x-app-icon name="trending_up" class="w-8 h-8 text-teal-600 dark:text-teal-400" />
                        </div>
                        <p class="text-xs text-slate-400 mt-2 text-center">{{ __('*Estimates based on industry standards') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="w-full py-20 bg-teal-600 dark:bg-slate-900 text-center relative overflow-hidden">
            <div class="max-w-4xl mx-auto px-4 flex flex-col items-center gap-8">
                <h2 class="text-white text-4xl md:text-5xl font-black font-instrumentsans tracking-tight">
                    {{ __('Ready to transform your interface?') }}
                </h2>
                <p class="text-teal-100 max-w-xl text-lg">
                    {{ __('Let\'s build a product that your users will love and your competitors will envy. The future of your digital presence starts here.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
                    <a href="/contact" class="rr-btn !bg-white !text-slate-900 hover:!text-white border-0 shadow-xl">
                        <span class="btn-wrap">
                            <span class="text-one">{{ __('Start a Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                            <span class="text-two">{{ __('Start a Project') }} <x-app-icon name="arrow_forward" class="w-4 h-4 inline" /></span>
                        </span>
                    </a>
                    <button type="button" @click="$dispatch('open-consultation-modal')" class="rr-btn btn-border !text-white !border-white/30 hover:!bg-white hover:!text-slate-900">
                        <span class="btn-wrap">
                            <span class="text-one">{{ __('Schedule Consultation') }}</span>
                            <span class="text-two">{{ __('Schedule Consultation') }}</span>
                        </span>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection
