<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageStatResource\Pages;
use App\Models\HomepageStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageStatResource extends Resource
{
    protected static ?string $model = HomepageStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Home Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('section')
                            ->options([
                                'hero' => 'Hero Section (Top)',
                                'capabilities' => 'Capabilities Section (Middle)',
                                'about' => 'About Page (Stats Section)',
                            ])
                            ->required()
                            ->default('hero'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('value')
                                    ->label('Value')
                                    ->placeholder('99.9')
                                    ->required(),
                                Forms\Components\TextInput::make('unit')
                                    ->label('Unit (Suffix)')
                                    ->placeholder('%'),
                                Forms\Components\TextInput::make('label')
                                    ->label('Label')
                                    ->placeholder('Uptime Guarantee')
                                    ->required()
                                    ->columnSpan(1),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->formatStateUsing(fn ($state, $record) => $state . ($record->unit ?? ''))
                    ->label('Display Value'),
                Tables\Columns\TextColumn::make('section')
                    ->badge()
                    ->colors([
                        'primary' => 'hero',
                        'warning' => 'capabilities',
                        'success' => 'about',
                    ]),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('section')
                    ->options([
                        'hero' => 'Hero Section',
                        'capabilities' => 'Capabilities Section',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageStats::route('/'),
            'create' => Pages\CreateHomepageStat::route('/create'),
            'edit' => Pages\EditHomepageStat::route('/{record}/edit'),
        ];
    }
}
