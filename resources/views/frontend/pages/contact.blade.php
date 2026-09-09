@extends('frontend.components.layout', [
    'title' => $title ?? 'Contact Us - Accelerate Lab',
    'description' => $description ?? 'Get in touch with Accelerate Lab. Start a project, request a consultation, or ask about our custom software development and cloud services.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Lighting --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/15 via-[#00BFA5]/5 to-transparent blur-3xl -z-10"></div>

    {{-- Header Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative mb-16 lg:mb-20">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#00BFA5]/10 border border-[#00BFA5]/25 text-[#00BFA5] text-xs font-mono font-semibold tracking-wider uppercase mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00BFA5] animate-ping"></span>
            <span>Konsultasi Strategis & Inovasi Digital</span>
        </div>

        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-900 dark:text-white max-w-5xl mx-auto leading-[1.1] mb-8">
            Mulai Diskusi <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00BFA5] via-teal-300 to-[#009688]">Kebutuhan Bisnis Anda</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
            Apakah Anda merencanakan transformasi digital, modernisasi alur kerja, atau pengembangan produk baru? Hubungi tim kami untuk konsultasi strategi dan estimasi solusi yang tepat sasaran.
        </p>
    </section>

    {{-- Main Content Split --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            {{-- Left Column: Direct Contact & Entity Info --}}
            <div class="lg:col-span-5 space-y-8">
                <div class="p-8 sm:p-10 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#00BFA5]/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="space-y-6">
                        <div>
                            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">Operating Entity / Entitas Legal</span>
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">PT Akselerasi Digital Mandiri</h2>
                            <p class="text-xs font-mono text-slate-500 dark:text-slate-400 mt-1">Accelerate Lab Engineering Studio</p>
                        </div>

                        <hr class="border-slate-100 dark:border-white/10">

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-mono uppercase text-slate-500 dark:text-slate-400">Electronic Mail</div>
                                    <a href="mailto:hello@acceleratelab.id" class="text-base font-semibold text-slate-900 dark:text-white hover:text-[#00BFA5] transition-colors">
                                        hello@acceleratelab.id
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-mono uppercase text-slate-500 dark:text-slate-400">WhatsApp Hotline</div>
                                    <a href="https://wa.me/6282125590020" target="_blank" rel="noopener noreferrer" class="text-base font-semibold text-slate-900 dark:text-white hover:text-[#00BFA5] transition-colors">
                                        +62 821-2559-0020
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-mono uppercase text-slate-500 dark:text-slate-400">Studio Location</div>
                                    <div class="text-base font-semibold text-slate-900 dark:text-white">
                                        Jakarta & Bandung, Indonesia
                                    </div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">Operating across GMT+7 / Asia-Pacific</div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100 dark:border-white/10">

                        <div class="p-4 rounded-2xl bg-[#00BFA5]/10 border border-[#00BFA5]/20 flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-[#00BFA5] animate-pulse"></span>
                            <span class="text-xs font-mono text-slate-900 dark:text-white font-medium">
                                Response Guarantee: Under 2 hours during business days.
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Interactive Consultation Form --}}
            <div class="lg:col-span-7">
                <div class="p-8 sm:p-12 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl relative">
                    
                    @if(session('success'))
                        <div class="mb-8 p-6 rounded-2xl bg-[#00BFA5]/15 border border-[#00BFA5]/30 text-slate-900 dark:text-white flex items-start gap-4">
                            <svg class="w-6 h-6 text-[#00BFA5] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <h3 class="font-bold text-lg">Inquiry Successfully Received</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-8 p-6 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-600 dark:text-rose-400">
                            <h3 class="font-bold text-sm mb-2">Please correct the following fields:</h3>
                            <ul class="list-disc list-inside text-xs space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Honeypot field --}}
                        <input type="text" name="my_favorite_color" class="hidden" tabindex="-1" autocomplete="off">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Full Name <span class="text-[#00BFA5]">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Budi Santoso"
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Work Email <span class="text-[#00BFA5]">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="budi@company.com"
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="company" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Company / Organization
                                </label>
                                <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="PT Nusantara Digital"
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Phone / WhatsApp Number
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+62 812..."
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="service_interest" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Primary Interest
                                </label>
                                <select id="service_interest" name="service_interest"
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-[#090D16] border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                                    <option value="Custom Web Applications" {{ old('service_interest') == 'Custom Web Applications' ? 'selected' : '' }}>Custom Web Applications</option>
                                    <option value="Mobile App Development" {{ old('service_interest') == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                                    <option value="Cloud Architecture & DevOps" {{ old('service_interest') == 'Cloud Architecture & DevOps' ? 'selected' : '' }}>Cloud Architecture & DevOps</option>
                                    <option value="UI/UX Product Design" {{ old('service_interest') == 'UI/UX Product Design' ? 'selected' : '' }}>UI/UX Product Design</option>
                                    <option value="Enterprise Modernization" {{ old('service_interest') == 'Enterprise Modernization' ? 'selected' : '' }}>Enterprise Modernization</option>
                                </select>
                            </div>

                            <div>
                                <label for="timeline" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                    Expected Timeline
                                </label>
                                <select id="timeline" name="timeline"
                                    class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-[#090D16] border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">
                                    <option value="Immediate (< 1 Month)">Immediate (&lt; 1 Month)</option>
                                    <option value="1 - 3 Months">1 - 3 Months</option>
                                    <option value="3 - 6 Months">3 - 6 Months</option>
                                    <option value="Exploratory / Discovery">Exploratory / Discovery</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-mono font-semibold uppercase text-slate-700 dark:text-slate-300 mb-2">
                                Project Overview & Scope
                            </label>
                            <textarea id="message" name="message" rows="5" placeholder="Briefly describe your objectives, existing stack, key features, and desired outcomes..."
                                class="w-full px-4 py-3.5 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-[#00BFA5] focus:ring-1 focus:ring-[#00BFA5] transition-all text-sm">{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="rr-btn rr-btn-primary w-full py-4 justify-center">
                                <span class="btn-wrap">
                                    <span class="text-1">Submit Consultation Inquiry</span>
                                    <span class="text-2">Submit Consultation Inquiry</span>
                                </span>
                            </button>
                            <p class="text-center text-xs text-slate-500 dark:text-slate-400 mt-4">
                                Non-Disclosure Guaranteed. Your technical details remain strictly confidential.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection
