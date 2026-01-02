<nav class="fixed w-full z-50 backdrop-blur-md bg-surface-light/80 dark:bg-background-dark/80 border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="/" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                <span class="text-2xl font-bold tracking-tighter text-slate-700 dark:text-white">Accelerate</span>
                <span class="text-2xl font-light text-primary">/&gt;</span>
                <span class="text-2xl font-bold tracking-tighter text-slate-700 dark:text-white">Lab</span>
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/services">Services</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/case-studies">Case Studies</a>
                <a class="text-sm font-medium hover:text-primary transition-colors" href="/the-lab">The Lab</a>
                <a href="/contact" class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-2.5 rounded-full text-sm font-semibold hover:opacity-90 transition-opacity">
                    Contact Us
                </a>
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400">
                    <span class="material-icons-round text-xl">brightness_4</span>
                </button>
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-500 hover:text-primary focus:outline-none">
                    <span class="material-icons-round text-3xl">menu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-surface-light dark:bg-background-dark border-t border-gray-100 dark:border-gray-800 absolute w-full left-0 top-20 shadow-lg">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors" href="/services">Services</a>
            <a class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors" href="/case-studies">Case Studies</a>
            <a class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors" href="/the-lab">The Lab</a>
            <a class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors" href="/contact">Contact Us</a>

            <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between px-3">
                <span class="text-sm font-medium text-slate-600 dark:text-gray-400">Switch Theme</span>
                <button id="mobile-theme-toggle" class="p-2 rounded-full bg-gray-100 dark:bg-slate-800 text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                    <span class="material-icons-round text-xl">brightness_4</span>
                </button>
            </div>
        </div>
    </div>
</nav>
