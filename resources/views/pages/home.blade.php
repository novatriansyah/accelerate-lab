<x-app-layout>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-16 overflow-hidden">
        <!-- Grid Background -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBMMCAwTDQwIDAiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzAzMDcxNyIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIiAvPjwvc3ZnPg==')] opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-lab-bg"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-mono text-lab-neon text-sm md:text-base mb-4 tracking-widest uppercase animate-pulse">
                &lt;Principal-Led_Engineering /&gt;
            </h1>
            <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white mb-6">
                Constructing <span class="text-transparent bg-clip-text bg-gradient-to-r from-lab-neon to-lab-accent">Digital Velocity.</span>
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-400">
                Scientific precision meets startup agility. We architect scalable systems that drive business momentum.
            </p>
            <div class="mt-10 flex justify-center gap-4">
                <x-button href="#contact" variant="primary">
                    Start Protocol
                </x-button>
                <x-button href="#portfolio" variant="outline">
                    Examine Blueprints
                </x-button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <x-section id="about" class="bg-slate-950">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="font-mono text-lab-neon text-lg mb-2">01. The Architect</h3>
                <h2 class="text-3xl font-bold text-white mb-6">Nova Triansyah Azis</h2>
                <div class="prose prose-invert text-slate-400">
                    <p class="mb-4">
                        Founder & Principal Engineer at Accelerate Lab. I operate at the intersection of rigorous engineering and business strategy.
                    </p>
                    <p>
                        As a <strong>"Principal-Led" firm</strong>, you work directly with the architect who designs your system. My methodology treats software as a scientific blueprint—every component is justified, every line of code serves a purpose. Whether deploying a high-velocity monolith or orchestrating a distributed system, the goal remains constant: <strong>Maximum Efficiency, Zero Friction.</strong>
                    </p>
                </div>
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="border-l-2 border-lab-neon pl-4">
                        <span class="block text-2xl font-bold text-white">5+</span>
                        <span class="text-sm text-slate-500 font-mono">Years Exp.</span>
                    </div>
                    <div class="border-l-2 border-lab-accent pl-4">
                        <span class="block text-2xl font-bold text-white">100%</span>
                        <span class="text-sm text-slate-500 font-mono">Success Rate</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-lab-neon/20 blur-3xl rounded-full opacity-20"></div>
                <div class="relative bg-slate-900 border border-slate-800 rounded-lg p-8">
                    <div class="absolute top-0 right-0 -mt-3 -mr-3 px-2 py-1 bg-lab-accent text-xs font-mono text-white rounded">
                        Blueprint.php
                    </div>
                    <pre class="font-mono text-xs text-lab-neon overflow-x-auto">
