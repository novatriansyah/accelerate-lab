@extends('frontend.components.layout')

@section('content')
<section class="relative">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
<div class="@container">
<div class="flex flex-col md:flex-row gap-8 items-center">
<div class="flex-1 space-y-6 md:pr-10 z-10">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">science</span>
                            Research &amp; Development
                        </div>
<h1 class="text-4xl md:text-6xl font-black leading-tight tracking-tight text-slate-900 dark:text-white">
                            The Lab: Where Innovation Meets Execution
                        </h1>
<p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl leading-relaxed">
                            Exploring the bleeding edge of software engineering, digital product design, and architectural patterns. We build the future, then we share the blueprints.
                        </p>
<div class="flex flex-wrap gap-4 pt-4">
<a href="/blog" class="flex items-center justify-center rounded-lg h-12 px-6 bg-primary text-white text-base font-bold hover:bg-teal-600 transition-all shadow-lg shadow-primary/25">
                                Explore Research
                            </a>
<a href="/about" class="flex items-center justify-center rounded-lg h-12 px-6 bg-white dark:bg-surface-dark border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-base font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                                Meet the Team
                            </a>
</div>
</div>
<div class="flex-1 w-full h-[400px] md:h-[500px] rounded-2xl overflow-hidden relative shadow-2xl shadow-primary/10 group">
<div class="absolute inset-0 bg-gradient-to-tr from-primary/40 to-transparent mix-blend-overlay z-10"></div>
<div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Abstract visualization of server data nodes and geometric tech patterns connected by light" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBn6VlxoqYrIOjU9dEDYcjp3h6UQqyWHH58CvnBLAskQTNaQiE05eO8suxzjIaVCN_hY9q6QSwO7SWWcPhsta0x9V-irhgnlZJ0pjt4Z_hrW-lLA4vYcYDQv08Xf3AUr0dU3H42KIpWN9o1u3lpNVkKeBfAYL1NVwwCwW0xSj1IreDw1diDzyAYgspP04dpQJA3U8gNxcr56ikMEE068BbQhmQVCJgRw07cZWmr_lhEeSsXrKqb_awg79adi00VmCSDyYxji7hCEaM');">
</div>
<div class="absolute bottom-6 left-6 z-20 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-sm p-4 rounded-xl border border-white/20 dark:border-slate-700 shadow-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined">code</span>
</div>
<div>
<p class="text-xs text-slate-500 dark:text-slate-400 font-medium uppercase">Latest Drop</p>
<p class="text-sm font-bold text-slate-900 dark:text-white">React Server Components v3</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="border-y border-slate-200 dark:border-slate-800 bg-white dark:bg-surface-dark/50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
<div class="flex flex-col gap-1 border-l-4 border-primary pl-4">
<p class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">50+</p>
<p class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">Prototypes Built</p>
</div>
<div class="flex flex-col gap-1 border-l-4 border-slate-200 dark:border-slate-700 pl-4 hover:border-primary transition-colors duration-300">
<p class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">12</p>
<p class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">Open Source Repos</p>
</div>
<div class="flex flex-col gap-1 border-l-4 border-slate-200 dark:border-slate-700 pl-4 hover:border-primary transition-colors duration-300">
<p class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">100+</p>
<p class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">Design Sprints</p>
</div>
<div class="flex flex-col gap-1 border-l-4 border-slate-200 dark:border-slate-700 pl-4 hover:border-primary transition-colors duration-300">
<p class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">24</p>
<p class="text-sm font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">Tech Talks</p>
</div>
</div>
</div>
</section>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
<h3 class="text-2xl font-bold text-slate-900 dark:text-white">Latest Insights</h3>
<div class="flex flex-wrap gap-2">
<button class="h-9 px-4 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-sm font-medium transition-transform hover:scale-105">
                    All Content
                </button>
<button class="h-9 px-4 rounded-full bg-white dark:bg-surface-dark border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                    Engineering
                </button>
<button class="h-9 px-4 rounded-full bg-white dark:bg-surface-dark border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                    Design Systems
                </button>
<button class="h-9 px-4 rounded-full bg-white dark:bg-surface-dark border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                    Product Strategy
                </button>
<button class="h-9 px-4 rounded-full bg-white dark:bg-surface-dark border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:border-primary hover:text-primary transition-all">
                    Open Source
                </button>
