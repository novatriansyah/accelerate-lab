@php
    $pdfUrl = \App\Models\SiteSetting::get('company_profile_pdf_url', null);
@endphp

@if(!empty($pdfUrl))
<div class="p-6 sm:p-8 rounded-3xl bg-white/80 dark:bg-[#0E1526]/80 border border-slate-200/80 dark:border-white/10 shadow-lg relative overflow-hidden">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-500 shrink-0">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
                </svg>
            </div>
            <div>
                <span class="text-xs font-mono uppercase text-[#00BFA5] font-semibold tracking-wider">
                    Official Studio Document
                </span>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-0.5">
                    Accelerate Lab Company Profile
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-md">
                    Overview of our engineering methodology, technical capabilities, and founder-led studio structure in printable PDF format.
                </p>
            </div>
        </div>

        <a href="{{ $pdfUrl }}" 
           target="_blank" 
           rel="noopener noreferrer" 
           download
           class="rr-btn rr-btn-primary px-6 py-3 text-xs font-bold shrink-0 self-stretch sm:self-auto text-center inline-flex items-center justify-center gap-2">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"/>
            </svg>
            <span>Download Company Profile (PDF)</span>
        </a>
    </div>
</div>
@endif
