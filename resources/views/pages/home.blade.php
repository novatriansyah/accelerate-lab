<x-app-layout>
    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">
        <!-- Grid Background -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>

        <!-- Glowing Orb -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-lab-neon/20 rounded-full blur-[100px]"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <div class="inline-block px-3 py-1 mb-6 border border-lab-neon/30 rounded-full bg-lab-neon/5 backdrop-blur-sm">
                <span class="text-lab-neon text-xs font-mono font-bold tracking-widest uppercase">
                    System Online
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-lab-neon to-lab-accent">Velocity</span>.
            </h1>

            <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                We build high-performance digital products with enterprise quality at startup speed.
                No fluff. Just code that works.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button href="#contact" variant="neon" size="lg">
                    INITIATE PROJECT
                </x-button>
                <x-button href="#portfolio" variant="outline" size="lg">
                    VIEW BLUEPRINTS
                </x-button>
            </div>

            <!-- Code Snippet Decor -->
            <div class="mt-16 mx-auto max-w-3xl bg-lab-bg border border-white/10 rounded-lg p-4 text-left shadow-2xl overflow-hidden hidden md:block opacity-80 hover:opacity-100 transition-opacity">
                <div class="flex gap-2 mb-4 border-b border-white/5 pb-2">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                </div>
                <pre class="font-mono text-sm text-gray-400"><code><span class="text-purple-400">class</span> <span class="text-yellow-300">AccelerateLab</span> <span class="text-purple-400">extends</span> <span class="text-yellow-300">Agency</span>
{
    <span class="text-blue-400">public function</span> <span class="text-green-400">build</span>(<span class="text-yellow-300">$idea</span>): <span class="text-yellow-300">Product</span>
    {
        <span class="text-purple-400">return</span> <span class="text-cyan-400">$this</span>-><span class="text-green-400">optimize</span>(
            <span class="text-cyan-400">$idea</span>-><span class="text-green-400">toMonolith</span>()
        );
    }
}</code></pre>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <x-section id="about" title="THE ARCHITECT" subtitle="High-efficiency engineering is not an accident. It's a method.">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-lab-neon to-lab-accent opacity-20 blur-xl"></div>
                <div class="relative bg-lab-bg border border-white/10 p-8">
                    <h3 class="text-2xl font-bold text-white mb-4 font-mono">NOVA TRIANSYAH AZIS</h3>
                    <p class="text-lab-neon font-mono text-sm mb-6">FOUNDER & LEAD ARCHITECT</p>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        "I don't believe in over-engineering. I believe in shipping."
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        At Accelerate Lab, we cut through the noise of modern web development.
                        We stick to proven, robust stacks like Laravel to deliver value faster than
                        teams twice our size. This isn't just coding; it's a "Dark Mode Lab" for
                        serious builders.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <x-card title="SPEED">
                    <x-slot:icon>
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </x-slot:icon>
                    Rapid prototyping to production-ready code in weeks, not months.
                </x-card>
                <x-card title="STABILITY">
                    <x-slot:icon>
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    </x-slot:icon>
                    Monolith architecture ensures data integrity and easier maintenance.
                </x-card>
                <x-card title="SCALABILITY">
                    <x-slot:icon>
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                    </x-slot:icon>
                    Built to grow with your business, from 100 to 1 million users.
                </x-card>
                <x-card title="PRECISION">
                    <x-slot:icon>
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                    </x-slot:icon>
                    Clean code, strict types, and thorough testing.
                </x-card>
            </div>
        </div>
    </x-section>

    <!-- Services Section -->
    <x-section id="services" title="SERVICES" subtitle="We specialize in the Monolith. A unified, powerful approach." dark="true">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-card title="MVP DEVELOPMENT">
                <x-slot:icon>
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                </x-slot:icon>
                Turn your idea into a working product in record time. We focus on core value features to get you to market fast.
            </x-card>
            <x-card title="LARAVEL ARCHITECTURE">
                <x-slot:icon>
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" /></svg>
                </x-slot:icon>
                Expertly crafted Laravel backends. Modular, testable, and secure. We follow industry best practices and strict coding standards.
            </x-card>
            <x-card title="TAILWIND UI SYSTEMS">
                <x-slot:icon>
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" /></svg>
                </x-slot:icon>
                Beautiful, responsive interfaces built with Tailwind CSS. No bloat, just pixel-perfect designs that load instantly.
            </x-card>
        </div>
    </x-section>

    <!-- Portfolio Section -->
    <x-section id="portfolio" title="PORTFOLIO" subtitle="Recent experiments and deployed systems.">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Project 1 -->
            <div class="group relative bg-lab-bg border border-white/10 aspect-video overflow-hidden hover:border-lab-neon/50 transition-colors">
                <div class="absolute inset-0 bg-gradient-to-t from-lab-bg to-transparent opacity-90 z-10"></div>
                <div class="absolute bottom-0 left-0 p-6 z-20">
                    <h4 class="text-xl font-bold text-white mb-2 group-hover:text-lab-neon transition-colors">PROJECT_ALPHA</h4>
                    <p class="text-sm text-gray-400 mb-4">SaaS Boilerplate for rapid deployment.</p>
                    <span class="text-xs font-mono text-lab-accent border border-lab-accent px-2 py-1 rounded">LARAVEL</span>
                </div>
                <!-- Abstract Code Background -->
                <div class="absolute inset-0 p-4 opacity-30 font-mono text-[10px] text-green-500 overflow-hidden leading-tight">
                    &lt;?php namespace App\Core; class Kernel { protected $bootstrappers = [ \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class, ... ]; }
                </div>
            </div>

             <!-- Project 2 -->
             <div class="group relative bg-lab-bg border border-white/10 aspect-video overflow-hidden hover:border-lab-neon/50 transition-colors">
                <div class="absolute inset-0 bg-gradient-to-t from-lab-bg to-transparent opacity-90 z-10"></div>
                <div class="absolute bottom-0 left-0 p-6 z-20">
                    <h4 class="text-xl font-bold text-white mb-2 group-hover:text-lab-neon transition-colors">NEXUS_CRM</h4>
                    <p class="text-sm text-gray-400 mb-4">Custom CRM for high-volume logistics.</p>
                    <span class="text-xs font-mono text-lab-accent border border-lab-accent px-2 py-1 rounded">LIVEWIRE</span>
                </div>
                 <!-- Abstract Grid Background -->
                 <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black opacity-40"></div>
            </div>

             <!-- Project 3 -->
             <div class="group relative bg-lab-bg border border-white/10 aspect-video overflow-hidden hover:border-lab-neon/50 transition-colors">
                <div class="absolute inset-0 bg-gradient-to-t from-lab-bg to-transparent opacity-90 z-10"></div>
                <div class="absolute bottom-0 left-0 p-6 z-20">
                    <h4 class="text-xl font-bold text-white mb-2 group-hover:text-lab-neon transition-colors">VORTEX_API</h4>
                    <p class="text-sm text-gray-400 mb-4">High-performance REST API gateway.</p>
                    <span class="text-xs font-mono text-lab-accent border border-lab-accent px-2 py-1 rounded">PHP 8.2</span>
                </div>
                 <!-- Abstract Lines -->
                 <div class="absolute inset-0 flex items-center justify-center opacity-20">
                     <div class="w-full h-px bg-white rotate-45"></div>
                     <div class="w-full h-px bg-white -rotate-45"></div>
                 </div>
            </div>
        </div>
        <div class="mt-12 text-center">
            <x-button variant="outline">VIEW ALL PROJECTS</x-button>
        </div>
    </x-section>

    <!-- Contact Section -->
    <x-section id="contact" title="CONTACT" subtitle="Ready to accelerate? Initialize connection." dark="true">
        <div class="max-w-2xl mx-auto bg-lab-bg border border-white/10 p-8 md:p-12 relative overflow-hidden">
            <!-- Decorative corner accents -->
            <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-lab-neon"></div>
            <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-lab-neon"></div>
            <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-lab-neon"></div>
            <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-lab-neon"></div>

            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-mono text-lab-neon mb-2 uppercase tracking-wider">Name</label>
                        <input type="text" id="name" class="w-full bg-black/50 border border-white/20 p-3 text-white focus:border-lab-neon focus:ring-1 focus:ring-lab-neon outline-none transition-colors" placeholder="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-mono text-lab-neon mb-2 uppercase tracking-wider">Email</label>
                        <input type="email" id="email" class="w-full bg-black/50 border border-white/20 p-3 text-white focus:border-lab-neon focus:ring-1 focus:ring-lab-neon outline-none transition-colors" placeholder="john@example.com">
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-xs font-mono text-lab-neon mb-2 uppercase tracking-wider">Project Brief</label>
                    <textarea id="message" rows="4" class="w-full bg-black/50 border border-white/20 p-3 text-white focus:border-lab-neon focus:ring-1 focus:ring-lab-neon outline-none transition-colors" placeholder="Tell us about your architectural needs..."></textarea>
                </div>

                <div class="flex justify-end">
                    <x-button variant="neon">SEND TRANSMISSION</x-button>
                </div>
            </form>

            <div class="mt-12 pt-8 border-t border-white/10 text-center">
                <p class="text-gray-400 text-sm mb-4">Or connect directly via secure channels:</p>
                <div class="flex justify-center space-x-6">
                    <a href="#" class="text-gray-400 hover:text-lab-neon transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.997 3.655 4.74-1.988z"/></svg>
                        WhatsApp
                    </a>
                    <a href="#" class="text-gray-400 hover:text-lab-neon transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        Email
                    </a>
                </div>
            </div>
        </div>
    </x-section>
</x-app-layout>
