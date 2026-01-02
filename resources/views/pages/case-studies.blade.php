@extends('components.layout')

@section('content')
<main class="flex-grow">
<section class="relative isolate overflow-hidden bg-background-light dark:bg-background-dark px-6 py-24 sm:py-32 lg:px-8">
<div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.teal.100),white)] opacity-20 dark:opacity-5"></div>
<div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-background-light dark:bg-background-dark shadow-xl shadow-teal-600/10 ring-1 ring-teal-50 dark:ring-teal-900/20 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
<div class="mx-auto max-w-7xl text-center">
<div class="mx-auto max-w-2xl">
<div class="mb-8 flex justify-center">
<div class="relative rounded-full px-3 py-1 text-sm leading-6 text-text-secondary ring-1 ring-text-secondary/20 hover:ring-text-secondary/40">
                                Pioneering Digital Solutions <a class="font-semibold text-primary" href="/blog"><span aria-hidden="true" class="absolute inset-0"></span>Read our manifesto <span aria-hidden="true">→</span></a>
</div>
</div>
<h1 class="text-4xl font-black tracking-tight text-text-main dark:text-white sm:text-6xl">
                            Engineering the Future
                        </h1>
<p class="mt-6 text-lg leading-8 text-text-main/70 dark:text-gray-300">
                            Explore our portfolio of high-performance web applications. We blend futurism with professional minimalism to deliver digital excellence.
                        </p>
</div>
</div>
</section>
<section class="sticky top-16 z-40 border-b border-gray-100 dark:border-slate-800 bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-sm py-4">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-hide">
<button class="shrink-0 rounded-full bg-primary text-white px-5 py-2 text-sm font-medium shadow-sm transition-all hover:bg-teal-600">
                            All Industries
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            Fintech
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            Healthcare
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            Logistics
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            AI/ML
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            E-commerce
                        </button>
<button class="shrink-0 rounded-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-text-main dark:text-white px-5 py-2 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                            Blockchain
                        </button>
</div>
</div>
</section>
<section class="py-12 md:py-16">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<h3 class="text-sm font-bold uppercase tracking-wider text-text-secondary dark:text-gray-400 mb-6">Featured Project</h3>
<div class="group relative overflow-hidden rounded-2xl bg-white dark:bg-surface-dark shadow-lg transition-all hover:shadow-xl border border-gray-100 dark:border-slate-700">
<div class="flex flex-col lg:flex-row">
<div class="flex flex-1 flex-col justify-center p-8 lg:p-12 order-2 lg:order-1">
<div class="flex items-center gap-2 mb-4">
<span class="inline-flex items-center rounded-md bg-teal-50 px-2 py-1 text-xs font-medium text-teal-700 ring-1 ring-inset ring-teal-600/20">Logistics</span>
<span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Cloud Native</span>
</div>
<h2 class="text-2xl font-bold text-text-main dark:text-white sm:text-3xl mb-4">OmniScale Logistics Platform</h2>
<p class="text-text-secondary dark:text-gray-300 mb-6 leading-relaxed">
                                    We replaced legacy systems with a cloud-native microservices architecture. The result was a seamless scalability solution handling millions of transactions daily.
                                </p>
<div class="grid grid-cols-2 gap-6 mb-8 border-t border-gray-100 dark:border-slate-700 pt-6">
<div>
<p class="text-3xl font-black text-primary">300%</p>
<p class="text-sm font-medium text-text-secondary dark:text-gray-400">ROI Year 1</p>
</div>
<div>
<p class="text-3xl font-black text-primary">40%</p>
<p class="text-sm font-medium text-text-secondary dark:text-gray-400">Faster Processing</p>
</div>
</div>
<a class="inline-flex w-fit items-center gap-2 text-sm font-bold text-primary hover:text-primary-dark group-hover:gap-3 transition-all" href="/case-studies">
                                    Read Case Study <span class="material-symbols-outlined text-lg">arrow_forward</span>
</a>
</div>
<div class="relative h-64 w-full flex-1 bg-gray-100 lg:h-auto order-1 lg:order-2 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Abstract blue digital network connections representing logistics" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD_BBJw2TROZK3GRqcyuuelPoJfSIKkBYZNDV6V0ngrCnxgBiKTj7dt9xmQEuUJeYJfW0Ieu1ch3mqOPLxOdfSXj3eRG0S1cW2HUmjBRcnkoKCttavJwiAGmGHyENkixLw6Q2r8JxTQHrUsXa1NloLn6HD6S1dq3xSJF4GzwLq0kAo7_iKAKj_pzLIWBDWDOMyvAElsFyOs4BHphL-jmTbYNtPHjguNENcdUM7neqAG1GqhDeqfs4fIXml38AzN4gHhggozY2qWT58");'>
<div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent lg:bg-gradient-to-l lg:from-transparent lg:to-black/10"></div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-12 bg-white dark:bg-background-dark">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($projects as $project)
    <div class="group flex flex-col gap-4 rounded-xl p-4 transition-all hover:bg-gray-50">
        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-lg bg-gray-100">
            @if($project->image_path)
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" style='background-image: url("{{ Storage::url($project->image_path) }}");'></div>
            @else
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110 bg-slate-800 flex items-center justify-center">
                <span class="material-icons-round text-6xl text-slate-600">{{ $project->icon ?? 'image' }}</span>
            </div>
            @endif
            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors"></div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex flex-wrap gap-2">
                @if($project->technology_tags)
                    @foreach(array_slice($project->technology_tags, 0, 2) as $tag)
                        <span class="text-xs font-semibold uppercase tracking-wider text-{{ $project->color ?? 'primary' }}">{{ $tag }}</span>
                        @if(!$loop->last) <span class="text-xs text-gray-400">•</span> @endif
                    @endforeach
                @endif
            </div>
            <h3 class="text-xl font-bold text-text-main group-hover:text-primary transition-colors">{{ $project->title }}</h3>
            <p class="text-sm text-text-secondary line-clamp-2">
                {{ $project->description }}
            </p>
        </div>
    </div>
    @endforeach
</div>
<div class="mt-16 flex justify-center">
<button class="flex items-center gap-2 rounded-full border border-gray-200 dark:border-slate-700 px-6 py-3 text-sm font-semibold text-text-main dark:text-white transition-colors hover:border-primary hover:text-primary">
                            View More Projects <span class="material-symbols-outlined text-lg">expand_more</span>
</button>
</div>
</div>
</section>
<section class="relative isolate overflow-hidden bg-text-main py-16 sm:py-24 lg:py-32">
<div class="absolute inset-0 -z-10 h-full w-full object-cover opacity-20" data-alt="Abstract dark technological geometric patterns" style="background-image: radial-gradient(#14b8a7 1px, transparent 1px); background-size: 32px 32px;"></div>
<div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
<h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to accelerate your vision?</h2>
<p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-300">
                        Let's build something extraordinary together. Our team of experts is ready to take your digital product to the next level.
                    </p>
<div class="mt-10 flex items-center justify-center gap-x-6">
<a class="rounded-md bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-400 transition-all" href="/contact">
                            Get Started
                        </a>
<a class="text-sm font-semibold leading-6 text-white hover:text-primary transition-colors" href="/contact">
                            Contact Sales <span aria-hidden="true">→</span>
</a>
</div>
</div>
</section>
</main>
@endsection
