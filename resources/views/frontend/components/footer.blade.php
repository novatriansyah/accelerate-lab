<footer class="bg-surface-light dark:bg-background-dark border-t border-gray-200 dark:border-gray-800 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <div class="space-y-4">
                <a href="/" class="flex items-center gap-1 text-slate-700 dark:text-white">
                    <span class="text-xl font-bold tracking-tighter">Accelerate</span>
                    <span class="text-xl font-light text-primary">/&gt;</span>
                    <span class="text-xl font-bold tracking-tighter">Lab</span>
                </a>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                    Building the future of digital products with precision, speed, and cutting-edge technology.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a class="text-slate-400 hover:text-primary transition-colors" href="/"><i
                            class="material-icons-round text-xl">language</i></a>
                    <a class="text-slate-400 hover:text-primary transition-colors" href="/the-lab"><i
                            class="material-icons-round text-xl">code</i></a>
                    <a class="text-slate-400 hover:text-primary transition-colors" href="/contact"><i
                            class="material-icons-round text-xl">email</i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Services</h4>
                <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
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
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Company</h4>
                <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                    <li><a class="hover:text-primary transition-colors" href="/about">About Us</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/careers">Careers</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/case-studies">Case Studies</a></li>
                    <li><a class="hover:text-primary transition-colors" href="/blog">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 uppercase text-xs tracking-wider">Legal Entity
                </h4>
                @if (isset($settings['legal_name']))
                    <div class="flex items-start gap-3">
                        <span class="material-icons-round text-slate-400">verified_user</span>
                        <div>
                            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                                {{ $settings['legal_name'] }}</p>
                            @if (isset($settings['registered_city']))
                                <p class="text-xs text-slate-500 mt-1">Registered in {{ $settings['registered_city'] }}.
                                </p>
                            @endif
                            @if (isset($settings['reg_number']))
                                <p class="text-xs text-slate-500">{{ $settings['reg_number'] }}</p>
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
                @if (isset($settings['legal_name']))
                    <span class="hidden sm:inline">|</span> A brand by {{ $settings['legal_name'] }}.
                @endif
            </p>
            <div class="flex space-x-6 text-xs text-slate-500">
                <a class="hover:text-slate-800 dark:hover:text-white transition-colors" href="/privacy-policy">Privacy
                    Policy</a>
                <a class="hover:text-slate-800 dark:hover:text-white transition-colors" href="/terms-of-service">Terms
                    of Service</a>
            </div>
        </div>
    </div>
</footer>
