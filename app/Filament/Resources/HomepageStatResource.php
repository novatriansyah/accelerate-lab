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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Statistic Details')
                    ->schema([
                        Forms\Components\Select::make('section')
                            ->options([
                                'hero' => 'Hero Section',
                                'capabilities' => 'Capabilities Section',
                            ])
                            ->required()
                            ->default('hero'),
                        Forms\Components\TextInput::make('value')
                            ->label('Value')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. 99.9, 50'),
                        Forms\Components\TextInput::make('unit')
                            ->label('Unit')
                            ->maxLength(255)
                            ->placeholder('e.g. %, +, yr'),
                        Forms\Components\TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Uptime Guarantee'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('section')
                    ->badge()
                    ->colors([
                        'primary' => 'hero',
                        'success' => 'capabilities',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
