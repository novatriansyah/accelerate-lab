@php
    $rawPhone = ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: '+6281234567890');
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    $locale = app()->getLocale();

    $step1Options = [
        [
            'id' => 'portal',
            'title' => __('Portal Operasional & Dashboard Manajemen'),
            'desc' => __('Sistem terpusat untuk kelola data internal, multi-cabang, dan analisa performa real-time.')
        ],
        [
            'id' => 'inventory',
            'title' => __('Sistem Inventori, Penjualan, & Penagihan'),
            'desc' => __('Otomasi stok barang gudang, kasir/POS, penerbitan invoice instan, dan rekonsiliasi pembayaran.')
        ],
        [
            'id' => 'partner',
            'title' => __('Portal Layanan Mandiri Pelanggan / Mitra'),
            'desc' => __('Akses khusus klien, reseller, atau vendor untuk tracking pesanan dan transaksi mandiri.')
        ],
        [
            'id' => 'mobile',
            'title' => __('Aplikasi Mobile Tim Lapangan'),
            'desc' => __('Aplikasi smartphone yang praktis dan responsif untuk tim penjualan atau operasional lapangan.')
        ],
        [
            'id' => 'modernize',
            'title' => __('Modernisasi Software Lama yang Lambat'),
            'desc' => __('Perbaikan performa, peremajaan antarmuka, atau migrasi data tanpa mengganggu operasional.')
        ]
    ];

    $step2Options = [
        [
            'id' => 'spreadsheet',
            'title' => __('Masih menggunakan spreadsheet / catatan manual'),
            'desc' => __('Proses bisnis masih dicatat di Excel, Google Sheets, atau buku catatan fisik.')
        ],
        [
            'id' => 'ready',
            'title' => __('Alur kerja dan desain sudah siap dibangun'),
            'desc' => __('Kebutuhan fitur sudah jelas, siap untuk fase perancangan arsitektur dan coding.')
        ],
        [
            'id' => 'existing',
            'title' => __('Sistem lama berjalan tapi sering bermasalah'),
            'desc' => __('Aplikasi lambat, sering error, atau sulit ditambah fitur baru sesuai pertumbuhan bisnis.')
        ],
        [
            'id' => 'consultation',
            'title' => __('Butuh konsultasi pemetaan alur kerja'),
            'desc' => __('Ingin berdiskusi dulu dengan Principal Architect untuk menentukan roadmap terbaik.')
        ]
    ];

    $timelineOptions = [
        $locale === 'id' ? '⚡ Cepat (3-5 Minggu)' : '⚡ Fast-Track (3-5 Weeks)',
        $locale === 'id' ? '🗓️ Standar (2-3 Bulan)' : '🗓️ Standard (2-3 Months)',
        $locale === 'id' ? '☕ Fleksibel / Tahap Diskusi' : '☕ Flexible / Phased Roadmaps'
    ];

    $techOptions = [
        __('Rekomendasi Arsitek Terbaik'),
        __('Cloud Web App Terpusat'),
        __('Aplikasi Mobile iOS & Android'),
        __('Integrasi Database Lokal / On-Premise'),
        __('Sistem Multi-Platform Terpadu')
    ];
@endphp

