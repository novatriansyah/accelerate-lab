<header role="banner" class="relative z-50">
@php
    $currentLocale = app()->getLocale();
@endphp
    {{-- NextSaaS Authentic Floating Island Capsule Navbar --}}
    <div id="floating-island-navbar"
         x-data="{ isOpen: false }"
         class="fixed top-5 left-1/2 -translate-x-1/2 z-50 mx-auto flex w-[92%] max-w-[1140px] items-center justify-between rounded-full bg-slate-900/85 backdrop-blur-xl border border-white/10 px-4 sm:px-6 py-2.5 shadow-2xl transition-all duration-300">
        
        {{-- Brand Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <span class="size-10 rounded-full bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 group-hover:scale-105 transition-transform">
                <x-app-icon name="brand-rocket" class="size-5 text-teal-400" />
            </span>
            <span class="font-bold tracking-tight text-lg text-white font-instrumentsans">
                Accelerate<span class="text-teal-400">Lab</span>
            </span>
        </a>

        {{-- Desktop Navigation Links --}}
        <nav aria-label="Main navigation" class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('home') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Beranda' : 'Home' }}
            </a>
            <a href="{{ route('about') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('about') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Tentang' : 'About' }}
            </a>
            <a href="{{ route('services') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('services') || request()->routeIs('service') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Layanan' : 'Services' }}
            </a>
            <a href="{{ route('case-studies') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('case-studies') || request()->routeIs('project') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Studi Kasus' : 'Case Studies' }}
            </a>
            <a href="{{ route('contact') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('contact') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ $currentLocale === 'id' ? 'Kontak' : 'Contact' }}
            </a>
        </nav>

        {{-- Right Actions: Locale Toggle, Consultation, Theme & Redox Kinetic .rr-btn --}}
        <div class="flex items-center gap-2 sm:gap-3">
            {{-- Language Switcher Toggle --}}
            <div class="inline-flex items-center bg-slate-800/80 p-0.5 rounded-full border border-white/10 text-xs font-bold">
                <a href="/lang/id" 
                   aria-label="Switch language to Indonesian"
                   class="min-h-[44px] min-w-[44px] flex items-center justify-center px-2.5 py-1 rounded-full transition-colors {{ $currentLocale === 'id' ? 'bg-teal-500 text-slate-900 shadow-sm font-bold' : 'text-slate-400 hover:text-white' }}">
                    ID
                </a>
                <a href="/lang/en" 
                   aria-label="Switch language to English"
                   class="min-h-[44px] min-w-[44px] flex items-center justify-center px-2.5 py-1 rounded-full transition-colors {{ $currentLocale === 'en' ? 'bg-teal-500 text-slate-900 shadow-sm font-bold' : 'text-slate-400 hover:text-white' }}">
                    EN
                </a>
            </div>

            {{-- Consultation Modal Trigger --}}
            <button type="button" 
                    @click="$dispatch('open-consultation-modal')" 
                    class="hidden xl:inline-flex items-center gap-1.5 text-xs font-bold text-slate-300 hover:text-teal-400 px-3 py-1.5 rounded-full hover:bg-white/5 transition-all">
                <x-app-icon name="calendar_today" class="size-3.5 text-teal-400" />
                <span>{{ __('15-Min Free Call') }}</span>
            </button>

            {{-- Dark Mode Toggle --}}
            <button type="button"
                    class="theme-toggle-btn p-2 rounded-full hover:bg-white/10 text-slate-300 hover:text-teal-400 transition-colors"
                    aria-label="Toggle dark mode">
                <x-app-icon name="brightness_4" class="size-4 text-slate-300" />
            </button>

            {{-- Redox Kinetic CTA Button --}}
            <a href="{{ route('contact') }}" id="nav-contact-btn" class="rr-btn hidden sm:inline-flex text-xs !py-2.5 !px-5">
                <span class="btn-wrap">
                    <span class="text-one">{{ $currentLocale === 'id' ? 'Konsultasi Proyek' : 'Project Consultation' }}</span>
                    <span class="text-two">{{ $currentLocale === 'id' ? 'Konsultasi Proyek' : 'Project Consultation' }}</span>
                </span>
            </a>

            {{-- Mobile Hamburger Button --}}
            <button @click="isOpen = !isOpen"
                    type="button"
                    class="md:hidden text-slate-300 hover:text-white p-2 rounded-full hover:bg-white/10 focus:outline-none"
                    aria-label="Toggle navigation menu"
                    x-bind:aria-expanded="isOpen.toString()">
                <x-app-icon name="menu" class="size-6 text-slate-300" />
            </button>
        </div>

        {{-- Mobile Dropdown Menu --}}
        <div x-show="isOpen"
             @click.away="isOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
             class="md:hidden absolute top-full left-0 right-0 mt-3 p-4 rounded-3xl bg-slate-900/95 backdrop-blur-2xl border border-white/10 shadow-2xl space-y-2">
            <a href="{{ route('home') }}"
               class="block px-4 py-3 rounded-2xl text-sm font-medium text-slate-200 hover:bg-white/10 hover:text-teal-400 transition-colors">
                {{ $currentLocale === 'id' ? 'Beranda' : 'Home' }}
            </a>
            <a href="{{ route('about') }}"
               class="block px-4 py-3 rounded-2xl text-sm font-medium text-slate-200 hover:bg-white/10 hover:text-teal-400 transition-colors">
                {{ $currentLocale === 'id' ? 'Tentang' : 'About' }}
            </a>
            <a href="{{ route('services') }}"
               class="block px-4 py-3 rounded-2xl text-sm font-medium text-slate-200 hover:bg-white/10 hover:text-teal-400 transition-colors">
                {{ $currentLocale === 'id' ? 'Layanan' : 'Services' }}
            </a>
            <a href="{{ route('case-studies') }}"
               class="block px-4 py-3 rounded-2xl text-sm font-medium text-slate-200 hover:bg-white/10 hover:text-teal-400 transition-colors">
                {{ $currentLocale === 'id' ? 'Studi Kasus' : 'Case Studies' }}
            </a>
            <a href="{{ route('contact') }}"
               class="block px-4 py-3 rounded-2xl text-sm font-medium text-slate-200 hover:bg-white/10 hover:text-teal-400 transition-colors">
                {{ $currentLocale === 'id' ? 'Kontak' : 'Contact' }}
            </a>
            <div class="pt-2 border-t border-white/10">
                <a href="{{ route('contact') }}" class="rr-btn w-full text-center !py-3 !text-sm">
                    <span class="btn-wrap">
                        <span class="text-one">{{ $currentLocale === 'id' ? 'Konsultasi Proyek' : 'Project Consultation' }}</span>
                        <span class="text-two">{{ $currentLocale === 'id' ? 'Konsultasi Proyek' : 'Project Consultation' }}</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>
