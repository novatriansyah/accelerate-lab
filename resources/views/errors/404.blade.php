@extends('frontend.components.layout', [
    'title' => '404 - Resource Not Found | Accelerate Lab',
    'description' => 'The requested endpoint or resource does not exist in our system cluster.'
])

@section('content')
<main class="min-h-[85vh] flex items-center justify-center relative pt-28 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
    {{-- Ambient Glitch Glow --}}
    <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] bg-[#00BFA5]/15 blur-3xl rounded-full -z-10"></div>

    <div class="max-w-2xl w-full text-center relative z-10">
        {{-- Terminal Diagnostic Box --}}
        <div class="p-8 sm:p-12 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-2xl relative overflow-hidden backdrop-blur-xl">
            
            {{-- Window Header Bar --}}
            <div class="flex items-center justify-between pb-6 mb-8 border-b border-slate-100 dark:border-white/10">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                </div>
                <div class="text-xs font-mono text-slate-400 dark:text-slate-500">
                    ERR_404_ROUTE_NOT_FOUND
                </div>
                <div class="w-12"></div>
            </div>

            {{-- 404 Large Glitch Glyph --}}
            <div class="relative inline-block mb-6">
                <span class="text-8xl sm:text-9xl font-black font-mono tracking-tighter text-slate-900 dark:text-white">
                    4<span class="text-[#00BFA5]">0</span>4
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-4">
                Endpoint Unreachable
            </h1>

            <p class="text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-md mx-auto leading-relaxed mb-8">
                The resource or URL route you requested does not exist in our production cluster or has been migrated to a new monolithic subsystem.
            </p>

            {{-- Terminal Log Mockup --}}
            <div class="p-4 rounded-xl bg-slate-950 text-left font-mono text-xs text-slate-300 mb-8 border border-white/5 space-y-1">
                <div class="text-[#00BFA5]">&gt; HTTP_STATUS: 404_NOT_FOUND</div>
                <div class="text-slate-500">&gt; CLUSTER_NODE: jkt-edge-ingress-01</div>
                <div class="text-slate-400">&gt; TRACE: Route dispatch failed for current URI</div>
            </div>

            {{-- Action Buttons with Kinetic Engine --}}
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ url('/') }}" class="rr-btn rr-btn-primary">
                    <span class="btn-wrap">
                        <span class="text-1">Return to Main Grid</span>
                        <span class="text-2">Return to Main Grid</span>
                    </span>
                </a>
                <a href="{{ url('/contact') }}" class="rr-btn rr-btn-outline">
                    <span class="btn-wrap">
                        <span class="text-1">Contact Engineering</span>
                        <span class="text-2">Contact Engineering</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
