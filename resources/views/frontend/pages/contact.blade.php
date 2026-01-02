@extends('frontend.components.layout')

@section('content')
<main class="relative flex-1 bg-grid-pattern min-h-[calc(100vh-65px)]">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 lg:py-24">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
<div class="lg:col-span-5 flex flex-col gap-10">
<div class="flex flex-col gap-4">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 w-fit">
<span class="block size-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-primary text-xs font-bold uppercase tracking-wider">Contact Us</span>
</div>
<h1 class="text-4xl lg:text-5xl font-black leading-tight tracking-[-0.033em] text-text-main dark:text-white">
                            Let's Build <br/> <span class="text-primary">The Future</span>
</h1>
<p class="text-text-secondary dark:text-gray-400 text-lg leading-relaxed max-w-md">
                            Ready to innovate? Whether you have a groundbreaking idea or need technical expertise, our team is ready to accelerate your vision.
                        </p>
</div>
<div class="flex flex-col gap-6 py-6 border-y border-border-light dark:border-border-dark">
<div class="flex items-start gap-4 group">
<div class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">location_on</span>
</div>
<div>
<h3 class="font-bold text-text-main dark:text-white">Visit HQ</h3>
<p class="text-text-secondary dark:text-gray-400 text-sm mt-1">123 Innovation Blvd, Tech City, TC 90210</p>
</div>
</div>
<div class="flex items-start gap-4 group">
<div class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">mail</span>
</div>
<div>
<h3 class="font-bold text-text-main dark:text-white">Email Us</h3>
<a class="text-text-secondary dark:text-gray-400 text-sm mt-1 hover:text-primary transition-colors" href="mailto:hello@acceleratelab.io">hello@acceleratelab.io</a>
</div>
</div>
<div class="flex items-start gap-4 group">
<div class="size-10 rounded-full bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark flex items-center justify-center text-primary shadow-sm group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[20px]">call</span>
</div>
<div>
<h3 class="font-bold text-text-main dark:text-white">Call Us</h3>
<p class="text-text-secondary dark:text-gray-400 text-sm mt-1">+1 (555) 019-2834</p>
</div>
</div>
</div>
<div class="relative w-full h-48 rounded-xl overflow-hidden shadow-md group cursor-pointer">
<div class="absolute inset-0 bg-primary/10 z-10 group-hover:bg-primary/5 transition-colors"></div>
<img alt="Map view of city streets in grayscale" class="w-full h-full object-cover grayscale opacity-60 group-hover:scale-105 transition-transform duration-700" data-alt="Map view of city streets in grayscale" data-location="Tech City" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYdvnhSbOfyr5ux-RS6isr_D6Q68rMA_hiQKu14Z4_d_c7yqladIBCiTLgAG0D3dCndcn9Re--q8Q1wz1Khe6HIZ4R_xMJ9e_U-bRRioeAJbRmJwdcm5O73hpRVt5QJZr9MFodpF3N4ZxdNG-oVSVa2F2MHvtHlX2MqOL7xKOdmWshVlcS1JzKMwmVaOOGS_3RwxAnDE3ndku7gu-znVOQATk7lYiqdbh2KijVmS1xnlVaqlVZ3G9O_bTjEYtgR2pGH--hZaLYRgA"/>
<div class="absolute bottom-3 left-3 z-20 bg-white/90 dark:bg-black/80 px-3 py-1 rounded-md backdrop-blur-sm">
<span class="text-xs font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-primary">near_me</span>
                                Open Maps
                            </span>
</div>
</div>
</div>
<div class="lg:col-span-7">
<div class="bg-surface-light dark:bg-surface-dark rounded-2xl shadow-xl shadow-gray-200/50 dark:shadow-none border border-border-light dark:border-border-dark p-6 sm:p-10 relative overflow-hidden">
<div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
<h2 class="text-2xl font-bold text-text-main dark:text-white mb-8 flex items-center gap-2">
                            Send us a Message
                            <span class="material-symbols-outlined text-primary">edit_square</span>
</h2>
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
  <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form class="flex flex-col gap-6" method="POST" action="{{ action([\App\Http\Controllers\ContactController::class, 'store']) }}">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <label class="flex flex-col flex-1">
            <span class="text-text-main dark:text-gray-200 text-sm font-semibold uppercase tracking-wider mb-2">Full Name *</span>
            <input name="name" required class="w-full rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-12 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400" placeholder="Jane Doe" type="text" value="{{ old('name') }}"/>
        </label>
        <label class="flex flex-col flex-1">
            <span class="text-text-main dark:text-gray-200 text-sm font-semibold uppercase tracking-wider mb-2">Work Email *</span>
            <input name="email" required class="w-full rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-12 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400" placeholder="jane@company.com" type="email" value="{{ old('email') }}"/>
        </label>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <label class="flex flex-col flex-1">
            <span class="text-text-main dark:text-gray-200 text-sm font-semibold uppercase tracking-wider mb-2">Company</span>
            <input name="company" class="w-full rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-12 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400" placeholder="Acme Corp" type="text" value="{{ old('company') }}"/>
        </label>
        <label class="flex flex-col flex-1">
            <span class="text-text-main dark:text-gray-200 text-sm font-semibold uppercase tracking-wider mb-2">Phone</span>
            <input name="phone" class="w-full rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white h-12 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400" placeholder="+1 (555) 000-0000" type="text" value="{{ old('phone') }}"/>
        </label>
    </div>
    <label class="flex flex-col flex-1">
        <span class="text-text-main dark:text-gray-200 text-sm font-semibold uppercase tracking-wider mb-2">Message *</span>
        <textarea name="message" required class="w-full rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark text-text-main dark:text-white min-h-[160px] p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-gray-400 resize-y" placeholder="Tell us about your project goals, timeline, and budget...">{{ old('message') }}</textarea>
    </label>
    <div class="pt-2">
        <button class="group relative w-full flex justify-center py-4 px-6 border border-transparent text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all shadow-lg shadow-primary/30 hover:shadow-primary/50 overflow-hidden" type="submit">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
            <span class="flex items-center gap-2 relative z-10">
                                        Send Message
                                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
            </span>
        </button>
    </div>
    <p class="text-xs text-center text-gray-500 mt-2">
                                By submitting this form, you agree to our <a class="underline hover:text-primary" href="/privacy-policy">Privacy Policy</a>.
                            </p>
</form>
</div>
</div>
</div>
<div class="mt-20 pt-10 border-t border-border-light dark:border-border-dark">
<p class="text-center text-sm font-medium text-text-secondary dark:text-gray-500 mb-6 uppercase tracking-widest">Trusted by industry leaders</p>
<div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
<div class="text-xl font-bold flex items-center gap-2"><span class="material-symbols-outlined text-3xl">token</span> NextGen</div>
<div class="text-xl font-bold flex items-center gap-2"><span class="material-symbols-outlined text-3xl">diamond</span> Apex</div>
<div class="text-xl font-bold flex items-center gap-2"><span class="material-symbols-outlined text-3xl">bolt</span> VoltSys</div>
<div class="text-xl font-bold flex items-center gap-2"><span class="material-symbols-outlined text-3xl">hub</span> Nexus</div>
</div>
</div>
</div>
</main>
@endsection

