@extends('frontend.components.layout')

@section('content')
    <main id="contact-hero-section" class="relative flex-1 bg-grid-pattern min-h-[calc(100vh-65px)]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
                <div class="lg:col-span-5 flex flex-col gap-10">
                    <div class="flex flex-col gap-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 w-fit">
                            <span class="block size-2 rounded-full bg-primary animate-pulse"></span>
                            <span class="text-primary text-xs font-bold uppercase tracking-wider">{{ __('Contact Us') }}</span>
                        </div>
                        <h1
                            class="text-4xl lg:text-5xl font-black leading-tight tracking-[-0.033em] text-text-main dark:text-white">
                            {{ __('Let\'s Build') }} <br /> <span class="text-primary">{{ __('The Future') }}</span>
                        </h1>
                        <p class="text-text-secondary dark:text-gray-400 text-lg leading-relaxed max-w-md">
                            {{ __('Ready to innovate? Whether you have a groundbreaking idea or need technical expertise, our team is ready to accelerate your vision.') }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-6 py-6 border-y border-border-light dark:border-border-dark">
                        <div class="flex items-start gap-4 group">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                                <x-app-icon name="location_on" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Visit HQ') }}</h3>
                                <p class="text-text-secondary dark:text-gray-400 text-sm mt-1">
                                    {{ $settings['contact_address'] ?? '123 Innovation Blvd, Tech City, TC 90210' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                                <x-app-icon name="mail" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Email Us') }}</h3>
                                <a class="text-text-secondary dark:text-gray-400 text-sm mt-1 hover:text-primary transition-colors"
                                    href="mailto:{{ $settings['contact_email'] ?? 'hello@acceleratelab.io' }}">{{
                                    $settings['contact_email'] ?? 'hello@acceleratelab.io' }}</a>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                                <x-app-icon name="call" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Call Us') }}</h3>
                                <p class="text-text-secondary dark:text-gray-400 text-sm mt-1">
                                    {{ $settings['contact_phone'] ?? '+1 (555) 019-2834' }}
                                </p>
                            </div>
                        </div>
                        @php
                            $contactWaRaw = $settings['contact_whatsapp'] ?? $settings['contact_phone'] ?? '+6281234567890';
                            $contactWaClean = preg_replace('/[^0-9]/', '', $contactWaRaw);
                            $locale = app()->getLocale();
                            $contactWaMsg = $locale === 'id' 
                                ? 'Halo Accelerate Lab! Saya ingin bertanya mengenai layanan dan solusi rekayasa teknologi Anda.'
                                : ($settings['whatsapp_default_message'] ?? 'Hello Accelerate Lab! I would like to inquire about your services.');
                            $contactWaUrl = "https://wa.me/{$contactWaClean}?text=" . urlencode($contactWaMsg);
                        @endphp
                        <div class="flex items-start gap-4 group">
                            <div
                                class="size-10 rounded-full bg-[#25D366]/10 dark:bg-[#25D366]/20 border border-[#25D366]/30 flex items-center justify-center text-[#25D366] shadow-sm group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('WhatsApp Direct') }}</h3>
                                <a href="{{ $contactWaUrl }}" target="_blank" rel="noopener noreferrer" 
                                   class="text-[#25D366] hover:underline font-semibold text-sm mt-1 inline-flex items-center gap-1">
                                    {{ __('Chat on WhatsApp') }}
                                    <x-app-icon name="open_in_new" class="w-4 h-4" />
                                </a>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 group">
                            <div
                                class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
                                <x-app-icon name="verified_user" class="w-5 h-5" />
                            </div>
                            <div>
                                <h3 class="font-bold text-text-main dark:text-white">{{ __('Entitas Legal') }}</h3>
                                <p class="text-text-secondary dark:text-gray-400 text-sm mt-1 font-medium">
                                    {{ $settings['legal_name'] ?? 'PT Akselerasi Digital Mandiri' }}
                                </p>
                                <p class="text-xs text-text-muted dark:text-slate-500 mt-0.5">
                                    {{ __('Badan hukum resmi terdaftar untuk penagihan, kontrak SPK, & NDA') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $settings['contact_google_maps_link'] ?? '#' }}" target="_blank" rel="noopener noreferrer"
                        class="relative w-full h-48 rounded-xl overflow-hidden shadow-md group cursor-pointer block">
                        <div class="absolute inset-0 bg-primary/10 z-10 group-hover:bg-primary/5 transition-colors"></div>
                        <img alt="Map view of {{ $settings['contact_address'] ?? 'HQ' }}"
                            class="w-full h-full object-cover grayscale opacity-60 group-hover:scale-105 transition-transform duration-700"
                            width="600" height="192" loading="lazy" decoding="async"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYdvnhSbOfyr5ux-RS6isr_D6Q68rMA_hiQKu14Z4_d_c7yqladIBCiTLgAG0D3dCndcn9Re--q8Q1wz1Khe6HIZ4R_xMJ9e_U-bRRioeAJbRmJwdcm5O73hpRVt5QJZr9MFodpF3N4ZxdNG-oVSVa2F2MHvtHlX2MqOL7xKOdmWshVlcS1JzKMwmVaOOGS_3RwxAnDE3ndku7gu-znVOQATk7lYiqdbh2KijVmS1xnlVaqlVZ3G9O_bTjEYtgR2pGH--hZaLYRgA" />
                        <div
                            class="absolute bottom-3 left-3 z-20 bg-white/90 dark:bg-black/80 px-3 py-1 rounded-md backdrop-blur-sm">
                            <span class="text-xs font-bold flex items-center gap-1">
                                <x-app-icon name="near_me" class="w-3.5 h-3.5 text-primary" />
                                {{ __('Open Maps') }}
                            </span>
                        </div>
                    </a>
                    <div class="rounded-xl border border-slate-200 dark:border-slate-800 bg-surface-light dark:bg-surface-dark p-5 shadow-sm space-y-2">
                        <div class="flex items-center gap-2 text-slate-900 dark:text-white font-bold text-sm">
                            <x-app-icon name="help" class="w-4 h-4 text-primary" />
                            <span>{{ __('Pertanyaan Umum') }}</span>
                        </div>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('Pengerjaan website express selesai dalam 24-48 jam, sistem kustom 2-6 minggu. Seluruh kode sumber dan basis data 100% menjadi hak milik Anda dengan kontrak resmi PT Akselerasi Digital Mandiri.') }}
                        </p>
                    </div>
                </div>
                <div id="contact-form" class="lg:col-span-7">
                    <x-project-estimator :settings="$settings ?? []" />
                </div>
            </div>
        </div>
    </main>
@endsection