<nav x-data="{ isOpen: false }"
    class="fixed w-full z-50 backdrop-blur-md bg-surface-light/80 dark:bg-background-dark/80 border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="/" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                <img src="{{ asset('images/logo.webp') }}" alt="Accelerate Lab" class="h-14 w-auto" width="200" height="56" fetchpriority="high">
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/services">Services</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/case-studies">Case
                    Studies</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/about">About</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/blog">Blog</a>
                <a href="/contact"
                    class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-2.5 rounded-full text-sm font-semibold hover:opacity-90 transition-opacity">
                    Contact Us
                </a>
                <button
                    class="theme-toggle-btn p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400">
                    <span class="material-icons-round text-xl">brightness_4</span>
                </button>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="isOpen = !isOpen" class="text-gray-500 hover:text-primary focus:outline-none">
                    <span class="material-icons-round text-3xl">menu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-white/95 dark:bg-background-dark/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 absolute w-full left-0 top-20 shadow-lg">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="/services"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors">Services</a>
            <a href="/case-studies"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors">Case
                Studies</a>
            <a href="/about"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors">About</a>
            <a href="/blog"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors">Blog</a>
            <a href="/careers"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors">Careers</a>
            <div
                class="flex items-center justify-between px-3 py-3 rounded-md text-base font-medium text-gray-900 dark:text-white">
                <span>Change Theme</span>
                <button
                    class="theme-toggle-btn p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400">
                    <span class="material-icons-round text-xl">brightness_4</span>
                </button>
            </div>
            <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-800">
                <a href="/contact"
                    class="block w-full text-center bg-primary text-white px-5 py-3 rounded-xl font-bold shadow-lg shadow-primary/20">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</nav>
