@php
    $whatsappNumber = \App\Models\SiteSetting::where('key', 'contact_whatsapp')->first()?->value ?? config('services.whatsapp.number', '6285156543820');
    $defaultMessage = urlencode("Halo Accelerate Lab, saya tertarik untuk mendiskusikan kebutuhan pengembangan teknologi untuk bisnis kami.");
@endphp

<div class="fixed bottom-6 right-6 z-40 group"
     x-data="{ showTooltip: false }">
    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $defaultMessage }}"
       id="whatsapp-floating-trigger"
       target="_blank"
       rel="noopener noreferrer"
       @mouseenter="showTooltip = true"
       @mouseleave="showTooltip = false"
       class="flex items-center justify-center w-14 h-14 rounded-full bg-[#00BFA5] text-[#090D16] shadow-xl hover:shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300"
       aria-label="Chat with us on WhatsApp">
        {{-- WhatsApp Icon --}}
        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.03-1.25-.75-.67-1.26-1.5-1.41-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.38-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.71 4.3 3.79.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.59.21-1.09.15-1.19-.06-.1-.23-.16-.48-.29z"/>
        </svg>
    </a>

    {{-- Tooltip --}}
    <div x-show="showTooltip"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-1 scale-95"
         class="absolute right-16 bottom-2 whitespace-nowrap bg-slate-900 dark:bg-slate-800 text-white text-xs font-medium py-1.5 px-3 rounded-lg shadow-xl border border-slate-700 pointer-events-none">
        Chat with our Tech Lead
    </div>
</div>