<div x-data="projectEstimator({ 
        targetPhone: '{{ $cleanPhone }}',
        locale: '{{ $locale }}',
        step1Options: {{ Js::from($step1Options) }},
        step2Options: {{ Js::from($step2Options) }},
        timelineOptions: {{ Js::from($timelineOptions) }},
        techOptions: {{ Js::from($techOptions) }}
     })" 
     class="bg-surface-light dark:bg-surface-dark rounded-2xl shadow-xl shadow-gray-200/50 dark:shadow-none border border-border-light dark:border-border-dark p-6 sm:p-10 relative overflow-hidden">
    
    <!-- Background Glow Effect -->
    <div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

    <!-- Header & Step Progress Bar -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    {{ __('Interactive Scoping Wizard') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-text-main dark:text-white mt-2">
                    {{ __('Estimate Your Project') }}
                </h2>
                <p class="text-text-secondary dark:text-gray-400 text-sm mt-1">
                    {{ __('Plain language, zero jargon. Get a fast, tailored scope & cost estimate in 30 seconds.') }}
                </p>
            </div>
            <div class="text-right">
                <span class="text-xs font-bold text-primary" x-text="locale === 'id' ? `Langkah ${currentStep} dari 4` : `Step ${currentStep} of 4`"></span>
            </div>
        </div>

        <!-- Progress Indicator -->
        <div class="w-full bg-slate-100 dark:bg-slate-800 h-2 rounded-full overflow-hidden">
            <div class="bg-gradient-to-r from-primary to-cyan-500 h-full transition-all duration-300 ease-out"
                 :style="`width: ${(currentStep / 4) * 100}%`"></div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
            <x-app-icon name="check_circle" class="w-5 h-5 text-emerald-500 shrink-0" />
            <div>
                <p class="font-bold text-sm">{{ $locale === 'id' ? 'Permintaan Terkirim!' : 'Inquiry Received!' }}</p>
                <p class="text-xs mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-600 dark:text-red-400 px-4 py-3 rounded-xl mb-6">
            <ul class="text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="flex items-center gap-1.5">
                        <x-app-icon name="error" class="w-4 h-4 text-red-500 shrink-0" />
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" @submit="prepareSubmission">
        @csrf
        
        <!-- Accessible / Crawler Scoping Overview for Screen Readers & SEO -->
        <div class="sr-only">
            <h3>{{ __('Pilihan Kebutuhan Rekayasa:') }}</h3>
            <ul>
                @foreach ($step1Options as $option)
                    <li>{{ $option['title'] }}</li>
                @endforeach
            </ul>
            <h3>{{ __('Tahap Kesiapan Bisnis:') }}</h3>
            <ul>
                @foreach ($step2Options as $option)
                    <li>{{ $option['title'] }}</li>
                @endforeach
            </ul>
            <h3>{{ __('Opsi Deployment & Arsitektur:') }}</h3>
            <ul>
                @foreach ($techOptions as $option)
                    <li>{{ $option }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Hidden Scoping Fields for Backend Submission -->
        <input type="hidden" name="service_interest" :value="formData.service_interest">
        <input type="hidden" name="project_stage" :value="formData.project_stage">
        <input type="hidden" name="timeline" :value="formData.timeline">
        <input type="hidden" name="tech_preference" :value="formData.tech_preference">

        <!-- Honeypot -->
        <div class="hidden" aria-hidden="true" style="display: none;">
            <input type="text" name="my_favorite_color" tabindex="-1" autocomplete="off" />
        </div>

        <!-- ================= STEP 1: What do you want to build? ================= -->
        <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
            <div>
                <h3 class="text-lg font-bold text-text-main dark:text-white mb-1">{{ __('1. What would you like to build?') }}</h3>
                <p class="text-xs text-text-secondary dark:text-gray-400">{{ __('Select the option that best describes your goal:') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <template x-for="option in step1Options" :key="option.id">
                    <button type="button" 
                            @click="formData.service_interest = option.title"
                            :class="formData.service_interest === option.title 
                                ? 'border-primary bg-primary/5 dark:bg-primary/10 shadow-md ring-2 ring-primary/20' 
                                : 'border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark hover:border-primary/50'"
                            class="p-4 rounded-xl border text-left transition-all duration-200 flex items-start gap-3 group">
                        <div class="p-2 rounded-lg bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark text-primary shrink-0 group-hover:scale-105 transition-transform">
                            <x-app-icon name="rocket_launch" class="w-5 h-5" />
                        </div>
                        <div>
                            <p class="font-bold text-sm text-text-main dark:text-white" x-text="option.title"></p>
                            <p class="text-xs text-text-secondary dark:text-gray-400 mt-1 leading-relaxed" x-text="option.desc"></p>
                        </div>
                    </button>
                </template>
            </div>

            <div class="pt-4 flex justify-end">
                <button type="button" 
                        @click="nextStep"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-sm transition-all shadow-lg shadow-primary/20">
                    <span>{{ __('Continue') }}</span>
                    <x-app-icon name="arrow_forward" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <!-- ================= STEP 2: Current Stage ================= -->
        <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6" x-cloak>
            <div>
                <h3 class="text-lg font-bold text-text-main dark:text-white mb-1">{{ __('2. What stage is your project in right now?') }}</h3>
                <p class="text-xs text-text-secondary dark:text-gray-400">{{ __('Helps us understand how much preparation is needed:') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <template x-for="stage in step2Options" :key="stage.id">
                    <button type="button" 
                            @click="formData.project_stage = stage.title"
                            :class="formData.project_stage === stage.title 
                                ? 'border-primary bg-primary/5 dark:bg-primary/10 shadow-md ring-2 ring-primary/20' 
                                : 'border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark hover:border-primary/50'"
                            class="p-4 rounded-xl border text-left transition-all duration-200 flex items-start gap-3 group">
                        <div class="p-2 rounded-lg bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark text-primary shrink-0 group-hover:scale-105 transition-transform">
                            <x-app-icon name="flag" class="w-5 h-5" />
                        </div>
                        <div>
                            <p class="font-bold text-sm text-text-main dark:text-white" x-text="stage.title"></p>
                            <p class="text-xs text-text-secondary dark:text-gray-400 mt-1 leading-relaxed" x-text="stage.desc"></p>
                        </div>
                    </button>
                </template>
            </div>

            <div class="pt-4 flex justify-between items-center">
                <button type="button" @click="prevStep" class="px-5 py-3 rounded-xl border border-border-light dark:border-border-dark text-text-secondary dark:text-gray-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    {{ __('Back') }}
                </button>
                <button type="button" @click="nextStep" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-sm transition-all shadow-lg shadow-primary/20">
                    <span>{{ __('Continue') }}</span>
                    <x-app-icon name="arrow_forward" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <!-- ================= STEP 3: Timeline & Tech Preference ================= -->
        <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6" x-cloak>
            <div>
                <h3 class="text-lg font-bold text-text-main dark:text-white mb-1">{{ __('3. Estimated timeline & preferences') }}</h3>
                <p class="text-xs text-text-secondary dark:text-gray-400">{{ __('When do you ideally need this live or delivered?') }}</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-300 mb-2">{{ __('Desired Timeline') }}</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                        <template x-for="t in timelineOptions" :key="t">
                            <button type="button" 
                                    @click="formData.timeline = t"
                                    :class="formData.timeline === t 
                                        ? 'border-primary bg-primary text-white font-bold shadow-md' 
                                        : 'border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-gray-200 hover:border-primary/50'"
                                    class="py-3 px-4 rounded-xl border text-xs text-center transition-all">
                                <span x-text="t"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <div class="pt-2">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-text-secondary dark:text-gray-300">
                            {{ __('Tipe Sistem & Deployment') }} <span class="text-gray-400 lowercase font-normal">({{ __('optional') }})</span>
                        </label>
                        <span class="text-[11px] text-primary font-medium">Boutique Architecture</span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        <template x-for="tech in techOptions" :key="tech">
                            <button type="button" 
                                    @click="formData.tech_preference = tech"
                                    :class="formData.tech_preference === tech 
                                        ? 'border-primary bg-primary/10 text-primary font-bold border-2' 
                                        : 'border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-secondary dark:text-gray-300 hover:border-primary/40'"
                                    class="py-2.5 px-3 rounded-lg border text-xs text-center transition-all truncate">
                                <span x-text="tech"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-between items-center">
                <button type="button" @click="prevStep" class="px-5 py-3 rounded-xl border border-border-light dark:border-border-dark text-text-secondary dark:text-gray-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    {{ __('Back') }}
                </button>
                <button type="button" @click="nextStep" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-sm transition-all shadow-lg shadow-primary/20">
                    <span>{{ __('Next: Review & Contact') }}</span>
                    <x-app-icon name="arrow_forward" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <!-- ================= STEP 4: Review & Direct Submission ================= -->
        <div x-show="currentStep === 4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6" x-cloak>
            <div>
                <h3 class="text-lg font-bold text-text-main dark:text-white mb-1">{{ __('4. Where should we send your estimate?') }}</h3>
                <p class="text-xs text-text-secondary dark:text-gray-400">{{ __('Receive your estimate via direct WhatsApp or email:') }}</p>
            </div>

            <!-- Turnaround Guidance Card -->
            <div class="rounded-xl border border-primary/20 bg-primary/5 dark:bg-primary/10 p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                        <x-app-icon name="schedule" class="w-5 h-5" />
                    </div>
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-primary">
                            {{ __('Estimasi Waktu Pengerjaan') }}
                        </div>
                        <p class="text-xs text-text-muted dark:text-slate-400">
                            {{ __('Rata-rata turnaround MVP & modul operasional siap uji:') }}
                        </p>
                    </div>
                </div>
                <span class="inline-flex items-center rounded-full bg-primary text-white text-xs font-bold px-3 py-1 shadow-sm shrink-0">
                    {{ __('Target Waktu: 3-5 Minggu') }}
                </span>
            </div>

            <!-- Scoping Summary Box -->
            <div class="p-4 rounded-xl bg-slate-50 dark:bg-background-dark border border-border-light dark:border-border-dark text-xs space-y-1.5">
                <div class="flex items-center justify-between text-text-secondary dark:text-gray-400">
                    <span>{{ $locale === 'id' ? 'Kebutuhan:' : 'Project Scope:' }}</span>
                    <strong class="text-text-main dark:text-white" x-text="formData.service_interest"></strong>
                </div>
                <div class="flex items-center justify-between text-text-secondary dark:text-gray-400">
                    <span>{{ $locale === 'id' ? 'Tahap Kesiapan:' : 'Readiness Stage:' }}</span>
                    <strong class="text-text-main dark:text-white" x-text="formData.project_stage"></strong>
                </div>
                <div class="flex items-center justify-between text-text-secondary dark:text-gray-400">
                    <span>{{ $locale === 'id' ? 'Estimasi Waktu Pengerjaan:' : 'Estimated Turnaround:' }}</span>
                    <strong class="text-text-main dark:text-white" x-text="formData.timeline"></strong>
                </div>
                <div class="flex items-center justify-between text-text-secondary dark:text-gray-400">
                    <span>{{ $locale === 'id' ? 'Tipe Deployment:' : 'Deployment Type:' }}</span>
                    <strong class="text-primary font-bold" x-text="formData.tech_preference"></strong>
                </div>
            </div>

            <!-- Contact Inputs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <label class="block">
                    <span class="block text-xs font-bold uppercase tracking-wider text-text-main dark:text-gray-200 mb-1.5">{{ __('Your Name') }} *</span>
                    <input type="text" name="name" x-model="formData.name" required
                           placeholder="Nova Triansyah"
                           class="w-full rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-11 px-4 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </label>
                <label class="block">
                    <span class="block text-xs font-bold uppercase tracking-wider text-text-main dark:text-gray-200 mb-1.5">{{ __('Email Address') }} *</span>
                    <input type="email" name="email" x-model="formData.email" required
                           placeholder="nova@company.com"
                           class="w-full rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-11 px-4 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </label>
                <label class="block">
                    <span class="block text-xs font-bold uppercase tracking-wider text-text-main dark:text-gray-200 mb-1.5">{{ __('WhatsApp / Phone') }}</span>
                    <input type="text" name="phone" x-model="formData.phone"
                           placeholder="+62 812 3456 7890"
                           class="w-full rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-11 px-4 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </label>
                <label class="block">
                    <span class="block text-xs font-bold uppercase tracking-wider text-text-main dark:text-gray-200 mb-1.5">{{ __('Company / Brand') }}</span>
                    <input type="text" name="company" x-model="formData.company"
                           placeholder="PT Digital Mandiri"
                           class="w-full rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-11 px-4 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </label>
            </div>

            <label class="block">
                <span class="block text-xs font-bold uppercase tracking-wider text-text-main dark:text-gray-200 mb-1.5">{{ __('Project Notes') }} <span class="text-gray-400 lowercase font-normal">({{ __('optional') }})</span></span>
                <textarea name="message" x-model="formData.message" rows="2"
                          placeholder="{{ $locale === 'id' ? 'Catatan tambahan, tautan referensi, atau fitur khusus yang diinginkan...' : 'Any specific features, reference links, or notes...' }}"
                          class="w-full rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-y"></textarea>
            </label>

            <!-- Dual Conversion Buttons -->
            <div class="pt-3 grid grid-cols-1 sm:grid-cols-2 gap-3">
                <!-- Action 1: Instant WhatsApp Message Pre-filled -->
                <button type="button" 
                        @click="openWhatsApp"
                        class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-sm transition-all shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>{{ __('Send via WhatsApp') }}</span>
                </button>

                <!-- Action 2: Standard Database Form Submit -->
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-bold text-sm hover:opacity-90 transition-opacity">
                    <x-app-icon name="mail" class="w-4 h-4" />
                    <span>{{ __('Submit for Email Scope') }}</span>
                </button>
            </div>

            <div class="flex justify-between items-center pt-2">
                <button type="button" @click="prevStep" class="text-xs text-text-secondary dark:text-gray-400 hover:text-primary transition-colors">
                    &larr; {{ __('Back') }}
                </button>
                <p class="text-[11px] text-gray-400 text-right">
                    {{ __('Zero spam guarantee. 100% confidential.') }}
                </p>
            </div>
        </div>
    </form>
</div>

<script>
function projectEstimator(config) {
    return {
        currentStep: 1,
        locale: config.locale || 'en',
        targetPhone: config.targetPhone || '6281234567890',
        step1Options: config.step1Options || [],
        step2Options: config.step2Options || [],
        timelineOptions: config.timelineOptions || [],
        techOptions: config.techOptions || [],
        formData: {
            service_interest: config.step1Options && config.step1Options[0] ? config.step1Options[0].title : 'Portal Operasional & Dashboard Manajemen',
            project_stage: config.step2Options && config.step2Options[0] ? config.step2Options[0].title : 'Masih menggunakan spreadsheet / catatan manual',
            timeline: config.timelineOptions && config.timelineOptions[0] ? config.timelineOptions[0] : '⚡ Cepat (3-5 Minggu)',
            tech_preference: config.techOptions && config.techOptions[0] ? config.techOptions[0] : 'Rekomendasi Arsitek Terbaik',
            name: '',
            email: '',
            phone: '',
            company: '',
            message: ''
        },
        nextStep() {
            if (this.currentStep < 4) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },
        compileWhatsAppMessage() {
            let isId = this.locale === 'id';
            let nameStr = this.formData.name ? (isId ? ` Nama saya ${this.formData.name}.` : ` My name is ${this.formData.name}.`) : '';
            
            if (isId) {
                return `Halo Accelerate Lab!${nameStr}\n\nSaya menggunakan kalkulator estimasi di website Anda:\n• Kebutuhan: ${this.formData.service_interest}\n• Kesiapan: ${this.formData.project_stage}\n• Target Waktu: ${this.formData.timeline}\n• Tipe Sistem: ${this.formData.tech_preference}\n\nBisa kita jadwalkan diskusi untuk estimasi kebutuhan dan biaya?`;
            }

            return `Hello Accelerate Lab!${nameStr}\n\nI used the project estimator on your website:\n• Scope: ${this.formData.service_interest}\n• Stage: ${this.formData.project_stage}\n• Timeline: ${this.formData.timeline}\n• Deployment: ${this.formData.tech_preference}\n\nCan we discuss scope and pricing?`;
        },
        openWhatsApp() {
            let msg = encodeURIComponent(this.compileWhatsAppMessage());
            let url = `https://wa.me/${this.targetPhone}?text=${msg}`;
            window.open(url, '_blank');
        },
        prepareSubmission() {
            // Form ready for standard POST submission
        }
    };
}
</script>
