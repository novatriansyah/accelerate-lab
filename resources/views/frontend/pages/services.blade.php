@extends('frontend.components.layout')

@section('content')
<section class="relative w-full overflow-hidden py-12 md:py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div class="flex flex-col gap-6">
                <h1 class="text-4xl font-black leading-tight tracking-tight sm:text-5xl lg:text-6xl text-slate-dark dark:text-white">
                    Digital Innovation, <span class="text-primary">Delivered.</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-lg">
                    We transform complex business challenges into elegant, scalable software solutions. From strategy to deployment, we engineer the future of your product.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="/contact" class="flex items-center justify-center rounded-lg h-12 px-6 bg-primary text-slate-dark font-bold text-base hover:bg-teal-400 transition-colors shadow-lg shadow-primary/20">
                        Start a Project
                    </a>
                    <a href="/case-studies" class="flex items-center justify-center rounded-lg h-12 px-6 bg-transparent border border-gray-300 dark:border-gray-700 text-slate-dark dark:text-white font-bold text-base hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        View Case Studies
                    </a>
                </div>
            </div>
            <div class="relative w-full aspect-square lg:aspect-auto lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
                <div class="absolute inset-0 bg-cover bg-center" data-alt="Abstract 3D geometric shapes in teal and dark grey lighting" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCvySTrtvvgD4OohUjm5pfRf9-rE1nr_6Bhpg0Jf6lEyqGl_fAC0rMBFGLw0VWP5VJ9lMKd44LD4bYpigmZmv5SaqWmZk0zxcvbwYVDwuX7UhWA7amTvLTtKKN89ahm1SRt2nXu3v2pC2GLfO2HzrnxEt2AyYwRsilqN6BBuoXvdfeMSLX-BrR2v69EG9O9mJwNYNiuRu1QjOzlsBQeaVuE8hIl4uCTYaBZM56Cdi_JVMcvkU_fyQ-bfVG65pZ97QeYX5mgdCePKn8');"></div>
                <div class="absolute inset-0 bg-primary/10 mix-blend-overlay"></div>
            </div>
        </div>
    </div>
</section>

<div class="sticky top-16 z-40 w-full bg-background-light/95 dark:bg-background-dark/95 border-b border-[#d0e7e4] dark:border-gray-800 backdrop-blur-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex gap-8 overflow-x-auto no-scrollbar">
            <a class="group flex flex-col items-center justify-center border-b-[3px] border-b-primary pb-3 pt-4 px-2" href="#strategy">
                <p class="text-slate-dark dark:text-white text-sm font-bold tracking-[0.015em]">Product Strategy</p>
            </a>
            <a class="group flex flex-col items-center justify-center border-b-[3px] border-b-transparent hover:border-b-primary/50 pb-3 pt-4 px-2 transition-colors" href="#development">
                <p class="text-[#4e9790] group-hover:text-primary dark:text-gray-400 dark:group-hover:text-white text-sm font-bold tracking-[0.015em]">Custom Development</p>
            </a>
        </div>
    </div>
</div>