</div>
</div>
<div class="mb-16 bg-white dark:bg-surface-dark rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-sm">
<div class="grid grid-cols-1 md:grid-cols-2">
<div class="p-8 md:p-12 flex flex-col justify-center gap-6">
<div class="flex items-center gap-2 text-primary font-bold text-sm uppercase tracking-wider">
<span class="material-symbols-outlined text-lg">star</span>
                        Spotlight
                    </div>
<h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white leading-tight">
                        Deep Dive: Server Components Architecture
                    </h2>
<p class="text-slate-600 dark:text-slate-300 leading-relaxed text-lg">
                        A retrospective on how we migrated a large-scale fintech application to Next.js App Router, leveraging server-side rendering for maximum performance and user experience.
                    </p>
<div class="flex items-center gap-4 mt-2">
<a href="/case-studies" class="flex items-center justify-center rounded-lg h-10 px-6 bg-primary text-white text-sm font-bold tracking-wide hover:bg-teal-600 transition-colors">
                            Read Case Study
                        </a>
<span class="text-slate-400 dark:text-slate-500 text-sm font-medium">8 min read</span>
</div>
</div>
<div class="relative min-h-[300px] md:min-h-full bg-slate-900 flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 opacity-40" data-alt="Computer screen displaying complex code syntax in a dark theme editor" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA7Oes3VGQsFaamh-5z0KlbrkPMOOaHLGSWyrmxWAXNfPLd0ivsIIW8JAK7DiidWJjSFb30cxFLkL5kVvpj9XARCX7BBckhU3XLok2CU2vlhgA0pHbtkc0wZsxFGBkoJbKWdD9KljvGM8l99Ox49mqZlfs5JB-G2QGCJtoQOmEu-ppiktXGIlj_zW5YJjN_pUcFq2wGwfNjYMZer6TvhqUY35RV3KuFeGpeWkOmFCWEJxQ6EgxbKYk6mM76fHbh65qZkhvqjbv0iRo'); background-size: cover; background-position: center;">
</div>
<div class="relative z-10 bg-slate-800/80 backdrop-blur-md border border-slate-700 rounded-lg p-6 max-w-sm shadow-2xl transform rotate-1 md:-rotate-1">
<div class="flex gap-2 mb-3">
<div class="w-3 h-3 rounded-full bg-red-500"></div>
<div class="w-3 h-3 rounded-full bg-yellow-500"></div>
<div class="w-3 h-3 rounded-full bg-green-500"></div>
</div>
<div class="font-mono text-xs text-slate-300 space-y-1">
<p><span class="text-purple-400">export</span> <span class="text-blue-400">default</span> <span class="text-purple-400">async</span> <span class="text-blue-400">function</span> <span class="text-yellow-300">Page</span>() {</p>
<p class="pl-4"><span class="text-purple-400">const</span> data = <span class="text-purple-400">await</span> <span class="text-blue-400">getData</span>()</p>
<p class="pl-4"><span class="text-purple-400">return</span> (</p>
<p class="pl-8 text-green-400">&lt;main&gt;{data.content}&lt;/main&gt;</p>
<p class="pl-4">)</p>
<p>}</p>
</div>
</div>
</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<article class="group flex flex-col bg-white dark:bg-surface-dark rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-xl hover:border-primary/50 transition-all duration-300 cursor-pointer">
<div class="h-48 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 z-10 transition-colors duration-300"></div>
<img alt="Abstract 3D geometric shapes rendering in cool blue tones" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" data-alt="Abstract 3D geometric shapes rendering in cool blue tones" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKP6G2A_GGdiczIcZVT6kvFjee9MaTgpkdxOp35qAPukxXKppSLtSvRKC_J3xduRFg-07kDNbx7t8qWUXRF86VR-0gmTDkqrc3_XAejig5rwL6rYq8Y4IUdjtSUkl2bVl6JxqBfI8Yu8RvWgrYMHskMPCKodvuUstptUqLmVxO4nG-ZarF3rzS16KyCayPUwTdzmghb-AjVy9UR8K33u67jdMSx9xkLEZo1wvZ9apZV9DEaCDh09CMYuqHpVBT2J5AdL14t3EqPEQ"/>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-center mb-3">
<span class="text-primary text-xs font-bold uppercase tracking-wider">Design Systems</span>
<span class="text-slate-400 text-xs">Nov 14, 2023</span>
</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Atomic Design at Scale</h3>
<p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-4 flex-1">
                        How we structure our Figma libraries to synchronize perfectly with React component libraries.
                    </p>
<div class="flex items-center text-primary text-sm font-bold gap-1 mt-auto group-hover:gap-2 transition-all">
                        Read Article <span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
