@props([
    'icon' => 'inbox',
    'title' => 'Coming Soon',
    'description' => 'This content is being prepared. Check back later.',
])

<div class="flex flex-col items-center justify-center py-12 px-6 text-center">
    <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
        <x-app-icon :name="$icon ?? 'inbox'" class="w-8 h-8 text-slate-400 dark:text-slate-500" />
    </div>
    <h3 class="text-lg font-bold text-slate-500 dark:text-slate-400 mb-1">{{ $title }}</h3>
    <p class="text-sm text-slate-400 dark:text-slate-500 max-w-sm">{{ $description }}</p>
</div>
