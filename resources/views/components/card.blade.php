@props(['title' => null, 'icon' => null])

<div {{ $attributes->merge(['class' => 'bg-lab-bg border border-white/10 p-6 hover:border-lab-neon/50 transition-colors duration-300 group']) }}>
    @if($icon)
        <div class="mb-4 text-lab-neon group-hover:scale-110 transition-transform duration-300">
            {{ $icon }}
        </div>
    @endif

    @if($title)
        <h3 class="text-xl font-bold text-white mb-3 font-mono group-hover:text-lab-neon transition-colors">
            {{ $title }}
        </h3>
    @endif

    <div class="text-gray-400 text-sm leading-relaxed">
        {{ $slot }}
    </div>
</div>
