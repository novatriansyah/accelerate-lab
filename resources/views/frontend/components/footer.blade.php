@php
    $currentLocale = app()->getLocale();
    $footerServices = \App\Models\Service::orderBy('sort_order')->take(6)->get();
    $footerEmail = \App\Models\SiteSetting::get('contact_email', 'hello@acceleratelab.id');
    $footerCity = \App\Models\SiteSetting::get('registered_city', \App\Models\SiteSetting::get('contact_address', 'South Jakarta & Tangerang, Indonesia'));
    $footerLinkedin = \App\Models\SiteSetting::get('linkedin_url', 'https://linkedin.com');
    $legalName = \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri');
@endphp

<footer class="relative mt-24 border-t border-slate-200/80 dark:border-white/10 bg-white/60 dark:bg-[#070A11] transition-colors duration-300">
    {{-- Accelerate Studio Top Action Banner + Kinetic CTA --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-14">
        <div class="bento-card relative overflow-hidden bg-slate-900 text-white p-8 sm:p-12 lg:p-16 border border-slate-800 shadow-2xl">
            <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-[#00BFA5]/20 blur-[100px] rounded-full pointer-events-none" aria-hidden="true"></div>
            
            <div class="relative z-10 max-w-3xl flex flex-col items-start gap-6">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-medium tracking-wide uppercase bg-[#00BFA5]/15 text-[#00BFA5] border border-[#00BFA5]/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#00BFA5] animate-ping"></span>
                    {{ $currentLocale === 'id' ? 'KOLABORASI TEKNOLOGI' : 'ENGINEERING PARTNERSHIP' }}
                </span>
                
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white leading-tight">
                    {{ $currentLocale === 'id' ? 'Siap mengakselerasi arsitektur digital & software perusahaan Anda?' : 'Ready to engineer your next high-impact digital breakthrough?' }}
                </h2>

                <p class="text-slate-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                    {{ $currentLocale === 'id' ? 'Dari rancang bangun web enterprise, cloud devops, hingga aplikasi mobile presisi tinggi. Diskusikan roadmap teknis Anda bersama kami.' : 'From enterprise web systems and cloud microservices to mobile applications. Partner with our senior engineering squad today.' }}
                </p>

                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="{{ route('contact') }}" class="rr-btn rr-btn-primary px-7 py-3 text-sm font-semibold">
                        <span class="btn-wrap">
                            <span class="text-1">{{ $currentLocale === 'id' ? 'Jadwalkan Konsultasi Teknis' : 'Schedule Technical Consultation' }}</span>
                            <span class="text-2">{{ $currentLocale === 'id' ? 'Mulai Proyek Sekarang' : 'Start Your Project Now' }}</span>
                        </span>
                    </a>
                    <a href="mailto:{{ $footerEmail }}" class="rr-btn rr-btn-border px-6 py-3 text-sm font-medium text-white border-white/20 hover:border-[#00BFA5]">
                        <span class="btn-wrap">
                            <span class="text-1">{{ $footerEmail }}</span>
                            <span class="text-2">{{ $currentLocale === 'id' ? 'Kirim Email' : 'Send an Email' }}</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Structured Footer Grid --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 border-t border-slate-200/80 dark:border-white/5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            {{-- Col 1: Brand & Entity --}}
            <div class="lg:col-span-2 flex flex-col gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2" aria-label="Accelerate Lab - Home">
                    <div class="flex items-center gap-1 font-instrumentsans text-2xl font-bold tracking-tight">
                        <span class="text-slate-900 dark:text-white transition-colors">Accelerate</span>
                        <span class="text-[#00BFA5] font-mono font-normal" aria-hidden="true">/&gt;</span>
                        <span class="text-slate-900 dark:text-white transition-colors">Lab</span>
                    </div>
                </a>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed max-w-sm">
                    {{ $currentLocale === 'id' 
                        ? 'Accelerate Lab adalah agensi inovasi digital dan studio rekayasa perangkat lunak berkinerja tinggi yang berpusat di Indonesia.' 
                        : 'Accelerate Lab is an elite digital engineering studio crafting scalable software architectures, custom cloud platforms, and modern web applications.' }}
                </p>
                <div class="text-xs text-slate-500 dark:text-slate-400 flex flex-col gap-1 pt-1 font-mono">
                    <span>Legal Entity: <strong>{{ $legalName }}</strong></span>
                    <span>Locations: {{ $footerCity }}</span>
                    <span class="text-[11px] text-slate-400 dark:text-slate-500 mt-1">Accelerate Lab adalah merek dagang dan studio inovasi teknologi di bawah naungan {{ $legalName }}.</span>
                </div>
            </div>

            {{-- Col 2: Dynamic Services --}}
            <div class="flex flex-col gap-3">
                <h4 class="text-xs font-mono font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    {{ $currentLocale === 'id' ? 'Layanan Kami' : 'Capabilities' }}
                </h4>
                <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                    @forelse($footerServices as $service)
                        <li>
                            <a href="{{ route('service', $service->slug) }}" class="hover:text-[#00BFA5] dark:hover:text-[#00BFA5] transition-colors">
                                {{ $service->title }}
                            </a>
                        </li>
                    @empty
                        <li><a href="{{ route('services') }}" class="hover:text-[#00BFA5]">Custom Web Development</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#00BFA5]">Cloud Architecture</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#00BFA5]">Mobile App Development</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#00BFA5]">UI/UX Design</a></li>
                    @endforelse
                </ul>
            </div>

            {{-- Col 3: Company Navigation --}}
            <div class="flex flex-col gap-3">
                <h4 class="text-xs font-mono font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    {{ $currentLocale === 'id' ? 'Perusahaan' : 'Studio' }}
                </h4>
                <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                    <li><a href="{{ route('about') }}" class="hover:text-[#00BFA5] transition-colors">{{ $currentLocale === 'id' ? 'Tentang Kami' : 'About Us' }}</a></li>
                    <li><a href="{{ route('case-studies') }}" class="hover:text-[#00BFA5] transition-colors">{{ $currentLocale === 'id' ? 'Studi Kasus' : 'Case Studies' }}</a></li>
                    <li>
                        <a href="{{ route('careers') }}" class="inline-flex items-center gap-2 hover:text-[#00BFA5] transition-colors">
                            <span>{{ $currentLocale === 'id' ? 'Karir' : 'Careers' }}</span>
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-mono font-semibold bg-[#00BFA5]/15 text-[#00BFA5]">HIRING</span>
                        </a>
                    </li>
                    <li><a href="{{ url('/the-lab') }}" class="hover:text-[#00BFA5] transition-colors">The Lab</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#00BFA5] transition-colors">{{ $currentLocale === 'id' ? 'Kontak' : 'Contact' }}</a></li>
                </ul>
            </div>

            {{-- Col 4: Legal & Connect --}}
            <div class="flex flex-col gap-3">
                <h4 class="text-xs font-mono font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    {{ $currentLocale === 'id' ? 'Legal & Sosials' : 'Legal & Connect' }}
                </h4>
                <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-[#00BFA5] transition-colors">{{ $currentLocale === 'id' ? 'Kebijakan Privasi' : 'Privacy Policy' }}</a></li>
                    <li><a href="{{ route('terms-of-service') }}" class="hover:text-[#00BFA5] transition-colors">{{ $currentLocale === 'id' ? 'Syarat Ketentuan' : 'Terms of Service' }}</a></li>
                    <li class="pt-2 flex items-center gap-3">
                        <a href="{{ $footerLinkedin }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full text-slate-500 dark:text-slate-400 hover:text-[#00BFA5] hover:bg-slate-100 dark:hover:bg-white/5 transition-colors" aria-label="LinkedIn">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                        </a>
                        <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full text-slate-500 dark:text-slate-400 hover:text-[#00BFA5] hover:bg-slate-100 dark:hover:bg-white/5 transition-colors" aria-label="GitHub">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Copyright & Operational Status Bar --}}
        <div class="mt-12 pt-8 border-t border-slate-200/80 dark:border-white/5 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500 dark:text-slate-400 font-mono">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>All Engine Systems Operational</span>
            </div>
            <div>
                &copy; {{ date('Y') }} {{ $legalName }}. All rights reserved.
            </div>
        </div>
    </div>
</footer>
