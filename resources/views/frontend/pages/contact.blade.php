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
            
            @php
                $contactEmail = \App\Models\SiteSetting::get('contact_email', 'hello@acceleratelab.id');
                $contactPhone = \App\Models\SiteSetting::get('contact_whatsapp', \App\Models\SiteSetting::get('contact_phone', '+62 821-2559-0020'));
                $cleanPhone = preg_replace('/[^0-9]/', '', $contactPhone);
                $studioLocation = \App\Models\SiteSetting::get('registered_city', \App\Models\SiteSetting::get('contact_address', 'Jakarta & Bandung, Indonesia'));
                $legalName = \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri');
                $currentLocale = app()->getLocale();
                $contactWaMsg = $currentLocale === 'id' 
                    ? 'Halo Accelerate Lab! Saya ingin berdiskusi mengenai kebutuhan proyek baru.' 
                    : 'Hello Accelerate Lab! I would like to discuss a new project.';
                $contactWaUrl = "https://wa.me/{$cleanPhone}?text=" . urlencode($contactWaMsg);
            @endphp

            {{-- Left Column: Direct Contact & Entity Info --}}
            <div class="lg:col-span-5 space-y-6 fade-anim" data-direction="left">
                
                {{-- Rapid Action Card: WhatsApp Direct --}}
                <div class="p-6 rounded-3xl bg-gradient-to-br from-emerald-500/10 via-teal-500/5 to-transparent border border-emerald-500/25 shadow-md">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#25D366] text-white flex items-center justify-center shrink-0 shadow-md">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-mono font-bold uppercase text-[#00BFA5]">Respon Cepat via WhatsApp</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">Langsung dengan Principal Architect</div>
                        </div>
                    </div>
                    <a href="{{ $contactWaUrl }}" target="_blank" rel="noopener noreferrer" class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-2xl bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-sm shadow-md transition-all">
                        <span>Chat WhatsApp Langsung</span>
                    </a>
                </div>

                <div class="p-8 sm:p-10 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#00BFA5]/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="space-y-6">
                        <div>
                            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase">Operating Entity / Entitas Legal</span>
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mt-1">{{ $legalName }}</h2>
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
                                    <a href="mailto:{{ $contactEmail }}" class="text-base font-semibold text-slate-900 dark:text-white hover:text-[#00BFA5] transition-colors">
                                        {{ $contactEmail }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#00BFA5]/10 border border-[#00BFA5]/25 flex items-center justify-center text-[#00BFA5] flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-mono uppercase text-slate-500 dark:text-slate-400">WhatsApp Hotline</div>
                                    <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" rel="noopener noreferrer" class="text-base font-semibold text-slate-900 dark:text-white hover:text-[#00BFA5] transition-colors">
                                        {{ $contactPhone }}
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
                                        {{ $studioLocation }}
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

                {{-- Company Profile PDF Download Component --}}
                @include('frontend.components.company-profile-download')
            </div>

            {{-- Right Column: Interactive Consultation Form --}}
            <div class="lg:col-span-7 fade-anim" data-direction="right">
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
                                    @if(isset($services) && $services->isNotEmpty())
                                        @foreach($services as $srv)
                                            <option value="{{ $srv->title }}" {{ old('service_interest') == $srv->title ? 'selected' : '' }}>{{ $srv->title }}</option>
                                        @endforeach
                                    @else
                                        <option value="Custom Web Applications" {{ old('service_interest') == 'Custom Web Applications' ? 'selected' : '' }}>Custom Web Applications</option>
                                        <option value="Mobile App Development" {{ old('service_interest') == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                                        <option value="Cloud Architecture & DevOps" {{ old('service_interest') == 'Cloud Architecture & DevOps' ? 'selected' : '' }}>Cloud Architecture & DevOps</option>
                                        <option value="UI/UX Product Design" {{ old('service_interest') == 'UI/UX Product Design' ? 'selected' : '' }}>UI/UX Product Design</option>
                                    @endif
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
