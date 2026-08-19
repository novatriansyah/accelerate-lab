<header role="banner">
@php
    $currentLocale = app()->getLocale();
@endphp
<nav x-data="{ isOpen: false }" aria-label="Main navigation"
    class="fixed w-full z-50 backdrop-blur-md bg-surface-light/80 dark:bg-background-dark/80 border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="/" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                <img src="{{ !empty($settings['site_logo'] ?? null) ? ((filter_var($settings['site_logo'], FILTER_VALIDATE_URL)) ? $settings['site_logo'] : asset($settings['site_logo'])) : asset('images/logo.webp') }}" alt="Accelerate Lab" class="h-14 w-auto" width="200" height="56" fetchpriority="high">
            </a>
            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a class="text-sm font-medium hover:text-primary transition-colors {{ request()->is('services*') ? 'text-primary' : '' }}" href="/services">{{ __('Services') }}</a>
                <a class="text-sm font-medium hover:text-primary transition-colors {{ request()->is('case-studies*') ? 'text-primary' : '' }}" href="/case-studies">{{ __('Case Studies') }}</a>
                <a class="text-sm font-medium hover:text-primary transition-colors {{ request()->is('about') ? 'text-primary' : '' }}" href="/about">{{ __('About') }}</a>
                <a class="text-sm font-medium hover:text-primary transition-colors {{ request()->is('blog*') ? 'text-primary' : '' }}" href="/blog">{{ __('Blog') }}</a>
                
                <button type="button" 
                    @click="$dispatch('open-consultation-modal')" 
                    class="text-xs lg:text-sm font-bold text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary flex items-center gap-1.5 transition-colors py-1.5 px-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <x-app-icon name="calendar_today" class="w-4 h-4 text-primary" />
                    <span>{{ __('15-Min Free Call') }}</span>
                </button>

                <a href="/contact" id="nav-contact-btn"
                    class="bg-primary text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-primary-hover transition-all shadow-md shadow-primary/20">
                    {{ __('Get an Estimate') }}
                </a>

                <!-- Language Switcher Toggle -->
                <div class="inline-flex items-center bg-slate-100 dark:bg-slate-800 p-0.5 rounded-full border border-slate-200 dark:border-slate-700 text-xs font-bold">
                    <a href="/lang/id" 
                       aria-label="Switch language to Indonesian"
                       class="px-2.5 py-1 rounded-full transition-colors {{ $currentLocale === 'id' ? 'bg-white dark:bg-surface-dark text-primary shadow-sm' : 'text-slate-500 dark:text-gray-400 hover:text-slate-800 dark:hover:text-white' }}">
                        ID
                    </a>
                    <a href="/lang/en" 
                       aria-label="Switch language to English"
                       class="px-2.5 py-1 rounded-full transition-colors {{ $currentLocale === 'en' ? 'bg-white dark:bg-surface-dark text-primary shadow-sm' : 'text-slate-500 dark:text-gray-400 hover:text-slate-800 dark:hover:text-white' }}">
                        EN
                    </a>
                </div>

                <button
                    class="theme-toggle-btn p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300"
                    aria-label="Toggle dark mode">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-2.98 0-5.4-2.42-5.4-5.4 0-1.81.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z"/></svg>
                </button>
            </div>
            <div class="md:hidden flex items-center gap-2">
                <!-- Mobile Language Switcher Toggle -->
                <div class="inline-flex items-center bg-slate-100 dark:bg-slate-800 p-0.5 rounded-full border border-slate-200 dark:border-slate-700 text-xs font-bold">
                    <a href="/lang/id" class="px-2 py-0.5 rounded-full {{ $currentLocale === 'id' ? 'bg-white dark:bg-surface-dark text-primary shadow-sm' : 'text-slate-500' }}">ID</a>
                    <a href="/lang/en" class="px-2 py-0.5 rounded-full {{ $currentLocale === 'en' ? 'bg-white dark:bg-surface-dark text-primary shadow-sm' : 'text-slate-500' }}">EN</a>
                </div>
                <button @click="isOpen = !isOpen"
                    class="text-gray-600 dark:text-gray-300 hover:text-primary focus:outline-none p-2"
                    aria-label="Toggle navigation menu"
                    x-bind:aria-expanded="isOpen.toString()">
                    <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-white/95 dark:bg-background-dark/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 absolute w-full left-0 top-20 shadow-lg"
        id="mobile-menu" role="menu">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="/services"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors" role="menuitem">{{ __('Services') }}</a>
            <a href="/case-studies"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors" role="menuitem">{{ __('Case Studies') }}</a>
            <a href="/about"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors" role="menuitem">{{ __('About') }}</a>
            <a href="/blog"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors" role="menuitem">{{ __('Blog') }}</a>
            <a href="/careers"
                class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-primary transition-colors" role="menuitem">{{ __('Careers') }}</a>
            <div
                class="flex items-center justify-between px-3 py-3 rounded-md text-base font-medium text-gray-900 dark:text-white">
                <span>Change Theme</span>
                <button
                    class="theme-toggle-btn p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-500 dark:text-gray-400"
                    aria-label="Toggle dark mode">
                    <x-app-icon name="brightness_4" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </button>
            </div>
            <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-800 flex flex-col gap-2.5">
                <button type="button" 
                    @click="isOpen = false; $dispatch('open-consultation-modal')" 
                    class="w-full text-center border border-primary text-primary px-5 py-3 rounded-xl font-bold hover:bg-primary/5 transition-colors flex items-center justify-center gap-2">
                    <x-app-icon name="calendar_today" class="w-4 h-4 text-primary" />
                    <span>{{ __('Book 15-Min Free Call') }}</span>
                </button>
                <a href="/contact"
                    class="block w-full text-center bg-primary text-white px-5 py-3 rounded-xl font-bold shadow-lg shadow-primary/20" role="menuitem">
                    {{ __('Get an Estimate') }}
                </a>
            </div>
        </div>
    </div>
</nav>
</header>