<section class="py-16 md:py-24" id="strategy">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2 mb-12">
            <span class="text-primary font-bold uppercase tracking-wider text-sm">Discover & Define</span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-dark dark:text-white">{{ $strategyService->title ?? 'Product Strategy' }}</h2>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
            <div class="flex flex-col gap-6">
                <h3 class="text-2xl font-bold text-slate-dark dark:text-white">{{ $strategyService->headline ?? 'Turning Chaos into Order' }}</h3>
                <div class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed prose prose-slate dark:prose-invert max-w-none">
                     @if($strategyService)
                        {!! $strategyService->content !!}
                     @else
                        Our strategy phase lays the foundation for success. We align business goals with user needs to define a clear roadmap. We don't just build what you ask for; we build what your users actually need.
                     @endif
                </div>
                
                @if(isset($strategyService->benefits) && count($strategyService->benefits) > 0)
                <ul class="flex flex-col gap-4 mt-2">
                    @foreach($strategyService->benefits as $benefit)
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-slate-dark dark:text-gray-200">{{ $benefit }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <!-- Fallback benefits if none provided -->
                <ul class="flex flex-col gap-4 mt-2">
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-slate-dark dark:text-gray-200">Data-driven decision making</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-slate-dark dark:text-gray-200">Clear roadmap & MVP definition</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">check_circle</span>
                        <span class="text-slate-dark dark:text-gray-200">User-centric design focus</span>
                    </li>
                </ul>
                @endif
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @if(isset($strategyService->features) && count($strategyService->features) > 0)
                    @foreach($strategyService->features as $feature)
                    <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                        <span class="material-symbols-outlined text-primary text-3xl">{{ $feature['icon'] ?? 'star' }}</span>
                        <div>
                            <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">{{ $feature['title'] }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Fallback features -->
                    <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                        <span class="material-symbols-outlined text-primary text-3xl">lightbulb</span>
                        <div>
                            <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">Discovery Workshops</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Collaborative sessions to define core problems and solutions.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                        <span class="material-symbols-outlined text-primary text-3xl">analytics</span>
                        <div>
                            <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">Market Research</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">In-depth analysis of competitors and target demographics.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-100 dark:bg-gray-900 py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-slate-dark dark:text-white mb-4">Our Methodology</h2>
            <p class="text-gray-600 dark:text-gray-400">An agile process refined over dozens of successful product launches.</p>
        </div>
        <div class="relative">
            <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-300 dark:bg-gray-700 -translate-y-1/2 z-0"></div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-full bg-white dark:bg-gray-800 border-4 border-primary flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-primary text-2xl">search</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-2">1. Define</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Scoping requirements and setting KPIs.</p>
                </div>
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-full bg-white dark:bg-gray-800 border-4 border-primary flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-primary text-2xl">design_services</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-2">2. Design</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Prototyping and high-fidelity visuals.</p>
                </div>
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-full bg-white dark:bg-gray-800 border-4 border-primary flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-primary text-2xl">code</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-2">3. Develop</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Iterative coding sprints and QA testing.</p>
                </div>
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 rounded-full bg-white dark:bg-gray-800 border-4 border-primary flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-primary text-2xl">rocket_launch</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-dark dark:text-white mb-2">4. Deploy</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Launch, monitor, and scale.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24" id="development">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2 mb-12">
            <span class="text-primary font-bold uppercase tracking-wider text-sm">Build & Scale</span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-dark dark:text-white">Custom Development</h2>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div class="order-2 lg:order-1 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @if(isset($developmentServices) && $developmentServices->count() > 0)
                @foreach($developmentServices as $service)
                <a href="{{ route('service', $service) }}" class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300 group">
                    <span class="material-symbols-outlined text-primary text-3xl group-hover:scale-110 transition-transform">{{ $service->icon ?? 'layers' }}</span>
                    <div>
                        <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1 group-hover:text-primary transition-colors">{{ $service->title }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">{{ $service->short_description ?? Str::limit(strip_tags($service->content), 80) }}</p>
                    </div>
                </a>
                @endforeach
                @else
                <!-- Fallback Development Services -->
                <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                    <span class="material-symbols-outlined text-primary text-3xl">devices</span>
                    <div>
                    <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">Web Applications</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Scalable, responsive web apps using modern frameworks.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                    <span class="material-symbols-outlined text-primary text-3xl">smartphone</span>
                    <div>
                    <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">Mobile Development</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Native and cross-platform solutions for iOS and Android.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                    <span class="material-symbols-outlined text-primary text-3xl">api</span>
                    <div>
                    <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">API Integration</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Seamless connection between your services and third-party tools.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-[#d0e7e4] dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 hover:shadow-lg transition-shadow duration-300">
                    <span class="material-symbols-outlined text-primary text-3xl">cloud_sync</span>
                    <div>
                    <h4 class="text-lg font-bold text-slate-dark dark:text-white mb-1">Cloud Infrastructure</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Robust backend architecture on AWS, Azure, or Google Cloud.</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="order-1 lg:order-2 flex flex-col gap-6 lg:sticky lg:top-32">
                <h3 class="text-2xl font-bold text-slate-dark dark:text-white">Engineering for Growth</h3>
                <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed">
                    We don't just write code; we architect solutions that scale with your business. Our engineering team utilizes the latest technologies to ensure your product is fast, secure, and ready for the future.
                </p>
                <div class="p-6 bg-slate-100 dark:bg-gray-800/50 rounded-lg border border-slate-200 dark:border-gray-700">
                    <h4 class="font-bold text-slate-dark dark:text-white mb-4">Tech Stack Highlights</h4>
                    <div class="flex flex-wrap gap-2">
                        @if(isset($techStack) && $techStack->count() > 0)
                            @foreach($techStack as $tech)
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">
                                {{ $tech }}
                            </span>
                            @endforeach
                        @else
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">React</span>
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">Node.js</span>
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">Python</span>
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">TypeScript</span>
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">PostgreSQL</span>
                            <span class="px-3 py-1 bg-white dark:bg-gray-800 rounded-full text-xs font-bold text-slate-dark dark:text-gray-300 border border-slate-200 dark:border-gray-600">AWS</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-[#e7f3f2] dark:border-gray-800 bg-white dark:bg-background-dark py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x-0 md:divide-x divide-slate-100 dark:divide-gray-800">
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-black text-primary mb-2">50+</div>
                <div class="text-sm font-medium text-slate-dark dark:text-gray-400">Products Launched</div>
            </div>
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-black text-primary mb-2">99%</div>
                <div class="text-sm font-medium text-slate-dark dark:text-gray-400">Client Retention</div>
            </div>
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-black text-primary mb-2">2x</div>
                <div class="text-sm font-medium text-slate-dark dark:text-gray-400">Faster Delivery</div>
            </div>
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-black text-primary mb-2">24/7</div>
                <div class="text-sm font-medium text-slate-dark dark:text-gray-400">Support & Monitoring</div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-50 dark:bg-[#0b1615]">
    <div class="mx-auto max-w-4xl px-4 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-slate-dark dark:text-white mb-6">Ready to accelerate your growth?</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto">
            Whether you need a full product team or expert consultation, we are here to help you build the future.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact" class="flex items-center justify-center rounded-lg h-14 px-8 bg-primary text-slate-dark text-lg font-bold hover:bg-teal-400 transition-colors shadow-xl shadow-primary/20">
                Schedule a Consultation
            </a>
            <a href="/contact" class="flex items-center justify-center rounded-lg h-14 px-8 bg-white dark:bg-gray-800 text-slate-dark dark:text-white border border-gray-200 dark:border-gray-700 text-lg font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection

