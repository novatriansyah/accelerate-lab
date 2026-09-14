@php
    $currentLocale = app()->getLocale();
    $legalName = \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri');
@endphp

<section class="relative py-8 border-y border-slate-200/70 dark:border-white/5 bg-slate-50/50 dark:bg-[#070B14]/60 backdrop-blur-sm overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
            
            {{-- Legal Entity Anchor --}}
            <div class="flex items-center gap-3 shrink-0">
                <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5]">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-mono font-bold tracking-wider uppercase text-slate-900 dark:text-white">
                            {{ $legalName }}
                        </span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                            {{ $currentLocale === 'id' ? 'Entitas Terdaftar' : 'Registered Entity' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        {{ $currentLocale === 'id' ? 'Studio Rekayasa Perangkat Lunak & Inovasi Digital' : 'Digital Innovation & Software Engineering Studio' }}
                    </p>
                </div>
            </div>

            {{-- Verifiable Methodology & Compliance Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6 w-full lg:w-auto text-xs font-mono">
                
                {{-- PDP Law Compliance --}}
                <div class="flex items-center gap-2.5 text-slate-700 dark:text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-[#00BFA5]"></span>
                    <div>
                        <div class="font-bold text-slate-900 dark:text-white">
                            {{ $currentLocale === 'id' ? 'Kepatuhan UU PDP' : 'PDP Law Compliant' }}
                        </div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400">
                            {{ $currentLocale === 'id' ? 'Perlindungan Data Pribadi' : 'Data Privacy Standard' }}
                        </div>
                    </div>
                </div>

                {{-- NDA Ready --}}
                <div class="flex items-center gap-2.5 text-slate-700 dark:text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-[#00BFA5]"></span>
                    <div>
                        <div class="font-bold text-slate-900 dark:text-white">
                            {{ $currentLocale === 'id' ? 'NDA Tersedia' : 'Bilateral NDA Ready' }}
                        </div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400">
                            {{ $currentLocale === 'id' ? 'Kerahasiaan Terjamin' : 'Full Confidentiality' }}
                        </div>
                    </div>
                </div>

                {{-- 100% Client Code Ownership --}}
                <div class="flex items-center gap-2.5 text-slate-700 dark:text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-[#00BFA5]"></span>
                    <div>
                        <div class="font-bold text-slate-900 dark:text-white">
                            {{ $currentLocale === 'id' ? '100% Milik Klien' : '100% Client Code Ownership' }}
                        </div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400">
                            {{ $currentLocale === 'id' ? 'Tanpa Vendor Lock-in' : 'Zero Vendor Lock-in' }}
                        </div>
                    </div>
                </div>

                {{-- Direct Founder/Architect Access --}}
                <div class="flex items-center gap-2.5 text-slate-700 dark:text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-[#00BFA5]"></span>
                    <div>
                        <div class="font-bold text-slate-900 dark:text-white">
                            {{ $currentLocale === 'id' ? 'Akses Arsitek Langsung' : 'Direct Senior Access' }}
                        </div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400">
                            {{ $currentLocale === 'id' ? 'Respons WhatsApp < 2 Jam' : 'Response < 2 Hours' }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