</article>
<article class="group flex flex-col bg-white dark:bg-surface-dark rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-xl hover:border-primary/50 transition-all duration-300 cursor-pointer">
<div class="h-48 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 z-10 transition-colors duration-300"></div>
<img alt="Cybersecurity concept with lock icon and binary code background" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" data-alt="Cybersecurity concept with lock icon and binary code background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBY4pJ5yIIH3bQ8ZR4NVjDUgpPApdlc-An1AWAo5AfNO5UFGRojX-VLBd7NINqdFE562PgxG01mmcuMfZsQIb_EZc0PCnuzsJeh-1EhBrX2NEvQbedOoVWSRteGyyQLeytoMwR8OapLREihrEuxQBgeeU6K_dwV-9hMvX7Y92FhUpNDuwYP2wayEzE5-aLu-GEj6xMGo3UMI2zjetnDvuYl-yM0dp_R0tl5lN4ZpQQWpOByTblrih1k4sdzSLCAHrod1hrhUcVzL6M"/>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-center mb-3">
<span class="text-primary text-xs font-bold uppercase tracking-wider">Engineering</span>
<span class="text-slate-400 text-xs">Oct 02, 2023</span>
</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">Zero Trust Architecture</h3>
<p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-4 flex-1">
                        Implementing secure authentication flows in modern web apps without compromising UX.
                    </p>
<div class="flex items-center text-primary text-sm font-bold gap-1 mt-auto group-hover:gap-2 transition-all">
                        Read Article <span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
</article>
<article class="group flex flex-col bg-white dark:bg-surface-dark rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-xl hover:border-primary/50 transition-all duration-300 cursor-pointer">
<div class="h-48 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 z-10 transition-colors duration-300"></div>
<img alt="UI design sketches and wireframes on a desk with digital devices" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" data-alt="UI design sketches and wireframes on a desk with digital devices" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-6HO4zGMNzC2dUOxVS3ymm9pyuNEOfaSa6CjmfZEZRBV9Sn9rehwo7QPjwVMSQyj7E3OPAXnPbNPYZs34pjQU3R4qsQDtEJkbveu4Zd1oe46j3Cn92j31r5zNCCP4fNR5Dw5Lyz1sRjVOM31Gg3wG8KGb_nkUYTrr48i-XtjoMyrwO3y2awH5UPssdq1f_0eMhbzeatTqbi8BuXz5JdXDCA3yFKhrWbG7cezFYy9Bbl-smQ_vMUjXEI0rPENSo28mslSxC9bBdD8"/>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-center mb-3">
<span class="text-primary text-xs font-bold uppercase tracking-wider">Product Strategy</span>
<span class="text-slate-400 text-xs">Sep 15, 2023</span>
</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary transition-colors">The MVP Fallacy</h3>
<p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mb-4 flex-1">
                        Why we moved from "Minimum Viable Product" to "Minimum Lovable Product".
                    </p>
<div class="flex items-center text-primary text-sm font-bold gap-1 mt-auto group-hover:gap-2 transition-all">
                        Read Article <span class="material-symbols-outlined text-sm">arrow_forward</span>
</div>
</div>
</article>
</div>
<div class="mt-12 flex justify-center">
<button class="flex items-center gap-2 text-slate-600 dark:text-slate-400 hover:text-primary dark:hover:text-primary font-medium transition-colors">
                Load More Articles
                <span class="material-symbols-outlined text-lg">expand_more</span>
</button>
</div>
</div>
<section class="bg-slate-900 py-20 relative overflow-hidden">
<div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/20 to-transparent skew-x-12 pointer-events-none"></div>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
<div class="inline-flex items-center justify-center p-3 rounded-full bg-slate-800 mb-6">
<span class="material-symbols-outlined text-primary text-2xl">mail</span>
</div>
<h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Join the Lab Reports</h2>
<p class="text-slate-400 mb-10 max-w-lg mx-auto">Get our latest research, design resources, and engineering deep dives delivered straight to your inbox. No spam, just signal.</p>
<form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
<input class="flex-1 h-12 px-4 rounded-lg bg-slate-800 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Enter your email address" type="email"/>
<button class="h-12 px-8 rounded-lg bg-primary hover:bg-teal-600 text-white font-bold transition-colors" type="button">
                    Subscribe
                </button>
</form>
<p class="text-xs text-slate-600 mt-4">By subscribing, you agree to our Privacy Policy.</p>
</div>
</section>
@endsection
