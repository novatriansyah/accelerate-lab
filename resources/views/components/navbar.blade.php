<nav class="fixed top-0 w-full z-50 transition-all duration-300 backdrop-blur-md bg-lab-bg/80 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo3.png') }}" alt="Accelerate Lab" class="h-12 w-auto">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="#about" class="font-mono text-sm hover:text-lab-neon transition-colors">01. About</a>
                    <a href="#services" class="font-mono text-sm hover:text-lab-neon transition-colors">02. Services</a>
                    <a href="#portfolio" class="font-mono text-sm hover:text-lab-neon transition-colors">03. Portfolio</a>
                    <a href="#contact" class="font-mono text-sm hover:text-lab-neon transition-colors">04. Contact</a>
                </div>
            </div>

            <!-- Mobile Menu Button (Simplified for now) -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
