<?php

namespace App\Filament\Imports;

use App\Models\Lead;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class LeadImporter extends Importer
{
    protected static ?string $model = Lead::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('email')
                ->rules(['email', 'max:255', 'unique:leads,email']),
            ImportColumn::make('company')
                ->rules(['max:255']),
            ImportColumn::make('phone')
                ->rules(['max:255']),
            ImportColumn::make('message'),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Lead
    {
        // Normalize status to lowercase to match Enum
        if (isset($this->data['status'])) {
            $this->data['status'] = strtolower($this->data['status']);
        }

        // Sanitize phone number to remove tab character if present from export
        if (isset($this->data['phone'])) {
            $this->data['phone'] = trim($this->data['phone']);
        }

        $lead = new Lead();
        $lead->source = 'Import';
        
        return $lead;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your lead import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
