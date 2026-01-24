<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Admin';

    protected static ?string $navigationLabel = 'Leads / Inbox';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Lead Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email(),
                        TextInput::make('company'),
                        TextInput::make('phone'),
                        Select::make('status')
                            ->options(\App\Enums\LeadStatus::class)
                            ->required(),
                        Forms\Components\Hidden::make('source')
                            ->default('Manual'),
                        Textarea::make('message')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('company')->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('source')->label('Source')->searchable()->badge()->color('gray'),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Received At'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(\App\Enums\LeadStatus::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(\App\Filament\Exports\LeadExporter::class)
                        ->formats([
                            \Filament\Actions\Exports\Enums\ExportFormat::Csv,
                            \Filament\Actions\Exports\Enums\ExportFormat::Xlsx,
                        ]),
                ]),
            ])
            ->headerActions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ExportAction::make('exportCsv')
                        ->label('Export as CSV')
                        ->exporter(\App\Filament\Exports\LeadExporter::class)
                        ->formats([\Filament\Actions\Exports\Enums\ExportFormat::Csv])
                        ->icon('heroicon-o-document-text')
                        ->before(function ($action, $livewire) {
                            $count = $livewire->getFilteredTableQuery()->count();
                            if ($count === 0) {
                                \Filament\Notifications\Notification::make()
                                    ->warning()
                                    ->title('Export Failed')
                                    ->body('No rows found to export. If you need the template, please use the "Download Template" button.')
                                    ->persistent()
                                    ->send();
                                
                                $action->halt();
                            }
                        }),
                    Tables\Actions\ExportAction::make('exportXlsx')
                        ->label('Export as Excel')
                        ->exporter(\App\Filament\Exports\LeadExporter::class)
                        ->formats([\Filament\Actions\Exports\Enums\ExportFormat::Xlsx])
                        ->icon('heroicon-o-table-cells')
                        ->before(function ($action, $livewire) {
                            $count = $livewire->getFilteredTableQuery()->count();
                            if ($count === 0) {
                                \Filament\Notifications\Notification::make()
                                    ->warning()
                                    ->title('Export Failed')
                                    ->body('No rows found to export. If you need the template, please use the "Download Template" button.')
                                    ->persistent()
                                    ->send();
                                
                                $action->halt();
                            }
                        }),
                ])
                ->label('Export')
                ->icon('heroicon-o-arrow-down-tray')
                ->button(),
                Tables\Actions\ImportAction::make()
                    ->importer(\App\Filament\Imports\LeadImporter::class)
                    ->fileRules([
                        \Illuminate\Validation\Rules\File::types(['csv', 'txt']),
                    ]),
                Tables\Actions\Action::make('downloadTemplate')
                    ->label('Download Template')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        $headers = ['name', 'email', 'company', 'phone', 'message', 'status'];
                        $callback = function() use ($headers) {
                            $file = fopen('php://output', 'w');
                            fputcsv($file, $headers);
                            fclose($file);
                        };
                        return response()->stream($callback, 200, [
                            "Content-type" => "text/csv",
                            "Content-Disposition" => "attachment; filename=leads_template.csv",
                            "Pragma" => "no-cache",
                            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                            "Expires" => "0"
                        ]);
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            LeadResource\RelationManagers\NotesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
