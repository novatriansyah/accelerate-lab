@extends('frontend.components.layout')

@section('content')
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="@container">
                        <div class="flex flex-col gap-6 py-10 @[480px]:gap-8 @[864px]:flex-row items-center">
                            <div
                                class="flex flex-col gap-6 @[480px]:min-w-[400px] @[480px]:gap-8 @[864px]:justify-center flex-1">
                                <div class="flex flex-col gap-2 text-left">
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 w-fit mb-2">
                                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                        <span class="text-xs font-semibold text-primary uppercase tracking-wider">Mobile
                                            First Innovation</span>
                                    </div>
                                    <h1
                                        class="text-text-main-light dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        Mobile Experiences,<br class="hidden md:block" /> Accelerated.
                                    </h1>
                                    <h2
                                        class="text-text-sub-light dark:text-text-sub-dark text-lg font-normal leading-relaxed">
                                        We build high-performance mobile applications using cutting-edge technologies.
                                        Experience the future of mobile interaction with precision engineering.
                                    </h2>
                                </div>
                                <div class="flex gap-4">
                                    <a href="/contact"
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white hover:bg-teal-600 transition-all shadow-lg shadow-primary/20 text-base font-bold leading-normal tracking-[0.015em]">
                                        <span class="truncate">Start Your Project</span>
                                    </a>
                                    <a href="/case-studies"
                                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-transparent border border-gray-300 dark:border-gray-700 hover:border-primary dark:hover:border-primary text-text-main-light dark:text-white transition-all text-base font-bold leading-normal tracking-[0.015em]">
                                        <span class="truncate">View Work</span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="w-full h-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl relative group">
                                @if ($service->hero_image)
                                    <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent z-10">
                                    </div>
                                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAicYLCUClxs-ZEUF84de2qDQLq6uAL-u9Prz_lyYLCU9K4B71i1-4v4MKo0uOxcpLFoCLNERe-xRxnuL-yfaXsqHrgJXdkj_HtfhyFZU2Sj4HKfVG3vZ_eSrHoSOQf43IrVKEVz3nIbmaCN3kdSs2q0u0aKV4fQxXhcjPZvpMXOvbJQ1Y8cHIqMoOY18coDIYD1PbWpkuxk52T4lw3FIuNDMuWeT1Z0ba7M6Qw92xrLUubWo7FIU1Id77lw2BXSCDaUVFDIdJn8W4');">
                                    </div>
                                    <div
                                        class="absolute bottom-6 left-6 right-6 bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur p-4 rounded-xl shadow-lg border border-white/20 z-20 transform translate-y-2 group-hover:translate-y-0 transition-transform">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 rounded-full bg-primary/20 flex items-center justify-center text-primary">
                                                <span class="material-symbols-outlined">rocket_launch</span>
                                            </div>
                                            <div>
                                                <p class="text-xs text-text-sub-light dark:text-text-sub-dark font-medium">
                                                    Performance Score</p>
                                                <p class="text-lg font-bold text-text-main-light dark:text-text-main-dark">
                                                    99/100</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div
                        class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10 pt-10 px-4 border-b border-gray-100 dark:border-gray-800 pb-6">
                        <div>
                            <h2 class="text-primary font-bold tracking-wider uppercase text-sm mb-2">Our Mobile Arsenal</h2>
                            <h3
                                class="text-text-main-light dark:text-white text-3xl font-bold leading-tight tracking-[-0.015em]">
                                Technologies We Master</h3>
                        </div>
                        <p class="text-text-sub-light dark:text-text-sub-dark max-w-md text-right md:text-left">
                            From native mastery to cross-platform efficiency, we leverage the best tools for the job.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-4 pb-12">
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-500 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">code_blocks</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main-light dark:text-white text-lg font-bold leading-tight">React
                                    Native</h2>
                                <p class="text-text-sub-light dark:text-text-sub-dark text-sm font-normal leading-normal">
                                    Cross-platform efficiency with near-native performance using JavaScript.</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-cyan-50 dark:bg-cyan-900/20 flex items-center justify-center text-cyan-500 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">layers</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main-light dark:text-white text-lg font-bold leading-tight">Flutter
                                </h2>
                                <p class="text-text-sub-light dark:text-text-sub-dark text-sm font-normal leading-normal">
                                    Beautiful, natively compiled applications from a single codebase.</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">phone_iphone</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main-light dark:text-white text-lg font-bold leading-tight">Native iOS
                                </h2>
                                <p class="text-text-sub-light dark:text-text-sub-dark text-sm font-normal leading-normal">
                                    High-performance Swift development for the Apple ecosystem.</p>
                            </div>
                        </div>
                        <div
                            class="group flex flex-1 gap-4 rounded-xl border border-[#d0e7e4] dark:border-[#2d4544] bg-surface-light dark:bg-surface-dark p-6 flex-col hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all cursor-default">
                            <div
                                class="h-12 w-12 rounded-lg bg-green-50 dark:bg-green-900/20 flex items-center justify-center text-green-600 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">android</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-text-main-light dark:text-white text-lg font-bold leading-tight">Native
                                    Android</h2>
                                <p class="text-text-sub-light dark:text-text-sub-dark text-sm font-normal leading-normal">
                                    Robust Kotlin solutions for the diverse Android market.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col bg-slate-50 dark:bg-[#0d1817]">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-20">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div class="text-center mb-16">
                        <h2
                            class="text-text-main-light dark:text-white text-3xl font-black leading-tight tracking-[-0.015em] mb-4">
                            The Acceleration Process</h2>
                        <p class="text-text-sub-light dark:text-text-sub-dark max-w-2xl mx-auto">From concept to deployment,
                            our workflow is designed for speed without compromising quality.</p>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 dark:bg-gray-800 -translate-y-1/2 hidden md:block z-0">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-primary">search</span>
                                </div>
                                <h3 class="text-lg font-bold text-text-main-light dark:text-white mb-2">Discovery</h3>
                                <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Understanding your core
                                    metrics and user needs.</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <span
                                        class="material-symbols-outlined text-text-sub-light dark:text-text-sub-dark group-hover:text-primary">design_services</span>
                                </div>
                                <h3 class="text-lg font-bold text-text-main-light dark:text-white mb-2">Design</h3>
                                <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Crafting intuitive,
                                    pixel-perfect user interfaces.</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <span
                                        class="material-symbols-outlined text-text-sub-light dark:text-text-sub-dark group-hover:text-primary">terminal</span>
                                </div>
                                <h3 class="text-lg font-bold text-text-main-light dark:text-white mb-2">Develop</h3>
                                <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Agile sprints with regular
                                    builds and testing.</p>
                            </div>
                            <div class="flex flex-col items-center text-center group">
                                <div
                                    class="w-16 h-16 rounded-full bg-surface-light dark:bg-surface-dark border-4 border-gray-200 dark:border-gray-700 group-hover:border-primary shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <span
                                        class="material-symbols-outlined text-text-sub-light dark:text-text-sub-dark group-hover:text-primary">rocket_launch</span>
                                </div>
                                <h3 class="text-lg font-bold text-text-main-light dark:text-white mb-2">Launch</h3>
                                <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Seamless deployment to App
                                    Store &amp; Play Store.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex h-auto w-full flex-col">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-20">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <h2
                        class="text-text-main-light dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-8">
                        Extended Capabilities</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">smartphone</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">App Strategy</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Market research, user persona
                                definition, and roadmap planning to ensure product-market fit.</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">palette</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">UI/UX Design</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Creating engaging, intuitive,
                                and brand-consistent interfaces that users love.</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">cloud_sync</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">Cloud Integration</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Seamless connectivity with AWS,
                                Azure, or Firebase for scalable backend solutions.</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">bug_report</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">QA &amp; Testing</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Rigorous automated and manual
                                testing to ensure crash-free experiences.</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">update</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">Maintenance</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Ongoing support, updates, and
                                optimization to keep your app ahead of the curve.</p>
                        </div>
                        <div
                            class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg border border-gray-100 dark:border-gray-800 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="material-symbols-outlined text-primary">security</span>
                                <h3 class="font-bold text-text-main-light dark:text-white">App Security</h3>
                            </div>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Implementing banking-grade
                                security protocols to protect user data.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-surface-light dark:bg-surface-dark border-y border-gray-100 dark:border-gray-800">
        <div class="layout-container px-4 md:px-10 lg:px-40 py-20 flex justify-center">
            <div class="max-w-[960px] w-full flex flex-col md:flex-row gap-12 items-center">
                <div class="flex-1 order-2 md:order-1">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video bg-gray-200 dark:bg-gray-800"
                        data-alt="Screenshot of a sleek fintech mobile app dashboard displaying charts and transaction history">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBl2GZg0B1fneO7wO3hRtxeKong02vPPCCYoLM-Ohyoa1FbNBwj1nW_UVQTMIMfFPs6lqRWg6h8RqC6qDk_dew068suv3a66In8yFCFjK3wm_2zWMXMP6zkacS7BpH6MSUIJMVaBJqQxIQOAcpvA956iEk2pH_xIwk8A6AgdwTk_hxFoIxCiDIG0M4A52NSpste8v6aBH3eUxLrQByoyQ1oCZp4l0lo5gpgqcZ6aGYeUhseNgLg-u1LXba438VSKhbrJtAViwutRLg');">
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-6 order-1 md:order-2">
                    <h4 class="text-primary font-bold uppercase tracking-wider text-sm">Case Study</h4>
                    <h2 class="text-3xl font-black text-text-main-light dark:text-white leading-tight">FinTech App Renewal
                    </h2>
                    <p class="text-text-sub-light dark:text-text-sub-dark">
                        We helped a leading financial startup reduce their load times by 40% and increase user retention by
                        redesigning their core mobile architecture using Flutter.
                    </p>
                    <div class="flex gap-8 mt-4">
                        <div>
                            <p class="text-3xl font-black text-text-main-light dark:text-white">40%</p>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">Faster Load</p>
                        </div>
                        <div>
                            <p class="text-3xl font-black text-text-main-light dark:text-white">2.5x</p>
                            <p class="text-sm text-text-sub-light dark:text-text-sub-dark">User Retention</p>
                        </div>
                    </div>
                    <a class="text-primary font-bold flex items-center gap-2 mt-2 hover:gap-3 transition-all"
                        href="/case-studies">
                        Read Full Case Study <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="relative w-full py-24 bg-background-light dark:bg-background-dark">
        <div class="layout-container flex flex-col items-center justify-center px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-text-main-light dark:text-white mb-6 tracking-tight">Ready to
                Accelerate?</h2>
            <p class="text-lg text-text-sub-light dark:text-text-sub-dark max-w-2xl mb-10">
                Let's turn your mobile app idea into a high-performance reality. Our team is ready to onboard your project
                today.
            </p>
            <a href="/contact"
                class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-14 px-8 bg-primary text-white hover:bg-teal-600 hover:scale-105 transition-all shadow-xl shadow-primary/30 text-lg font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Schedule a Discovery Call</span>
            </a>
        </div>
    </div>
@endsection
