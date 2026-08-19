@php
    $rawPhone = ($settings['contact_whatsapp'] ?? null) ?: (($settings['contact_phone'] ?? null) ?: '+6281234567890');
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    $locale = app()->getLocale();
    $consultationMsg = $locale === 'id' 
        ? 'Halo Accelerate Lab! Saya ingin menjadwalkan konsultasi santai 15-menit untuk mendiskusikan ide proyek dan perkiraan biaya.'
        : 'Hello Accelerate Lab! I would like to schedule a free 15-minute consultation to discuss my project idea and timeline.';
    $consultationWaUrl = "https://wa.me/{$cleanPhone}?text=" . urlencode($consultationMsg);
@endphp

<div x-data="{ open: false }" 
     @open-consultation-modal.window="open = true"
     @keydown.escape.window="open = false"
     id="consultation-modal"
     class="relative z-50">
    
    <!-- Modal Backdrop -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"
         x-cloak></div>

    <!-- Modal Dialog Box -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-10 overflow-y-auto flex items-center justify-center p-4 sm:p-6"
         x-cloak>
        
        <div @click.outside="open = false" 
             class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-surface-dark border border-gray-100 dark:border-gray-800 p-6 sm:p-8 text-left shadow-2xl transition-all sm:w-full sm:max-w-lg">
            
            <!-- Close Button -->
            <button @click="open = false" 
                    type="button" 
                    aria-label="Close consultation modal"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <x-app-icon name="close" class="w-5 h-5" />
            </button>

            <!-- Header Badge -->
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3">
                <x-app-icon name="calendar_today" class="w-3.5 h-3.5" />
                {{ __('15-Min Free Call') }}
            </div>

            <h3 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white leading-tight">
                {{ $locale === 'id' ? 'Diskusi Langsung dengan Principal Architect' : 'Talk Directly with our Principal Architect' }}
            </h3>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                {{ $locale === 'id' 
                    ? 'Tanpa tekanan sales, tanpa istilah teknis yang membingungkan. Obrolan santai 15 menit untuk mengeksplorasi ide, waktu pengerjaan, dan estimasi biaya.' 
                    : 'No aggressive sales pitches, no technical jargon. Just an honest 15-minute chat to explore your idea, realistic timeline, and cost estimate.' }}
            </p>

            <!-- Trust Highlights -->
            <div class="mt-4 p-4 rounded-xl bg-slate-50 dark:bg-background-dark/60 border border-gray-100 dark:border-gray-800 space-y-2 text-xs">
                <div class="flex items-center gap-2 text-slate-700 dark:text-gray-300">
                    <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                    <span><strong>{{ $locale === 'id' ? '100% Gratis & Rahasia' : '100% Free & Confidential' }}</strong>: {{ $locale === 'id' ? 'Tanpa komitmen apapun' : 'Zero obligations' }}</span>
                </div>
                <div class="flex items-center gap-2 text-slate-700 dark:text-gray-300">
                    <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                    <span><strong>{{ $locale === 'id' ? 'Insight Arsitek Langsung' : 'Direct Architect Insight' }}</strong>: {{ $locale === 'id' ? 'Bukan account manager' : 'No junior account managers' }}</span>
                </div>
                <div class="flex items-center gap-2 text-slate-700 dark:text-gray-300">
                    <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500 shrink-0" />
                    <span><strong>{{ $locale === 'id' ? 'Solusi Tepat Sesuai Budget' : 'Tech-Agnostic Advice' }}</strong>: {{ $locale === 'id' ? 'Teknologi terbaik untuk kebutuhan Anda' : 'Best tools for your budget' }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex flex-col gap-3">
                <a href="{{ $consultationWaUrl }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-sm shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40 transition-all">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>{{ $locale === 'id' ? 'Jadwalkan via Chat WhatsApp' : 'Schedule via WhatsApp Chat' }}</span>
                </a>

                <a href="/contact" 
                   class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl border border-gray-200 dark:border-gray-700 text-slate-700 dark:text-gray-200 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <x-app-icon name="mail" class="w-4 h-4" />
                    <span>{{ $locale === 'id' ? 'Gunakan Kalkulator Estimasi Proyek' : 'Use the Interactive Scoping Wizard' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
