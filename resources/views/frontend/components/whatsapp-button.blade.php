@php
    $rawPhone = $settings['contact_whatsapp'] ?? $settings['contact_phone'] ?? '+6281234567890';
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    $defaultMsg = $settings['whatsapp_default_message'] ?? 'Hello Accelerate Lab! I would like to inquire about your services.';
    $waUrl = "https://wa.me/{$cleanPhone}?text=" . urlencode($defaultMsg);
@endphp

<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50 flex flex-col items-end pointer-events-none select-none">
    <!-- WhatsApp Chat Popup Modal -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         @click.outside="open = false"
         x-cloak
         class="pointer-events-auto mb-4 w-80 sm:w-96 rounded-2xl bg-white dark:bg-surface-dark border border-gray-100 dark:border-gray-800 shadow-2xl shadow-emerald-500/10 overflow-hidden">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#075E54] to-[#128C7E] p-4 text-white flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center font-bold text-lg text-white border border-white/20">
                        AL
                    </div>
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-[#128C7E] rounded-full"></span>
                </div>
                <div>
                    <h3 class="font-bold text-sm leading-tight text-white">Accelerate Lab</h3>
                    <p class="text-[11px] text-emerald-100 opacity-90 flex items-center gap-1 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Typically replies in a few minutes
                    </p>
                </div>
            </div>
            <button @click="open = false" 
                    aria-label="Close chat preview" 
                    class="text-white/80 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <!-- Chat Body / Message Card -->
        <div class="p-4 bg-slate-50 dark:bg-background-dark/50 space-y-3">
            <div class="bg-white dark:bg-surface-dark p-3.5 rounded-xl rounded-tl-none border border-gray-100 dark:border-gray-800 shadow-sm max-w-[90%]">
                <p class="text-xs text-slate-700 dark:text-slate-300 leading-relaxed">
                    Hello! 👋 How can we help build or accelerate your digital product today?
                </p>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-1 block text-right">Just now</span>
            </div>
        </div>

        <!-- CTA Action Footer -->
        <div class="p-3 bg-white dark:bg-surface-dark border-t border-gray-100 dark:border-gray-800">
            <a href="{{ $waUrl }}" 
               target="_blank" 
               rel="noopener noreferrer"
               id="whatsapp-popover-cta"
               class="w-full flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold py-3 px-4 rounded-xl text-sm transition-all shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>Start Chat on WhatsApp</span>
            </a>
        </div>
    </div>

    <!-- Main Floating Button -->
    <div class="relative pointer-events-auto flex items-center gap-3">
        <!-- Pulse Glow -->
        <span class="absolute -inset-1 rounded-full bg-[#25D366] opacity-30 animate-pulse blur-sm"></span>

        <!-- Trigger Button -->
        <button @click="open = !open"
                id="whatsapp-floating-trigger"
                aria-label="Toggle WhatsApp chat preview"
                class="relative flex items-center justify-center w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20ba5a] text-white shadow-xl shadow-emerald-600/30 hover:scale-105 active:scale-95 transition-all duration-300 group focus:outline-none focus:ring-4 focus:ring-emerald-400/50">
            
            <svg class="w-7 h-7 fill-current group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>

            <!-- Badge counter / online status -->
            <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-400 border-2 border-white dark:border-surface-dark"></span>
            </span>
        </button>
    </div>
</div>
