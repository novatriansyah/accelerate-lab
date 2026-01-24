<?php

namespace App\Filament\Pages;

use App\Enums\LeadStatus;
use App\Models\Lead;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class LeadsKanbanBoard extends KanbanBoard
{
    protected static string $model = Lead::class;
    protected static string $statusEnum = LeadStatus::class;
    protected static ?string $navigationIcon = 'heroicon-o-view-columns';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $title = 'Leads Pipeline';

    protected function getEditModalFormSchema(null | int | string $recordId): array
    {
        return [
            \Filament\Forms\Components\Section::make('Lead Details')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('name')->disabled(),
                    \Filament\Forms\Components\TextInput::make('company')->disabled(),
                    \Filament\Forms\Components\TextInput::make('email')->disabled(),
                    \Filament\Forms\Components\TextInput::make('phone')->disabled(),
                    \Filament\Forms\Components\Select::make('status')
                        ->options(\App\Enums\LeadStatus::class)
                        ->disabled(),
                ])->columns(2),
            \Filament\Forms\Components\Section::make('Notes')
                ->schema([
                    \Filament\Forms\Components\Repeater::make('notes')
                        ->label('History')
                        ->schema([
                            \Filament\Forms\Components\Textarea::make('content')
                                ->rows(2)
                                ->disabled(),
                            \Filament\Forms\Components\Placeholder::make('created_at')
                                ->content(fn ($state) => \Carbon\Carbon::parse($state)->diffForHumans()),
                        ])
                        ->addable(false)
                        ->deletable(false)
                        ->reorderable(false)
                        ->collapsible()
                        ->collapsed(),
                    \Filament\Forms\Components\Textarea::make('new_note')
                        ->label('Add New Note')
                        ->rows(3)
                        ->placeholder('Type your note here...'),
                ]),
        ];
    }

    protected function getEditModalRecordData(int | string $recordId, array $data): array
    {
        return Lead::with('notes')->findOrFail($recordId)->toArray();
    }

    protected function editRecord(int | string $recordId, array $data, array $state): void
    {
        if (!empty($data['new_note'])) {
            Lead::findOrFail($recordId)->notes()->create([
                'content' => $data['new_note'],
            ]);
        }
    }

    protected function statuses(): \Illuminate\Support\Collection
    {
        return collect(LeadStatus::cases())
            ->map(function (LeadStatus $status) {
                return [
                    'id' => $status->value,
                    'title' => $status->getLabel(),
                    'color' => $status->getColor(),
                ];
            });
    }

    protected function records(): \Illuminate\Support\Collection
    {
        return Lead::latest()->get();
    }

    public function onStatusChanged(int|string $recordId, string $status, array $fromOrderedIds, array $toOrderedIds): void
    {
        Lead::findOrFail($recordId)->update(['status' => $status]);
    }
}
