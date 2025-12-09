<header class="fixed top-0 w-full z-50 bg-lab-bg/80 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-mono font-bold text-lab-neon tracking-tighter">
                    ACCELERATE<span class="text-white">_LAB</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#about" class="text-sm font-medium text-gray-300 hover:text-lab-neon transition-colors">/ABOUT</a>
                <a href="#services" class="text-sm font-medium text-gray-300 hover:text-lab-neon transition-colors">/SERVICES</a>
                <a href="#portfolio" class="text-sm font-medium text-gray-300 hover:text-lab-neon transition-colors">/PORTFOLIO</a>
                <a href="#contact" class="text-sm font-medium text-gray-300 hover:text-lab-neon transition-colors">/CONTACT</a>
                <x-button href="#contact" variant="neon" size="sm">START PROJECT</x-button>
            </div>

            <!-- Mobile Menu Button (Placeholder) -->
            <div class="md:hidden flex items-center">
                <button class="text-gray-300 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
