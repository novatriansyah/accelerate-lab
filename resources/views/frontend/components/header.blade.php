@php
    $currentLocale = app()->getLocale();
@endphp

<header role="banner" class="relative z-50">
    {{-- Accelerate Lab Floating Island Capsule Navbar --}}
    <div id="floating-island-navbar"
         x-data="{ isOpen: false }"
         class="fixed top-5 left-1/2 -translate-x-1/2 z-50 mx-auto flex w-[92%] max-w-[1140px] items-center justify-between rounded-full bg-white/85 dark:bg-[#090D16]/85 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 px-4 sm:px-6 py-2.5 shadow-xl shadow-slate-900/5 dark:shadow-2xl transition-all duration-300">
        
        {{-- Brand Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 group" aria-label="Accelerate Lab - Home">
            <div class="flex items-center gap-1 font-instrumentsans text-xl font-bold tracking-tight">
                <span class="text-slate-900 dark:text-white transition-colors">Accelerate</span>
                <span class="text-[#00BFA5] font-mono font-normal" aria-hidden="true">/&gt;</span>
                <span class="text-slate-900 dark:text-white transition-colors">Lab</span>
            </div>
        </a>

        {{-- Desktop Navigation Links --}}
        <nav aria-label="Main navigation" class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('home') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Beranda' : 'Home' }}
            </a>
            <a href="{{ route('about') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('about') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Tentang' : 'About' }}
            </a>
            <a href="{{ route('services') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('services') || request()->routeIs('service') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Layanan' : 'Services' }}
            </a>
            <a href="{{ route('case-studies') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('case-studies') || request()->routeIs('project') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Studi Kasus' : 'Case Studies' }}
            </a>
            <a href="{{ route('careers') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('careers') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Karir' : 'Careers' }}
            </a>
            <a href="{{ route('contact') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('contact') ? 'bg-slate-100 dark:bg-white/10 text-slate-900 dark:text-white font-semibold' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/60 dark:hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Kontak' : 'Contact' }}
            </a>
        </nav>

        {{-- Desktop Action Tools (Theme Toggle, Language Switcher, Kinetic CTA) --}}
        <div class="hidden md:flex items-center gap-3">
            {{-- Theme Toggle Button --}}
            <button id="theme-toggle-btn"
                    onclick="toggleTheme()"
                    type="button"
                    class="p-2 rounded-full text-slate-500 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/10 transition-colors focus:outline-none"
                    aria-label="Toggle dark mode">
                {{-- Sun Icon (shown in dark mode) --}}
                <svg class="hidden dark:block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                {{-- Moon Icon (shown in light mode) --}}
                <svg class="block dark:hidden w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>

            {{-- Locale Toggle --}}
            <div class="text-xs font-mono font-medium text-slate-400 flex items-center gap-1 border-r border-slate-200 dark:border-white/10 pr-3">
                <a href="{{ route('lang.switch', 'id') }}" class="{{ $currentLocale === 'id' ? 'text-[#00BFA5] font-bold' : 'hover:text-slate-600 dark:hover:text-slate-200' }}">ID</a>
                <span>/</span>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ $currentLocale === 'en' ? 'text-[#00BFA5] font-bold' : 'hover:text-slate-600 dark:hover:text-slate-200' }}">EN</a>
            </div>

            {{-- Kinetic CTA Button --}}
            <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-5 py-2 text-xs">
                <span class="btn-wrap">
                    <span class="text-1">{{ $currentLocale === 'id' ? 'Mulai Proyek' : 'Start a Project' }}</span>
                    <span class="text-2">{{ $currentLocale === 'id' ? 'Hubungi Kami' : 'Get in Touch' }}</span>
                </span>
            </a>
        </div>

        {{-- Mobile Hamburger & Actions --}}
        <div class="flex items-center gap-2 md:hidden">
            <button onclick="toggleTheme()" type="button" class="p-2 rounded-full text-slate-500 dark:text-slate-400" aria-label="Toggle dark mode">
                <svg class="hidden dark:block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg class="block dark:hidden w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
            <button @click="isOpen = !isOpen" type="button" class="p-2 rounded-full text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-white/10" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Dropdown Drawer --}}
        <div x-show="isOpen"
             @click.away="isOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
             class="absolute top-16 left-0 w-full rounded-3xl bg-white/95 dark:bg-[#090D16]/95 backdrop-blur-2xl border border-slate-200/80 dark:border-white/10 p-6 shadow-2xl flex flex-col gap-3 md:hidden">
            <a href="{{ route('home') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Beranda' : 'Home' }}
            </a>
            <a href="{{ route('about') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Tentang' : 'About' }}
            </a>
            <a href="{{ route('services') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Layanan' : 'Services' }}
            </a>
            <a href="{{ route('case-studies') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Studi Kasus' : 'Case Studies' }}
            </a>
            <a href="{{ route('careers') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Karir' : 'Careers' }}
            </a>
            <a href="{{ route('contact') }}" @click="isOpen = false" class="py-2 text-base font-medium text-slate-800 dark:text-slate-200 hover:text-[#00BFA5]">
                {{ $currentLocale === 'id' ? 'Kontak' : 'Contact' }}
            </a>
            <div class="pt-4 border-t border-slate-200 dark:border-white/10 flex items-center justify-between">
                <div class="text-xs font-mono text-slate-400">
                    Language:
                    <a href="{{ route('lang.switch', 'id') }}" class="{{ $currentLocale === 'id' ? 'text-[#00BFA5] font-bold' : '' }}">ID</a> /
                    <a href="{{ route('lang.switch', 'en') }}" class="{{ $currentLocale === 'en' ? 'text-[#00BFA5] font-bold' : '' }}">EN</a>
                </div>
                <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-4 py-2 text-xs">
                    <span class="btn-wrap">
                        <span class="text-1">{{ $currentLocale === 'id' ? 'Mulai Proyek' : 'Start a Project' }}</span>
                        <span class="text-2">{{ $currentLocale === 'id' ? 'Hubungi Kami' : 'Get in Touch' }}</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>
