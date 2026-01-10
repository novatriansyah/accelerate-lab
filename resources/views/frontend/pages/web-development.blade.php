@extends('frontend.components.layout')

@section('content')
    <main class="flex-grow">
        <section class="relative px-4 py-12 md:py-20 lg:py-28 max-w-7xl mx-auto w-full">
            <div class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl opacity-50">
            </div>
            <div class="flex flex-col gap-10 md:flex-row md:items-center">
                <div class="flex flex-col gap-6 md:w-1/2 lg:pr-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-border-light w-fit">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-xs font-semibold uppercase tracking-wider text-text-secondary">Web
                            Development</span>
                    </div>
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] tracking-tight text-text-main dark:text-white">
                        High-Performance <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-emerald-600">Web
                            Applications</span> for the Future
                    </h1>
                    <p class="text-lg text-text-secondary dark:text-gray-300 max-w-lg leading-relaxed">
                        Scalable, secure, and lightning-fast web solutions tailored for your business growth. We build
                        digital products that accelerate your success using cutting-edge architecture.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <a href="/contact"
                            class="flex items-center justify-center h-12 px-6 rounded-lg bg-primary hover:bg-primary-dark text-white text-base font-bold transition-all shadow-lg shadow-primary/20 group">
                            Start Your Project
                            <span
                                class="material-symbols-outlined ml-2 text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                        <a href="/case-studies"
                            class="flex items-center justify-center h-12 px-6 rounded-lg border border-border-medium dark:border-slate-700 bg-transparent hover:bg-border-light dark:hover:bg-slate-800 text-text-main dark:text-white text-base font-semibold transition-colors">
                            View Case Studies
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative mt-8 md:mt-0">
                    <div
                        class="relative w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white border border-border-light shadow-2xl">
                        @if ($service->hero_image)
                            <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <!-- Fallback Abstract Art -->
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center text-border-medium"
                                data-alt="Abstract 3D illustration">
                                <div
                                    class="w-3/4 h-3/4 grid grid-cols-6 grid-rows-6 gap-2 opacity-50 rotate-[-12deg] scale-110">
                                    <div class="col-span-2 row-span-2 bg-primary/10 rounded-lg"></div>
                                    <div class="col-span-1 row-span-1 bg-primary/20 rounded-lg"></div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 rounded-lg"></div>
                                    <div class="col-span-1 row-span-3 bg-primary/30 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-slate-300 rounded-lg"></div>
                                    <div class="col-span-2 row-span-2 bg-primary/20 rounded-lg col-start-4 row-start-3">
                                    </div>
                                    <div class="col-span-3 row-span-1 bg-slate-200 rounded-lg col-start-2 row-start-5">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="border-y border-border-light dark:border-slate-800 bg-white dark:bg-surface-dark py-10">
            <div class="max-w-7xl mx-auto px-4 md:px-10">
                <p
                    class="text-center text-sm font-semibold text-text-secondary dark:text-gray-400 uppercase tracking-widest mb-8">
                    Powered by Modern Technologies</p>
                <div
                    class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale transition-all duration-500 hover:grayscale-0">
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">code_blocks</span> React
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">dns</span> Node.js
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">cloud</span> AWS
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">terminal</span> Python
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">database</span> PostgreSQL
                    </div>
                    <div class="flex items-center gap-2 font-bold text-xl text-slate-700 dark:text-gray-200">
                        <span class="material-symbols-outlined text-3xl">layers</span> Next.js
                    </div>
                </div>
            </div>
        </section>
        <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 md:px-10">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-4 max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-black leading-tight text-text-main dark:text-white">
                        Why Choose Accelerate Lab?
                    </h2>
                    <p class="text-text-secondary dark:text-gray-300 text-lg">
                        We combine engineering excellence with modern design principles to deliver products that stand out.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">bolt</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">Lightning Speed</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                Optimized specifically for Core Web Vitals and performance metrics that matter to your users
                                and SEO rankings.
                            </p>
                        </div>
                    </div>
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">verified_user</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">Bank-Grade Security</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                Enterprise-level security protocols, encryption, and compliance standards (GDPR, SOC2)
                                built-in from day one.
                            </p>
                        </div>
                    </div>
                    <div
                        class="group flex flex-col gap-4 rounded-xl border border-border-medium dark:border-slate-700 bg-white dark:bg-surface-dark p-6 transition-all hover:shadow-lg hover:border-primary/30">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-2xl">trending_up</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-text-main dark:text-white mb-2">Infinite Scalability</h3>
                            <p class="text-text-secondary dark:text-gray-400 text-sm leading-relaxed">
                                Cloud-native architectures designed to grow with your business, handling millions of
                                requests without breaking a sweat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white dark:bg-surface-dark py-16 md:py-24 border-y border-border-light dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 md:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold text-text-main dark:text-white mb-4">Our Expertise</h2>
                            <p class="text-text-secondary dark:text-gray-300">Comprehensive development services covering
                                every layer of the stack.</p>
                        </div>
                        <div class="flex flex-col gap-3">
                            <details
                                class="group rounded-lg border border-border-medium dark:border-slate-700 bg-background-light dark:bg-slate-900/50 open:bg-white dark:open:bg-slate-800 open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">html</span>
                                        <p class="text-text-main dark:text-white text-sm font-bold">Frontend Development</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-text-main dark:text-white transition-transform group-open:rotate-180">expand_more</span>
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary dark:text-gray-300 text-sm leading-relaxed">
                                        We craft responsive, interactive, and pixel-perfect user interfaces using React,
                                        Vue, and Angular. We focus on accessibility and fluid animations.
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium bg-background-light open:bg-white open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">storage</span>
                                        <p class="text-text-main text-sm font-bold">Backend Architecture</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-text-main transition-transform group-open:rotate-180">expand_more</span>
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary text-sm leading-relaxed">
                                        Robust server-side logic using Node.js, Python, or Go. We design efficient databases
                                        and microservices that power your business logic.
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium bg-background-light open:bg-white open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">api</span>
                                        <p class="text-text-main text-sm font-bold">API Integration &amp; Development</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-text-main transition-transform group-open:rotate-180">expand_more</span>
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary text-sm leading-relaxed">
                                        Seamless connections between your systems. We build RESTful and GraphQL APIs that
                                        are well-documented and secure.
                                    </p>
                                </div>
                            </details>
                            <details
                                class="group rounded-lg border border-border-medium bg-background-light open:bg-white open:shadow-sm">
                                <summary class="flex cursor-pointer items-center justify-between gap-6 p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary">cloud_queue</span>
                                        <p class="text-text-main text-sm font-bold">Cloud Solutions (AWS/Azure)</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-text-main transition-transform group-open:rotate-180">expand_more</span>
                                </summary>
                                <div class="px-4 pb-4 pl-[3.25rem]">
                                    <p class="text-text-secondary text-sm leading-relaxed">
                                        Cloud-native deployment, serverless computing, and containerization using Docker and
                                        Kubernetes for maximum uptime.
                                    </p>
                                </div>
                            </details>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div>
                            <h2 class="text-3xl font-bold text-text-main mb-4">How We Build</h2>
                            <p class="text-text-secondary">A transparent, agile process from concept to deployment.</p>
                        </div>
                        <div class="relative pl-4 border-l border-border-medium space-y-8">
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-primary ring-4 ring-white"></span>
                                <h3 class="text-lg font-bold text-text-main">Discovery &amp; Strategy</h3>
                                <p class="mt-1 text-sm text-text-secondary">We dive deep into your business goals, user
                                    needs, and technical requirements to create a roadmap.</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium ring-4 ring-white"></span>
                                <h3 class="text-lg font-bold text-text-main">Design &amp; Prototyping</h3>
                                <p class="mt-1 text-sm text-text-secondary">Creating high-fidelity wireframes and
                                    interactive prototypes to visualize the end product.</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium ring-4 ring-white"></span>
                                <h3 class="text-lg font-bold text-text-main">Agile Development</h3>
                                <p class="mt-1 text-sm text-text-secondary">Iterative coding sprints with regular updates,
                                    ensuring we build exactly what you need.</p>
                            </div>
                            <div class="relative pl-8">
                                <span
                                    class="absolute -left-[21px] top-1 h-2.5 w-2.5 rounded-full bg-border-medium ring-4 ring-white"></span>
                                <h3 class="text-lg font-bold text-text-main">Launch &amp; Scale</h3>
                                <p class="mt-1 text-sm text-text-secondary">Rigorous testing, deployment to production, and
                                    ongoing support for future growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 md:px-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-black text-text-main mb-4">Selected Work</h2>
                    <p class="text-text-secondary text-lg">See how we help industry leaders transform their digital
                        presence.</p>
                </div>
                <a class="text-primary font-bold hover:text-primary-dark inline-flex items-center gap-1 group"
                    href="/case-studies">
                    View all projects <span
                        class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="group cursor-pointer flex flex-col gap-4">
                    <div class="w-full aspect-video rounded-xl overflow-hidden bg-border-light relative">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                            data-alt="Modern fintech dashboard interface screenshot showing graphs and financial data"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB95VzzHJTpQ74P4aEkEtZF7y08iKWC9m3_ekcKd3VjBWXUdOiahEWYn9KmnovwvzdrV0XIER5YTRMgj3FRNzK_6ZFwNtNxuBwKDM4SNDPq5BPlT_rkDM3Oy330eNz8VJEztnbAZPhxo0llLLhCvgHAkwh9yUAbv7GRpyhAwILfE3XVTjzTEa7j1nR4udy01JSuAVPJ-UcF2oOrtO7zO3Cf9ELMhoroJDn_On86eHMPpSnbNGqw1JgdPAjRVzcF-FzySdtJgvjVpEM");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <span
                                class="px-2 py-1 bg-background-surface border border-border-medium rounded text-xs font-semibold text-text-secondary">FinTech</span>
                            <span
                                class="px-2 py-1 bg-background-surface border border-border-medium rounded text-xs font-semibold text-text-secondary">React</span>
                        </div>
                        <h3 class="text-xl font-bold text-text-main group-hover:text-primary transition-colors">Nova
                            Financial Platform</h3>
                        <p class="text-sm text-text-secondary line-clamp-2">Reimagining the investment experience with a
                            high-speed, real-time trading dashboard handling millions of transactions.</p>
                    </div>
                </div>
                <div class="group cursor-pointer flex flex-col gap-4">
                    <div class="w-full aspect-video rounded-xl overflow-hidden bg-border-light relative">
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                            data-alt="SaaS analytics platform interface screenshot showcasing data visualization widgets"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD0_DrP2wx_9cY2Df8grTID9Hj2MkoGuCG2l1hlglVMZwhCLNnUDkX5VSjD1IA8LAZSRmrkuHv1uX1qk24Nn1NFIZzfYwKnT3ifVemh2EuU9g2wzH9OXvWqEP-Ub5Hc0AgqZKyx9Cx3HFer71pMrAxouYSWYMVuOvm-n0SAtMw0Bmnjh8LchfnjQuemyzBOoCpe-hJFNxLTAs4u9uFJ9NvC-p4xhyxlA9oMgnwwrAG3ltN_FuZpYKJiY4GlTvuXgypBjC8NyXkXilQ");'>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <span
                                class="px-2 py-1 bg-background-surface border border-border-medium rounded text-xs font-semibold text-text-secondary">SaaS</span>
                            <span
                                class="px-2 py-1 bg-background-surface border border-border-medium rounded text-xs font-semibold text-text-secondary">Python</span>
                        </div>
                        <h3 class="text-xl font-bold text-text-main group-hover:text-primary transition-colors">Orbital
                            Analytics</h3>
                        <p class="text-sm text-text-secondary line-clamp-2">A scalable data analytics tool for enterprise
                            marketing teams, featuring automated reporting and AI insights.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="px-4 pb-12 md:pb-24 max-w-7xl mx-auto w-full">
            <div class="bg-primary rounded-2xl p-10 md:p-20 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                    <div class="absolute right-[-100px] top-[-100px] w-[300px] h-[300px] rounded-full bg-white blur-3xl">
                    </div>
                    <div class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] rounded-full bg-black blur-3xl">
                    </div>
                </div>
                <div class="relative z-10 flex flex-col items-center gap-6 max-w-2xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-black text-white leading-tight">Ready to Accelerate Your Digital
                        Growth?</h2>
                    <p class="text-white/90 text-lg">Let's build something extraordinary together. Schedule a free
                        consultation with our engineering team.</p>
                    <a href="/contact"
                        class="mt-4 bg-white text-primary hover:bg-slate-50 font-bold py-4 px-8 rounded-lg shadow-xl shadow-black/10 transition-transform active:scale-95 text-lg">
                        Book a Consultation
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
