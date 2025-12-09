@props(['id' => null, 'title' => null, 'subtitle' => null, 'dark' => false])

<section @if($id) id="{{ $id }}" @endif class="py-20 {{ $dark ? 'bg-black/30' : 'bg-transparent' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title)
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 font-mono">
                    <span class="text-lab-neon">/</span> {{ $title }}
                </h2>
                @if($subtitle)
                    <p class="text-gray-400 max-w-2xl text-lg">{{ $subtitle }}</p>
                @endif
                <div class="h-px w-24 bg-lab-neon mt-6"></div>
            </div>
        @endif

        {{ $slot }}
    </div>
</section>
