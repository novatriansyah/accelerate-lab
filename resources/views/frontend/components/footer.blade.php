<footer class="bg-surface-light dark:bg-background-dark border-t border-gray-200 dark:border-gray-800 pt-16 pb-8" role="contentinfo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div class="space-y-4">
                <a href="/" class="flex items-center gap-1 text-slate-700 dark:text-white" aria-label="Accelerate Lab - Home">
                    <span class="text-xl font-bold tracking-tighter">Accelerate</span>
                    <span class="text-xl font-light text-primary" aria-hidden="true">/&gt;</span>
                    <span class="text-xl font-bold tracking-tighter">Lab</span>
                </a>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                    Building the future of digital products with precision, speed, and cutting-edge technology.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a class="text-slate-300 hover:text-primary transition-colors" href="/" aria-label="Website">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 0 0-1.38-3.56A8.03 8.03 0 0 1 18.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A8.03 8.03 0 0 1 5.08 16zm2.95-8H5.08a8.03 8.03 0 0 1 4.54-3.56A15.65 15.65 0 0 0 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM4.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 0 1-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"/></svg>
                    </a>
                    <a class="text-slate-300 hover:text-primary transition-colors" href="/blog" aria-label="The Lab - Code & Innovation">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>
                    </a>
                    <a class="text-slate-300 hover:text-primary transition-colors" href="/contact" aria-label="Contact us via email">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    </a>
                </div>
            </div>
            <nav aria-label="Footer services navigation">
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Services</h4>
                <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-300">
                    @if (isset($globalServices) && $globalServices->count() > 0)
                        @foreach ($globalServices as $service)
                            <li><a class="hover:text-primary transition-colors"
                                    href="{{ route('service', $service) }}">{{ $service->title }}</a></li>
                        @endforeach
                    @else
                        <li><a class="hover:text-primary transition-colors" href="/services">Web Application Dev</a>
                        </li>
                        <li><a class="hover:text-primary transition-colors" href="/services">Mobile Development</a></li>
                    @endif
                </ul>
            </nav>
            <nav aria-label="Footer company navigation">
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Company</h4>
                <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                    <li><a class="hover:text-primary transition-colors" href="/about">About Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/careers">Careers</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/case-studies">Case Studies</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/blog">Blog</a></li>
                </ul>
            </nav>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Legal Entity
                </h4>
                @if (!empty($settings['legal_name'] ?? null))
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 fill-current text-slate-400 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                                {{ $settings['legal_name'] }}</p>
                            @if (!empty($settings['registered_city'] ?? null))
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Registered in {{ $settings['registered_city'] }}.
                                </p>
                            @endif
                            @if (!empty($settings['reg_number'] ?? null))
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $settings['reg_number'] }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div
            class="border-t border-gray-200 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs text-slate-500 text-center md:text-left">
                © {{ date('Y') }} Accelerate Lab. All rights reserved.
                @if (!empty($settings['legal_name'] ?? null))
                    <span class="hidden sm:inline">|</span> A brand by {{ $settings['legal_name'] }}.
                @endif
            </p>
            <nav class="flex space-x-6 text-xs text-slate-500" aria-label="Legal links">
                <a class="hover:text-slate-800 dark:hover:text-white transition-colors" href="/privacy-policy">Privacy
                    Policy</a>
                <a class="hover:text-slate-800 dark:hover:text-white transition-colors" href="/terms-of-service">Terms
                    of Service</a>
            </nav>
        </div>
    </div>
</footer>
