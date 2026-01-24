<?php

namespace App\Filament\Exports;

use App\Models\Lead;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class LeadExporter extends Exporter
{
    protected static ?string $model = Lead::class;

    public function getFormats(): array
    {
        return [
            ExportFormat::Csv,
            ExportFormat::Xlsx,
        ];
    }

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('email'),
            ExportColumn::make('company'),
            ExportColumn::make('phone')
                ->formatStateUsing(fn ($state) => "\t" . $state),
            ExportColumn::make('message'),
            ExportColumn::make('status'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationTitle(Export $export): string
    {
        if ($export->successful_rows === 0 && $export->getFailedRowsCount() === 0) {
           return 'Export Failed';
        }
        
        if ($export->successful_rows === 0) {
            return 'Export Failed';
        }

        if ($export->getFailedRowsCount() > 0) {
            return 'Export Completed with Errors';
        }

        return 'Export Completed';
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        if ($export->successful_rows === 0 && $export->getFailedRowsCount() === 0) {
            return 'No rows were exported. Please check your filters. If you want to download the import template, please click the "Download Template" button.';
        }
        
        if ($export->successful_rows === 0) {
            return 'All rows failed to export. ' . number_format($export->getFailedRowsCount()) . ' ' . str('row')->plural($export->getFailedRowsCount()) . ' failed.';
        }

        $body = 'Your lead export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
