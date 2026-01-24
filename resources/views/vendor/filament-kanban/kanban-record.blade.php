<div
    id="{{ $record->getKey() }}"
    wire:click="recordClicked('{{ $record->getKey() }}', {{ @json_encode($record) }})"
    class="record bg-white dark:bg-gray-700 rounded-lg p-4 shadow-sm cursor-grab font-medium text-gray-600 dark:text-gray-200 flex flex-col justify-between"
    style="min-height: 200px;"
    @if($record->timestamps && now()->diffInSeconds($record->{$record::UPDATED_AT}, true) < 3)
        x-data
        x-init="
            $el.classList.add('animate-pulse-twice', 'bg-primary-100', 'dark:bg-primary-800')
            $el.classList.remove('bg-white', 'dark:bg-gray-700')
            setTimeout(() => {
                $el.classList.remove('bg-primary-100', 'dark:bg-primary-800')
                $el.classList.add('bg-white', 'dark:bg-gray-700')
            }, 3000)
        "
    @endif
>
    <div class="space-y-2">
        <div>
            <div class="font-bold text-lg leading-tight">{{ $record->{static::$recordTitleAttribute} }}</div>
            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $record->description }}</div>
        </div>
        
        <div class="text-sm space-y-1">
            @if($record->email)
                <div class="flex items-center gap-2 overflow-hidden text-ellipsis">
                    <x-heroicon-m-envelope class="w-4 h-4 text-gray-400"/>
                    <span class="truncate">{{ $record->email }}</span>
                </div>
            @endif
            @if($record->phone)
                <div class="flex items-center gap-2">
                    <x-heroicon-m-phone class="w-4 h-4 text-gray-400"/>
                    <span>{{ $record->phone }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="pt-4 flex items-center justify-between text-xs text-gray-400 border-t border-gray-100 dark:border-gray-600 mt-2">
        <span class="px-2 py-0.5 rounded bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400">
            {{ $record->source ?? 'Manual' }}
        </span>
        <span>{{ $record->created_at->diffForHumans() }}</span>
    </div>
</div>
