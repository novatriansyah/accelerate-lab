@props(['variant' => 'primary', 'href' => '#'])

@php
    $baseClasses = 'inline-flex items-center px-6 py-3 border border-transparent text-sm font-mono font-medium rounded-sm shadow-sm transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900';
    $variants = [
        'primary' => 'bg-lab-neon text-slate-950 hover:bg-cyan-400 focus:ring-cyan-500 shadow-[0_0_15px_rgba(6,182,212,0.3)] hover:shadow-[0_0_25px_rgba(6,182,212,0.5)]',
        'outline' => 'bg-transparent border-lab-neon text-lab-neon hover:bg-lab-neon/10 focus:ring-cyan-500',
        'secondary' => 'bg-lab-accent text-white hover:bg-blue-500 focus:ring-blue-600',
    ];
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($attributes->has('href'))
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
