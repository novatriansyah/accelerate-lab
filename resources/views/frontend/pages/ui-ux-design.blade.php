@extends('frontend.components.layout')

@section('content')
    <div class="layout-container flex w-full flex-col">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
                <div class="@container">
                    <div class="flex flex-col-reverse lg:flex-row gap-12 px-4 py-16 lg:py-24 items-center">
                        <div class="flex flex-col gap-6 lg:w-1/2 justify-center">
                            <div class="flex flex-col gap-4 text-left">
                                <div
                                    class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-primary/5 px-3 py-1 w-fit">
                                    <span class="size-2 rounded-full bg-primary animate-pulse"></span>
                                    <span class="text-xs font-semibold uppercase tracking-wide text-primary">UI/UX Design
                                        Agency</span>
                                </div>
                                <h1
                                    class="text-text-main dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] sm:text-5xl lg:text-6xl">
                                    Designing Digital Experiences that <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-teal-400">Convert</span>
                                </h1>
                                <h2
                                    class="text-text-main/80 dark:text-gray-300 text-lg font-normal leading-relaxed max-w-xl">
                                    We blend data-driven research with pixel-perfect aesthetics to build products users
                                    love. Transform your complex ideas into intuitive interfaces.
                                </h2>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <a href="/contact"
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-8 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary-dark transition-all hover:scale-105 shadow-xl shadow-primary/25">
                                    <span class="truncate">Start Your Design Journey</span>
                                </a>
                                <a href="/case-studies"
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-text-main dark:text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                                    <span class="truncate">View Portfolio</span>
                                </a>
                            </div>
                            <div class="flex items-center gap-4 pt-4 opacity-70">
                                <div class="flex -space-x-3">
                                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-background-dark bg-gray-200 bg-cover bg-center"
                                        data-alt="User portrait 1"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBsBUIyokF1ew_o5gs-mh-elD3CHIkpk-kqUUhATzB4c6o2B297MLt09Jxmt8Ka-sQncynTEIcD0cG3XL72hGdHnROfd9JEskHxFUxwc0nANJj7T_I88bB0Z-weLSbnp2gNPhwkAAG7WE5vtP24JmffknpxQsgaAEiCEw9mzjSxaTDBqB_cEblhqhHg7wZgODUXnvc77q3VaNOTTVLJ-YcNfgsPI9sWT7IsaPw4CcK2-frpKr1vISLrwLcN6vrLCs_8OWskFFcvZu8");'>
                                    </div>
                                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-background-dark bg-gray-200 bg-cover bg-center"
                                        data-alt="User portrait 2"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHjOS51i6pG3OxytpzGyI7rVpCoLJ5RbM5rlGt96PjbmizdrFq0gkZuOtzP5knG3K_GpSn_way4rTdlOVVyce4PSmKP7_M-9xXzw5j02WNxQjIT0gCl2IV1Y8WNdbucWMbEM2bQEa2LG86Nf4RnRBNY6bnlYdy36UpERpxn0HL4L9cWDjCv_OB5pxe4OVANgoUhq1ghgv_qaPyBs3BPLkB7n4rvqDPixDVKFIGh7N1qz7PA3E8G1PbYKgvqnw2KHTTPWi-i9XsPdY");'>
                                    </div>
                                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-background-dark bg-gray-200 bg-cover bg-center"
                                        data-alt="User portrait 3"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDR9Gppdxa7IXiezhocp4SgtR8OhckBMi5y7kwASKrjXSY8qW7J-T7R5u-p1I9WbSvTQyBa23eLYm1TDBPlUZQBKmEkFz7y7A8ugUCE1tp_c_fSUfSCvO3Um0vqmkZ-kh6b8i_MJJdUDBEIaZbsvO0DgEglaqEVSkQzO_t7UkarITzCRvypL98BFp_Q5JzcBFnzTWj7SJMfsjvl5E1RPbBprB0AVUEc0lvxA9fodAWbnqCIgrX6hYxx9gguSxFc1_D4WtTB5Gm76Xc");'>
                                    </div>
                                </div>
                                <p class="text-sm font-medium text-text-main dark:text-gray-300">Trusted by 100+ innovators
                                </p>
                            </div>
                        </div>
                        <div class="lg:w-1/2 relative group perspective-1000">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-primary to-teal-400 rounded-xl blur-2xl opacity-20 group-hover:opacity-30 transition duration-1000 group-hover:duration-200">
                            </div>
                            <div
                                class="relative w-full aspect-[4/3] bg-background-light dark:bg-background-dark rounded-xl border border-gray-200 dark:border-gray-800 shadow-2xl overflow-hidden transform transition-transform hover:scale-[1.01] hover:-rotate-1">
                                @if ($service->hero_image)
                                    <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                        class="absolute inset-0 w-full h-full object-cover">
                                @else
                                    <div class="absolute inset-0 bg-cover bg-center"
                                        data-alt="Abstract 3D teal geometric shapes representing modern design"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCFQZzmzeLMH89ZmaEBLnQ8ToEms7v4TMy1JcKuWv7uZR_oOlVltFXtULqyZMCuGVNlV11kHWOa8s6SdN4gO6TfdYQJy31F0HZFUhlmZGQ2tosOf0GoyT4fyKjV-hD0gMhWjP9DdRfqcVo8BKHA15OIi4GuYcg5kETO8WJv60XabNk3eFCm1kXHTMnia9REUBx_oMJdMM_Jk3NcwHlhNMCdN1vE4RX89xJOqQ6aOWsb9X1v2DbkdJBnUvY_34xmUHWRA6QmULXi7_k");'>
                                    </div>
                                    <div
                                        class="absolute bottom-8 left-8 right-8 bg-white/90 dark:bg-gray-900/90 backdrop-blur p-4 rounded-lg shadow-lg border border-white/20">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div
                                                class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                                                <span class="material-symbols-outlined text-sm">analytics</span>
                                            </div>
                                            <div>
                                                <div class="h-2 w-24 bg-gray-200 dark:bg-gray-700 rounded mb-1"></div>
                                                <div class="h-2 w-16 bg-gray-200 dark:bg-gray-700 rounded"></div>
                                            </div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div class="h-20 flex-1 bg-gray-100 dark:bg-gray-800 rounded"></div>
                                            <div class="h-20 flex-1 bg-gray-100 dark:bg-gray-800 rounded"></div>
                                            <div class="h-20 flex-1 bg-primary/10 rounded border border-primary/20"></div>
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
    <div class="w-full bg-white dark:bg-gray-900 py-10 border-y border-gray-100 dark:border-gray-800 overflow-hidden">
        <div class="layout-content-container max-w-[1280px] mx-auto px-4 md:px-10 lg:px-40">
            <p class="text-center text-sm font-semibold text-gray-400 uppercase tracking-widest mb-8">Our Design &amp;
                Prototyping Arsenal</p>
            <div
                class="flex flex-wrap justify-center items-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <div class="flex items-center gap-2 font-bold text-xl text-gray-600 dark:text-gray-400"><span
                        class="material-symbols-outlined">design_services</span> Figma</div>
                <div class="flex items-center gap-2 font-bold text-xl text-gray-600 dark:text-gray-400"><span
                        class="material-symbols-outlined">diamond</span> Sketch</div>
                <div class="flex items-center gap-2 font-bold text-xl text-gray-600 dark:text-gray-400"><span
                        class="material-symbols-outlined">layers</span> Adobe XD</div>
                <div class="flex items-center gap-2 font-bold text-xl text-gray-600 dark:text-gray-400"><span
                        class="material-symbols-outlined">bolt</span> Framer</div>
                <div class="flex items-center gap-2 font-bold text-xl text-gray-600 dark:text-gray-400"><span
                        class="material-symbols-outlined">draw</span> Illustrator</div>
            </div>
        </div>
    </div>
    <div class="layout-container flex w-full flex-col">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
                <div class="flex flex-col gap-10 px-4 py-16 @container">
                    <div class="flex flex-col lg:flex-row gap-12 items-start">
                        <div class="flex flex-col gap-6 lg:w-1/3 sticky top-24">
                            <div class="flex flex-col gap-4">
                                <h2 class="text-primary text-sm font-bold uppercase tracking-widest">Our Philosophy</h2>
                                <h3
                                    class="text-text-main dark:text-white tracking-tight text-3xl font-bold leading-tight md:text-4xl">
                                    Design with Purpose
                                </h3>
                                <p class="text-text-main/70 dark:text-gray-400 text-base font-normal leading-relaxed">
                                    We believe in design that serves a function beyond aesthetics. Every pixel is placed
                                    with intent, grounded in user needs and business goals.
                                </p>
                            </div>
                            <a href="/about"
                                class="flex w-fit items-center gap-2 text-primary font-bold hover:text-primary-dark group transition-colors">
                                <span>Learn about our values</span>
                                <span
                                    class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:w-2/3">
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-[#d0e7e4] dark:border-gray-700 bg-white dark:bg-gray-800 p-6 shadow-sm hover:shadow-md transition-shadow">
                                <div
                                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-2">
                                    <span class="material-symbols-outlined">person_search</span>
                                </div>
                                <h4 class="text-text-main dark:text-white text-lg font-bold leading-tight">User-Centric
                                    Design</h4>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-relaxed">
                                    Putting the user at the center of every decision to ensure intuitive experiences that
                                    solve real problems.</p>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-[#d0e7e4] dark:border-gray-700 bg-white dark:bg-gray-800 p-6 shadow-sm hover:shadow-md transition-shadow">
                                <div
                                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-2">
                                    <span class="material-symbols-outlined">accessibility_new</span>
                                </div>
                                <h4 class="text-text-main dark:text-white text-lg font-bold leading-tight">Accessibility
                                    First</h4>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-relaxed">
                                    Ensuring our digital products are usable by everyone, regardless of ability, following
                                    WCAG guidelines.</p>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-[#d0e7e4] dark:border-gray-700 bg-white dark:bg-gray-800 p-6 shadow-sm hover:shadow-md transition-shadow">
                                <div
                                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-2">
                                    <span class="material-symbols-outlined">bar_chart</span>
                                </div>
                                <h4 class="text-text-main dark:text-white text-lg font-bold leading-tight">Data-Driven
                                    Decisions</h4>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-relaxed">We
                                    validate every design choice with real user data, analytics, and A/B testing frameworks.
                                </p>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-[#d0e7e4] dark:border-gray-700 bg-white dark:bg-gray-800 p-6 shadow-sm hover:shadow-md transition-shadow">
                                <div
                                    class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-2">
                                    <span class="material-symbols-outlined">devices</span>
                                </div>
                                <h4 class="text-text-main dark:text-white text-lg font-bold leading-tight">Scalable Systems
                                </h4>
                                <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-relaxed">
                                    Creating atomic design systems that allow your product to scale consistently across all
                                    platforms.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="layout-container flex w-full flex-col bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-16">
            <div class="layout-content-container flex flex-col max-w-[960px] flex-1 text-center">
                <h2 class="text-primary text-sm font-bold uppercase tracking-widest mb-3">Methodology</h2>
                <h3
                    class="text-text-main dark:text-white text-3xl md:text-4xl font-bold leading-tight tracking-[-0.015em] mb-4">
                    The Design Process</h3>
                <p class="text-text-main/70 dark:text-gray-400 max-w-2xl mx-auto">From chaos to clarity. Our proven 4-step
                    framework ensures we solve the right problems with the right solutions.</p>
            </div>
        </div>
    </div>
    <div class="layout-container flex w-full flex-col bg-white dark:bg-gray-900 pb-16">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
                <div class="hidden md:grid grid-cols-4 gap-4 px-4">
                    <div class="flex flex-col gap-4 relative group">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-10 rounded-full bg-primary text-white flex items-center justify-center z-10 font-bold shadow-lg shadow-primary/30">
                                1</div>
                            <div class="h-[2px] bg-gray-200 dark:bg-gray-700 flex-1"></div>
                        </div>
                        <div class="pt-4 pr-4">
                            <div class="text-primary mb-2">
                                <span class="material-symbols-outlined text-3xl">search</span>
                            </div>
                            <h4 class="text-text-main dark:text-white text-xl font-bold mb-2">Discover</h4>
                            <p class="text-text-secondary dark:text-gray-400 text-sm">Deep dive into user research,
                                stakeholder interviews, and competitive analysis to uncover opportunities.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 relative group">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-gray-800 border-2 border-primary text-primary flex items-center justify-center z-10 font-bold">
                                2</div>
                            <div class="h-[2px] bg-gray-200 dark:bg-gray-700 flex-1"></div>
                        </div>
                        <div class="pt-4 pr-4">
                            <div class="text-primary mb-2">
                                <span class="material-symbols-outlined text-3xl">edit_note</span>
                            </div>
                            <h4 class="text-text-main dark:text-white text-xl font-bold mb-2">Define</h4>
                            <p class="text-text-secondary dark:text-gray-400 text-sm">Structuring the blueprint with
                                information architecture, user flows, and low-fidelity wireframing.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 relative group">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-gray-800 border-2 border-primary text-primary flex items-center justify-center z-10 font-bold">
                                3</div>
                            <div class="h-[2px] bg-gray-200 dark:bg-gray-700 flex-1"></div>
                        </div>
                        <div class="pt-4 pr-4">
                            <div class="text-primary mb-2">
                                <span class="material-symbols-outlined text-3xl">brush</span>
                            </div>
                            <h4 class="text-text-main dark:text-white text-xl font-bold mb-2">Design</h4>
                            <p class="text-text-secondary dark:text-gray-400 text-sm">Crafting high-fidelity UI,
                                interactions, and prototypes that bring the vision to life with pixel perfection.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 relative group">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-gray-800 border-2 border-primary text-primary flex items-center justify-center z-10 font-bold">
                                4</div>
                        </div>
                        <div class="pt-4 pr-4">
                            <div class="text-primary mb-2">
                                <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                            </div>
                            <h4 class="text-text-main dark:text-white text-xl font-bold mb-2">Deliver</h4>
                            <p class="text-text-secondary dark:text-gray-400 text-sm">Creating comprehensive design systems
                                and specifications for seamless developer handoff.</p>
                        </div>
                    </div>
                </div>
                <div class="grid md:hidden grid-cols-[40px_1fr] gap-x-4 px-4">
                    <div class="flex flex-col items-center gap-1 pt-1">
                        <div
                            class="size-8 rounded-full bg-primary text-white flex items-center justify-center z-10 text-sm font-bold">
                            1</div>
                        <div class="w-[2px] bg-gray-200 dark:bg-gray-700 h-full grow min-h-[80px]"></div>
                    </div>
                    <div class="flex flex-1 flex-col pb-8">
                        <p class="text-text-main dark:text-white text-lg font-bold leading-normal">Discover</p>
                        <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">User research
                            &amp; personas</p>
                    </div>
                    <div class="flex flex-col items-center gap-1 pt-1">
                        <div
                            class="size-8 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center z-10 text-sm font-bold">
                            2</div>
                        <div class="w-[2px] bg-gray-200 dark:bg-gray-700 h-full grow min-h-[80px]"></div>
                    </div>
                    <div class="flex flex-1 flex-col pb-8">
                        <p class="text-text-main dark:text-white text-lg font-bold leading-normal">Define</p>
                        <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">Wireframing
                            &amp; user flows</p>
                    </div>
                    <div class="flex flex-col items-center gap-1 pt-1">
                        <div
                            class="size-8 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center z-10 text-sm font-bold">
                            3</div>
                        <div class="w-[2px] bg-gray-200 dark:bg-gray-700 h-full grow min-h-[80px]"></div>
                    </div>
                    <div class="flex flex-1 flex-col pb-8">
                        <p class="text-text-main dark:text-white text-lg font-bold leading-normal">Design</p>
                        <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">High-fidelity
                            UI &amp; interactions</p>
                    </div>
                    <div class="flex flex-col items-center gap-1 pt-1">
                        <div
                            class="size-8 rounded-full bg-white border-2 border-primary text-primary flex items-center justify-center z-10 text-sm font-bold">
                            4</div>
                    </div>
                    <div class="flex flex-1 flex-col pb-8">
                        <p class="text-text-main dark:text-white text-lg font-bold leading-normal">Deliver</p>
                        <p class="text-text-secondary dark:text-gray-400 text-sm font-normal leading-normal">Design systems
                            &amp; handoff</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-container flex w-full flex-col py-16">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">
                <div class="flex justify-between items-end mb-10 px-4">
                    <div class="max-w-2xl">
                        <h2 class="text-primary text-sm font-bold uppercase tracking-widest mb-2">Portfolio</h2>
                        <h3 class="text-text-main dark:text-white text-3xl font-bold">Recent Case Studies</h3>
                    </div>
                    <a href="/case-studies"
                        class="hidden md:flex items-center gap-2 text-text-main dark:text-white font-medium hover:text-primary transition-colors">
                        <span>View All Projects</span>
                        <span class="material-symbols-outlined">arrow_right_alt</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-xl bg-gray-200 aspect-[4/3] mb-4">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                                data-alt="Fintech dashboard UI design showing graphs and financial data"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCmGRqMTt2Q_ySOpgd76IDWnIOcSfW_PxIzQF-pgWdmvfXyTd_YJlNymQSCaTzfDMBSr9jFr_gh3DAU88WVzZeP01Y-rF8lZ_SmECMD-QC1dp3G1NKYsmdwT4HmBH12IDRVQhdNzzWANajIvXXk6pk5NX7iSatc435947POiDMFDXYrpc0TqbVjetn-j5Q1yBD6_Z6N_QD7WCOsoalWBxQnnuZXY6pBgoCfkIRgqsIXKQ9ht8ymturusG7QiOOJlyx3ilSihaBppbI");'>
                            </div>
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="px-4 py-2 bg-white text-text-main text-sm font-bold rounded-full">View Case
                                    Study</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <h4
                                class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">
                                FinTech Pro Dashboard</h4>
                            <p class="text-sm text-text-secondary dark:text-gray-400">Financial SaaS • UI/UX Design</p>
                        </div>
                    </div>
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-xl bg-gray-200 aspect-[4/3] mb-4">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                                data-alt="E-commerce mobile app interface showcasing product cards"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCrNCQO8KFTzRspUVLysZnkca4LnzCWfCP5oW12uw2r4sAcHxvdwUt8fiBPzn2lzmFGEBWyoGEzneAEukopGqtyZWH56ea_Jzawb1gd5a_atb5kIdDvUy06WF-uo7shcGJWbicJ7NSy28YCbNcmHAX5qQXvenlFqph7kOekzkbGHFBVNTO-UHN0x1j02KDrmtAoi4TCtm2D4fO1GHbMy_0TqZQedO4EyDlsjwuqQzi-kmxB2QIbMHQgFhbFCP1069jrWnqMA-QX3fc");'>
                            </div>
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="px-4 py-2 bg-white text-text-main text-sm font-bold rounded-full">View Case
                                    Study</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <h4
                                class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">
                                LuxShop Mobile App</h4>
                            <p class="text-sm text-text-secondary dark:text-gray-400">E-Commerce • Mobile Design</p>
                        </div>
                    </div>
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-xl bg-gray-200 aspect-[4/3] mb-4">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                                data-alt="Corporate analytics platform interface on laptop screen"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAhv-qcEv3KiI9j_NKRyL4DzHXwclkebpoD3xqagir0LNoCq1cciB4ltfYxrwF8sC4_0-38Aee4iXxnAhvnQp9baEkZZa4yk2ZEf2q3AtJ043WwINIkDoYBi5ZBFouj1bKoQoUWccAuL8QJaSsb2rRDSfwlMNCXR-wLviIzm1CjUhSNYIcungidx2_evApq1vY8yxevJUxioFmjE4-mBxGyLTyRndGLeIyEnC0wq_FDyVzSRAokvmDC81K36OQoV7cUiIR9teJK3gs");'>
                            </div>
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="px-4 py-2 bg-white text-text-main text-sm font-bold rounded-full">View Case
                                    Study</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <h4
                                class="text-xl font-bold text-text-main dark:text-white group-hover:text-primary transition-colors">
                                HealthStream Analytics</h4>
                            <p class="text-sm text-text-secondary dark:text-gray-400">Healthcare • Web Application</p>
                        </div>
                    </div>
                </div>
                <div class="flex md:hidden justify-center mt-8">
                    <a href="/case-studies"
                        class="flex items-center gap-2 text-text-main dark:text-white font-medium hover:text-primary transition-colors border border-gray-300 dark:border-gray-700 px-6 py-2 rounded-full">
                        <span>View All Projects</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div
        class="layout-container flex w-full flex-col bg-background-light dark:bg-background-dark py-16 border-t border-gray-100 dark:border-gray-800">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex flex-col md:flex-row items-center gap-12 max-w-[1280px] flex-1 px-4">
                <div class="md:w-1/2">
                    <h2 class="text-primary text-sm font-bold uppercase tracking-widest mb-2">Impact</h2>
                    <h3 class="text-text-main dark:text-white text-3xl font-bold mb-4">Good Design is Good Business</h3>
                    <p class="text-text-main/70 dark:text-gray-400 mb-6">Investing in UX isn't just about making things
                        look pretty. It's about reducing churn, increasing conversion, and boosting customer satisfaction.
                    </p>
                    <div class="flex gap-8">
                        <div>
                            <p class="text-3xl font-bold text-text-main dark:text-white">400%</p>
                            <p class="text-sm text-text-secondary dark:text-gray-400">Possible ROI on UX</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-text-main dark:text-white">50ms</p>
                            <p class="text-sm text-text-secondary dark:text-gray-400">Time to make a first impression</p>
                        </div>
                    </div>
                </div>
                <div
                    class="md:w-1/2 w-full bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700">
                    <h4 class="text-lg font-bold text-text-main dark:text-white mb-6">Estimate your potential growth</h4>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label class="text-sm font-medium text-text-secondary dark:text-gray-300">Current Monthly
                                Visitors</label>
                            <span class="text-sm font-bold text-primary">50,000</span>
                        </div>
                        <input class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                            max="100000" min="1000" type="range" />
                    </div>
                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <label class="text-sm font-medium text-text-secondary dark:text-gray-300">Conversion Increase
                                Target</label>
                            <span class="text-sm font-bold text-primary">25%</span>
                        </div>
                        <input class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary"
                            max="50" min="1" type="range" value="25" />
                    </div>
                    <div class="bg-primary/5 rounded-xl p-4 flex items-center justify-between border border-primary/20">
                        <div>
                            <p class="text-xs text-text-secondary dark:text-gray-400 uppercase font-semibold">Projected
                                Annual Revenue Increase</p>
                            <p class="text-2xl font-black text-primary">$125,000</p>
                        </div>
                        <span class="material-symbols-outlined text-primary text-3xl">trending_up</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2 text-center">*Estimates based on industry standards</p>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-container flex w-full flex-col bg-text-main dark:bg-black py-20 text-center">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex flex-col max-w-[800px] flex-1 items-center gap-8">
                <h2 class="text-white text-4xl md:text-5xl font-black tracking-tight">Ready to transform your interface?
                </h2>
                <p class="text-gray-400 text-lg max-w-xl">Let's build a product that your users will love and your
                    competitors will envy. The future of your digital presence starts here.</p>
                <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
                    <a href="/contact"
                        class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-8 bg-primary text-white text-lg font-bold hover:bg-white hover:text-text-main transition-all">
                        Start a Project
                    </a>
                    <a href="/contact"
                        class="flex min-w-[200px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-8 border border-gray-700 hover:border-white text-white text-lg font-bold hover:bg-white/10 transition-all">
                        Schedule Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