class PrincipalEngineer extends Architect
{
    /**
     * Execution Strategy.
     */
    public function deploy(): System
    {
        return $this->analyze('Requirements')
                    ->architect('Scalability')
                    ->implement('Precision')
                    ->ensure('Velocity');
    }
}
                    </pre>
                </div>
            </div>
        </div>
    </x-section>

    <!-- Services Section -->
    <x-section id="services">
        <div class="text-center mb-16">
            <h3 class="font-mono text-lab-neon text-lg mb-2">02. Services</h3>
            <h2 class="text-3xl font-bold text-white">Core Capabilities</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <x-card>
                <div class="h-12 w-12 bg-lab-neon/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-lab-neon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Custom Architecture</h4>
                <p class="text-slate-400 text-sm">
                    We don't believe in one-size-fits-all. From unified Monoliths to distributed Microservices, we build the architecture that fits your scale and business goals.
                </p>
            </x-card>

            <x-card>
                <div class="h-12 w-12 bg-purple-500/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Speed & Velocity</h4>
                <p class="text-slate-400 text-sm">
                    Our "Speed Monolith" standard ensures lightning-fast load times and rapid development cycles. We ship features, not boilerplate.
                </p>
            </x-card>

            <x-card>
                <div class="h-12 w-12 bg-lab-accent/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-lab-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Rapid MVP</h4>
                <p class="text-slate-400 text-sm">
                    From concept to launch in weeks. We validate your business ideas with production-grade code that doesn't need a rewrite.
                </p>
            </x-card>
        </div>
    </x-section>

    <!-- Portfolio Section -->
    <x-section id="portfolio" class="bg-slate-950">
        <div class="text-center mb-16">
            <h3 class="font-mono text-lab-neon text-lg mb-2">03. Portfolio</h3>
            <h2 class="text-3xl font-bold text-white">Recent Deployments</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Project 1: Sahabat Farm -->
            <a href="https://sahabatfarmindonesia.com/" target="_blank" class="group relative aspect-video bg-slate-900 rounded-lg overflow-hidden border border-slate-800 hover:border-lab-neon transition-all block">
                <img src="{{ asset('images/sahabat-farm.png') }}" alt="Sahabat Farm" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent opacity-90 group-hover:opacity-0 transition-opacity duration-500"></div>

                <div class="absolute inset-0 flex flex-col justify-end p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                    <div class="bg-slate-950/90 p-4 rounded-lg border border-slate-800 backdrop-blur-sm">
                        <h4 class="text-white font-bold text-lg group-hover:text-lab-neon transition-colors">Sahabat Farm Indonesia</h4>
                        <p class="text-xs text-lab-neon font-mono mt-1">IoT Ecosystem / AgriTech</p>
                        <p class="text-xs text-slate-400 mt-2 line-clamp-2">
                            Integrated IoT ecosystem for precision farming. Features real-time sensor monitoring, automated control systems, and data analytics for agricultural optimization.
                        </p>
                        <div class="mt-2 flex items-center text-xs text-lab-neon opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="mr-1">View Deployment</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Project 2: AccelerateLab CRM -->
            <a href="#" class="group relative aspect-video bg-slate-900 rounded-lg overflow-hidden border border-slate-800 hover:border-lab-neon transition-all block">
                <img src="{{ asset('images/crm-dashboard.png') }}" alt="AccelerateLab CRM" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent opacity-90 group-hover:opacity-0 transition-opacity duration-500"></div>

                <div class="absolute inset-0 flex flex-col justify-end p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                    <div class="bg-slate-950/90 p-4 rounded-lg border border-slate-800 backdrop-blur-sm">
                        <h4 class="text-white font-bold text-lg group-hover:text-lab-neon transition-colors">Agency CRM System</h4>
                        <p class="text-xs text-lab-neon font-mono mt-1">Laravel 11 / Tailwind / Workflow</p>
                        <p class="text-xs text-slate-400 mt-2 line-clamp-2">
                            Comprehensive agency management system handling client pipelines, project tracking, invoicing, and performance analytics in a unified dashboard.
                        </p>
                        <div class="mt-2 flex items-center text-xs text-lab-neon opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="mr-1">View Deployment</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Project 3: ERP System (Internal/Confidential) -->
            <div class="group relative aspect-video bg-slate-900 rounded-lg overflow-hidden border border-slate-800 hover:border-lab-neon transition-all">
                <!-- Abstract Blueprint Visual -->
                <div class="absolute inset-0 bg-slate-900 flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTEgMWgydjJIMUMxeiIgZmlsbD0iIzA2YjZkNCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+')]"></div>
                    <div class="w-32 h-32 border-2 border-dashed border-lab-neon/30 rounded-full animate-[spin_10s_linear_infinite]"></div>
                    <div class="absolute w-24 h-24 border border-lab-accent/30 rounded-full animate-[spin_15s_linear_infinite_reverse]"></div>
                    <svg class="w-12 h-12 text-slate-500 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>

                <div class="absolute inset-0 flex flex-col justify-end p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                    <div class="bg-slate-950/90 p-4 rounded-lg border border-slate-800 backdrop-blur-sm">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-white font-bold text-lg">Enterprise ERP Core</h4>
                                <p class="text-xs text-lab-neon font-mono mt-1">BI / Finance / High-Performance</p>
                            </div>
                            <span class="px-2 py-1 bg-lab-accent/20 text-lab-accent text-[10px] font-mono rounded border border-lab-accent/30">INTERNAL</span>
                        </div>
                        <p class="text-xs text-slate-400 mt-2 line-clamp-2">
                            A high-performance monolithic ERP handling complex financial logic, inventory, and business intelligence. Optimized for millions of transactions.
                        </p>
                        <div class="mt-3">
                            <button disabled class="text-xs border border-slate-700 text-slate-500 px-3 py-1 rounded cursor-not-allowed font-mono hover:bg-slate-900">
                                Access Restricted // Request Demo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-section>

    <!-- Contact Section -->
    <x-section id="contact">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h3 class="font-mono text-lab-neon text-lg mb-2">04. Contact</h3>
            <h2 class="text-3xl font-bold text-white">Start the Reaction</h2>
            <p class="mt-4 text-slate-400">
                Ready to accelerate your project? Send a transmission.
            </p>
        </div>

        <div class="max-w-xl mx-auto bg-slate-900/50 p-8 rounded-lg border border-slate-800 backdrop-blur-sm">
            <form class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-mono text-slate-400">Email Address</label>
                    <input type="email" id="email" class="mt-1 block w-full rounded-md bg-slate-950 border-slate-800 text-white focus:border-lab-neon focus:ring-lab-neon sm:text-sm p-3">
                </div>
                <div>
                    <label for="message" class="block text-sm font-mono text-slate-400">Message</label>
                    <textarea id="message" rows="4" class="mt-1 block w-full rounded-md bg-slate-950 border-slate-800 text-white focus:border-lab-neon focus:ring-lab-neon sm:text-sm p-3"></textarea>
                </div>
                <x-button class="w-full justify-center">
                    Send Transmission
                </x-button>
            </form>

            <div class="mt-8 pt-8 border-t border-slate-800 text-center">
                <p class="text-slate-500 text-sm mb-4">Or connect directly:</p>
                <div class="flex justify-center space-x-6">
                     <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center space-x-2 text-green-500 hover:text-green-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <span class="font-mono">WhatsApp</span>
                    </a>
                    <a href="mailto:nova@acceleratelab.id" class="flex items-center space-x-2 text-lab-neon hover:text-white transition-colors font-mono">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Email</span>
                    </a>
                </div>
            </div>
        </div>
    </x-section>

</x-app-layout>
