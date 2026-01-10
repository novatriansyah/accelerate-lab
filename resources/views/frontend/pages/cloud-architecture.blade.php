@extends('frontend.components.layout')

@section('content')
    <section class="relative overflow-hidden pt-12 pb-20 lg:pt-24 lg:pb-32 hero-gradient bg-grid-pattern">
        <div class="absolute inset-0 bg-white/60 dark:bg-background-dark/90 pointer-events-none"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-8 items-center">
                <div class="flex flex-col gap-6">
                    <div
                        class="inline-flex items-center rounded-full border border-primary/20 bg-primary/5 px-3 py-1 text-xs font-semibold text-primary w-fit">
                        <span class="flex h-2 w-2 rounded-full bg-primary mr-2 animate-pulse"></span>
                        Cloud Architecture Services
                    </div>
                    <h1 class="text-4xl font-black tracking-tight text-text-header sm:text-5xl lg:text-6xl dark:text-white">
                        Scalable. Secure. <br class="hidden lg:block" />
                        <span class="text-primary">Future-Proof.</span>
                    </h1>
                    <p class="text-lg text-text-main max-w-xl leading-relaxed dark:text-slate-300">
                        We design resilient cloud infrastructure that grows with your business, reducing latency and
                        operational costs while maximizing performance.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-2">
                        <a href="/contact"
                            class="flex h-12 items-center justify-center rounded-lg bg-primary px-8 text-base font-bold text-white transition-all hover:bg-primary-dark shadow-lg shadow-primary/20">
                            Schedule a Cloud Audit
                        </a>
                        <a href="/case-studies"
                            class="flex h-12 items-center justify-center rounded-lg border border-slate-200 bg-white px-8 text-base font-semibold text-text-header transition-all hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-white dark:hover:bg-slate-700">
                            View Case Studies
                        </a>
                    </div>
                    <div class="mt-8 flex items-center gap-6 text-sm text-slate-500 font-medium dark:text-slate-400">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
                            <span>AWS Certified</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
                            <span>Azure Partners</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
                            <span>GCP Experts</span>
                        </div>
                    </div>
                </div>
                <div class="relative lg:ml-auto w-full max-w-lg lg:max-w-none">
                    <div class="absolute -top-12 -right-12 size-64 rounded-full bg-primary/10 blur-3xl"></div>
                    <div class="absolute -bottom-12 -left-12 size-64 rounded-full bg-blue-500/10 blur-3xl"></div>
                    <div class="relative mt-8 md:mt-0">
                        <div
                            class="relative w-full aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden bg-white border border-border-light shadow-2xl">
                            @if ($service->hero_image)
                                <img src="{{ Storage::url($service->hero_image) }}" alt="{{ $service->title }}"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center text-border-medium">
                                    <div class="w-3/4 h-3/4 flex flex-col gap-4 opacity-50 -rotate-6 scale-110">
                                        <div class="h-16 w-full bg-primary/10 rounded-xl"></div>
                                        <div class="flex gap-4 h-full">
                                            <div class="w-1/3 bg-slate-200 rounded-xl"></div>
                                            <div class="w-2/3 bg-primary/5 rounded-xl"></div>
                                        </div>
                                        <div class="h-20 w-full bg-slate-300 rounded-xl"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
    </section>
    <section class="py-10 border-y border-slate-100 bg-white dark:bg-background-dark dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-8">Trusted Technology
                Partners</p>
            <div
                class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><span
                        class="material-symbols-outlined">cloud</span> AWS</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><span
                        class="material-symbols-outlined">window</span> Azure</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><span
                        class="material-symbols-outlined">circle</span> Google Cloud</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><span
                        class="material-symbols-outlined">deployed_code</span> Docker</span>
                <span class="text-xl font-bold text-slate-600 dark:text-slate-300 flex items-center gap-2"><span
                        class="material-symbols-outlined">anchor</span> Kubernetes</span>
            </div>
        </div>
    </section>
    <section class="py-20 bg-background-light dark:bg-background-dark">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-16 md:text-center max-w-3xl mx-auto">
                <h2 class="text-base font-semibold uppercase tracking-wide text-primary">Core Capabilities</h2>
                <p class="mt-2 text-3xl font-black tracking-tight text-text-header sm:text-4xl dark:text-white">
                    Enterprise Cloud Services
                </p>
                <p class="mt-4 text-lg text-text-main dark:text-slate-300">
                    Our expert architects build the foundation for your digital success through a comprehensive suite of
                    cloud solutions.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">cloud_upload</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">Cloud Migration</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Seamlessly move legacy systems to modern
                        cloud environments with zero downtime strategies.</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">bolt</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">Serverless Architecture</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Build scalable applications without
                        managing server infrastructure, paying only for compute time.</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">settings_suggest</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">DevOps Automation</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Streamline deployment with robust CI/CD
                        pipelines to release faster and more reliably.</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">security</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">Security &amp; Compliance</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Enterprise-grade security protocols,
                        encryption, and regulatory compliance baked in.</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">hub</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">Hybrid Cloud Solutions</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Integrate on-premise and cloud resources
                        for ultimate flexibility and control.</p>
                </div>
                <div
                    class="group relative rounded-xl border border-slate-200 bg-white p-8 transition-all hover:-translate-y-1 hover:shadow-xl dark:bg-slate-800 dark:border-slate-700">
                    <div
                        class="mb-4 inline-flex size-12 items-center justify-center rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">trending_up</span>
                    </div>
                    <h3 class="text-xl font-bold text-text-header mb-2 dark:text-white">Cost Optimization</h3>
                    <p class="text-text-main leading-relaxed dark:text-slate-300">Maximize performance while minimizing
                        operational expenses through smart resource allocation.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white dark:bg-background-dark border-t border-slate-100 dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-black tracking-tight text-text-header sm:text-4xl mb-6 dark:text-white">
                        Our Cloud Roadmap
                    </h2>
                    <p class="text-lg text-text-main mb-8 dark:text-slate-300">
                        We follow a structured, four-phase methodology to ensure every cloud initiative delivers tangible
                        business value.
                    </p>
                    <div class="relative pl-8 border-l-2 border-slate-200 dark:border-slate-700 space-y-10">
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <span class="material-symbols-outlined text-[20px]">search</span>
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">Phase 1: Assessment</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">Deep dive into current
                                infrastructure, identifying bottlenecks and opportunities.</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <span class="material-symbols-outlined text-[20px]">design_services</span>
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">Phase 2: Strategy Design</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">Architecting the solution blueprint,
                                selecting tech stack, and planning migration.</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <span class="material-symbols-outlined text-[20px]">construction</span>
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">Phase 3: Execution</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">Agile implementation of the cloud
                                infrastructure with continuous testing.</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] flex size-10 items-center justify-center rounded-full bg-white border-2 border-primary text-primary dark:bg-slate-900">
                                <span class="material-symbols-outlined text-[20px]">rocket_launch</span>
                            </span>
                            <h3 class="text-lg font-bold text-text-header dark:text-white">Phase 4: Optimization</h3>
                            <p class="text-text-main mt-1 text-sm dark:text-slate-400">Ongoing monitoring, scaling, and
                                cost-refinement to ensure peak efficiency.</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div
                                class="rounded-xl bg-slate-50 p-6 shadow-sm border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                <span class="material-symbols-outlined text-4xl text-primary mb-2">speed</span>
                                <div class="text-3xl font-black text-text-header dark:text-white">3x</div>
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Faster Deployment</div>
                            </div>
                            <div class="rounded-xl bg-primary p-6 shadow-sm text-white">
                                <span class="material-symbols-outlined text-4xl text-white/80 mb-2">savings</span>
                                <div class="text-3xl font-black">40%</div>
                                <div class="text-sm font-medium text-white/80">Avg. Cost Reduction</div>
                            </div>
                        </div>
                        <div class="space-y-4 mt-8">
                            <div
                                class="rounded-xl bg-slate-50 p-6 shadow-sm border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                <span class="material-symbols-outlined text-4xl text-primary mb-2">shield_lock</span>
                                <div class="text-3xl font-black text-text-header dark:text-white">99.9%</div>
                                <div class="text-sm font-medium text-slate-500 dark:text-slate-400">SLA Guarantee</div>
                            </div>
                            <div class="rounded-xl bg-slate-900 p-6 shadow-sm text-white border border-slate-800 h-full">
                                <span class="material-symbols-outlined text-4xl text-primary mb-2">support_agent</span>
                                <div class="text-3xl font-black">24/7</div>
                                <div class="text-sm font-medium text-slate-400">Support Coverage</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-background-light dark:bg-background-dark">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-black text-text-header dark:text-white">Designed for Scale</h2>
                <p class="mt-4 text-text-main max-w-2xl mx-auto dark:text-slate-300">See how our infrastructure supports
                    global operations.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-96">
                <div class="md:col-span-2 relative rounded-2xl overflow-hidden h-full group">
                    <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-slate-900/0 transition-all z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                        data-alt="Server rack aisle in a modern data center with blue LED lights"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDBkKPurenLPzO6jElHX1SH6Zjqb0_8icM7LlXFroJ9GKdjGZxLUcJVbN2WzkcIcdBGaHDL5wo_MXDh45RfqfCsK_2OVEaq727JJzpsZ7YHfPqwsMUqzmZjc8t_3n_04nBkIaQX8nYdVtimb8eDuOPjDszDV39pQV4WFexYtUX3VoGsL7clRqboo0WNjSOOHIqYs99lpfcVD581j8QYIFW-pBAiT8Q3JLs2N-ulwc01xj6BIJfWIMCdLT8W-4X8NDUYwcetYeIerfc');">
                    </div>
                    <div class="absolute bottom-4 left-4 z-20">
                        <span
                            class="px-3 py-1 bg-white/90 backdrop-blur rounded text-xs font-bold text-slate-800 shadow">Data
                            Centers</span>
                    </div>
                </div>
                <div class="grid grid-rows-2 gap-4 h-full">
                    <div class="relative rounded-2xl overflow-hidden h-full group">
                        <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-slate-900/0 transition-all z-10"></div>
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                            data-alt="Abstract digital network visualization representing cyber security"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDdplJVGjqaWlW3dbuEGUJ0O8rnT6b9b-i57-gYfZVJcm2k_gTjXXsPSjBPqzkoZ8n3l4EStzvE0P1y9p-jRzdbKKmN94vCc4L9oFyatbqHkCEoSrCw-xs9b3Pyc1rDfFJGYaBZHayq5iOeB5_CBNfBuzcW47BuAYDKO6-6GcNkKeoM8HhQlsJ-y5_ekfe9Ud5KLfd8oLd5esTa30zq9FknMiRT5qdFHYvVrV1bytp3CtBlRabZOAE6Pbz1zpPWIWgXFlhDX_NlNt0');">
                        </div>
                        <div class="absolute bottom-4 left-4 z-20">
                            <span
                                class="px-3 py-1 bg-white/90 backdrop-blur rounded text-xs font-bold text-slate-800 shadow">Security
                                Layer</span>
                        </div>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden h-full group">
                        <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-slate-900/0 transition-all z-10"></div>
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                            data-alt="Digital matrix code overlay on a dark background"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCyv2CiMpFJbzSRrwLZxC3EmtwGhW794sgKN6b9Oi-xFIzhZaLyuRM2pQ6KpsOXV1l3_PVgEMjk7x86naFgPEDeLttzyt8921UX2zE053f9xRXUD2iNrDyZReH-EazUxsLV5iDBn1ZnvOreFfTDyg1X1ts0j_I_IyHGZgDv6bQ-GsgiJVtHTvKOoX0T8AmNEVdB3qf66K8tsyqi3Q74jhXAdKxZKCusGFePiu5E32SyqCuf4rbAUj8ysYWnv2Qox4MdcCaiVxDv_Mg');">
                        </div>
                        <div class="absolute bottom-4 left-4 z-20">
                            <span
                                class="px-3 py-1 bg-white/90 backdrop-blur rounded text-xs font-bold text-slate-800 shadow">Code
                                Efficiency</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20 bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-black text-white sm:text-4xl mb-6">Ready to Accelerate Your Infrastructure?</h2>
            <p class="text-xl text-primary-50 max-w-2xl mx-auto mb-10">
                Stop managing servers and start innovating. Let our team audit your current stack and propose a future-proof
                roadmap.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contact"
                    class="flex h-12 items-center justify-center rounded-lg bg-white px-8 text-base font-bold text-primary transition-all hover:bg-slate-100 shadow-xl">
                    Get Started Now
                </a>
                <a href="/contact"
                    class="flex h-12 items-center justify-center rounded-lg border border-white/30 bg-primary-dark/30 px-8 text-base font-semibold text-white transition-all hover:bg-primary-dark/50">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>
@endsection
