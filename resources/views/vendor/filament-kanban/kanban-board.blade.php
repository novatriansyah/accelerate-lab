<x-filament-panels::page>
    <style>
        .kanban-container * {
            scrollbar-width: none !important; /* Firefox */
            -ms-overflow-style: none !important; /* IE/Edge */
        }
        .kanban-container *::-webkit-scrollbar {
            display: none !important; /* Chrome/Safari/Opera */
        }
    </style>
    <div x-data wire:ignore.self class="kanban-container md:flex overflow-x-auto overflow-y-hidden gap-4 pb-4">
        @foreach($statuses as $status)
            @include(static::$statusView)
        @endforeach

        <div wire:ignore>
            @include(static::$scriptsView)
        </div>
    </div>

    @unless($disableEditModal)
        <x-filament-kanban::edit-record-modal/>
    @endunless
</x-filament-panels::page>
