@props(['variant' => 'primary', 'size' => 'md', 'href' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center font-mono font-bold tracking-wide transition-all duration-300 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-lab-bg';

    $variants = [
        'primary' => 'bg-lab-accent border-lab-accent text-white hover:bg-blue-700 hover:border-blue-700 focus:ring-lab-accent',
        'neon' => 'bg-transparent border-lab-neon text-lab-neon hover:bg-lab-neon/10 shadow-[0_0_10px_rgba(6,182,212,0.2)] hover:shadow-[0_0_20px_rgba(6,182,212,0.4)] focus:ring-lab-neon',
        'outline' => 'bg-transparent border-gray-600 text-gray-300 hover:border-white hover:text-white focus:ring-gray-500',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-xs',
        'md' => 'px-6 py-3 text-sm',
        'lg' => 'px-8 py-4 text-base',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
