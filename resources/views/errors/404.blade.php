@extends('frontend.components.layout', [
    'title' => '404 - Page Not Found | Accelerate Lab',
    'description' => 'The page you are looking for does not exist or has been moved. Explore Accelerate Lab services, case studies, or return home.'
])

@section('content')
    <div class="relative min-h-[70vh] flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-slate-950">
        <!-- Background Glow Effects -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/3 left-1/3 w-64 h-64 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl w-full text-center">
            <!-- 404 Badge / Code -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-500/10 border border-primary-500/20 text-primary-400 text-sm font-semibold tracking-wide uppercase mb-6">
                <span class="w-2 h-2 rounded-full bg-primary-400 animate-ping"></span>
                Error Code 404
            </div>

            <h1 class="text-7xl sm:text-9xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400 tracking-tight mb-4">
                404
            </h1>

            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                Page Not Found
            </h2>

            <p class="text-slate-400 text-lg mb-8 max-w-lg mx-auto">
                Oops! The page you were looking for doesn't exist, has been moved, or is temporarily unavailable.
            </p>

            <!-- Navigation Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-primary-600 to-cyan-600 text-white font-medium hover:from-primary-500 hover:to-cyan-500 transition-all duration-200 shadow-lg shadow-primary-500/20">
                    Back to Home
                </a>
                <a href="{{ route('services') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-medium hover:bg-slate-800 hover:text-white transition-all duration-200">
                    Explore Services
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-medium hover:bg-slate-800 hover:text-white transition-all duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
@endsection
