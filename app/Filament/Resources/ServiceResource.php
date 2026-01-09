<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Services Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Service::class, 'slug', ignoreRecord: true),

                        Forms\Components\TextInput::make('icon')
                            ->label('Material Icon Name')
                            ->placeholder('e.g. database'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\FileUpload::make('hero_image')
                            ->image()
                            ->directory('services')
                            ->maxSize(2048)
                            ->label('Hero Image')
                            ->helperText('Recommended size: 1200x800px. Used in service page headers.')
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('has_custom_page')
                            ->label('Has Custom Page')
                            ->helperText('If enabled, this service will use a custom Blade view matching its slug (e.g., frontend.pages.slug).'),

                        Forms\Components\Textarea::make('short_description')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('category')
                            ->options([
                                'development' => 'Custom Development',
                                'strategy' => 'Product Strategy',
                            ])
                            ->default('development')
                            ->required(),

                        Forms\Components\TextInput::make('headline')
                            ->label('Section Headline')
                            ->placeholder('e.g. Turning Chaos into Order'),

                        Forms\Components\TextInput::make('cta_text')
                            ->label('Custom CTA Text')
                            ->placeholder('e.g. Start Your Project'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Key Benefits (Checklist)')
                    ->schema([
                        Forms\Components\Repeater::make('benefits')
                            ->simple(
                                Forms\Components\TextInput::make('benefit')
                            )
                            ->label('Benefit Items'),
                    ]),

                Forms\Components\Section::make('Modern Technologies')
                    ->schema([
                        Forms\Components\Repeater::make('technologies')
                            ->schema([
                                Forms\Components\TextInput::make('name')->required(),
                                Forms\Components\TextInput::make('icon')->label('Material Icon')->required(),
                            ])
                            ->columns(2)
                            ->grid(3),
                    ]),

                Forms\Components\Section::make('Why Choose Us')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->schema([
                                Forms\Components\TextInput::make('title')->required(),
                                Forms\Components\TextInput::make('icon')->label('Material Icon')->required(),
                                Forms\Components\Textarea::make('description')->required(),
                            ])
                            ->columns(2)
                            ->grid(2),
                    ]),

                Forms\Components\Section::make('How We Build')
                    ->schema([
                        Forms\Components\Repeater::make('process')
                            ->schema([
                                Forms\Components\TextInput::make('title')->required(),
                                Forms\Components\Textarea::make('description')->required(),
                            ])
                            ->columns(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
