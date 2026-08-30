<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemoResource\Pages;
use App\Models\Demo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DemoResource extends Resource
{
    protected static ?string $model = Demo::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationGroup = 'Showcase & Demos';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Demo Information')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Demo::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('client_name')
                                    ->label('Client Name')
                                    ->placeholder('e.g. Dhoni Martien & Partners'),

                                Forms\Components\TextInput::make('industry')
                                    ->placeholder('e.g. Corporate Law, Fintech'),

                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('HTML / CSS / JS Prototype Source')
                            ->schema([
                                Forms\Components\Textarea::make('html_content')
                                    ->label('Complete HTML Source Code')
                                    ->rows(20)
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Paste the complete standalone HTML including <head>, <style>, and <script>. It will render completely isolated.'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Branding & Visuals')
                            ->schema([
                                Forms\Components\FileUpload::make('client_logo')
                                    ->label('Client Logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('demos/logos')
                                    ->imageResizeMode('contain')
                                    ->maxSize(2048)
                                    ->helperText('Displayed in showcase toolbar & passcode lock screen.'),

                                Forms\Components\FileUpload::make('thumbnail')
                                    ->label('Cover / Thumbnail')
                                    ->image()
                                    ->disk('public')
                                    ->directory('demos/thumbnails')
                                    ->maxSize(4096)
                                    ->helperText('Used for WhatsApp link preview (og:image) & table.'),
                            ]),

                        Forms\Components\Section::make('Prototype Media Assets')
                            ->schema([
                                Forms\Components\FileUpload::make('assets')
                                    ->label('Uploaded Assets / Files')
                                    ->multiple()
                                    ->disk('public')
                                    ->directory('demos/assets')
                                    ->reorderable()
                                    ->downloadable()
                                    ->openable()
                                    ->helperText('Upload images, icons, or mockups. Reference in HTML as /storage/demos/assets/filename'),
                            ]),

                        Forms\Components\Section::make('Access & Settings')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active Demo')
                                    ->default(true)
                                    ->helperText('Inactive demos return 404.'),

                                Forms\Components\TextInput::make('access_passcode')
                                    ->label('Access Passcode (Optional)')
                                    ->placeholder('Leave empty for public access')
                                    ->password()
                                    ->revealable(),

                                Forms\Components\Select::make('default_device')
                                    ->options([
                                        'desktop' => 'Desktop (100%)',
                                        'tablet' => 'Tablet (768px)',
                                        'mobile' => 'Mobile (390px)',
                                    ])
                                    ->default('desktop')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Cover')
                    ->square()
                    ->disk('public'),

                Tables\Columns\ImageColumn::make('client_logo')
                    ->label('Logo')
                    ->height(24)
                    ->disk('public'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),


                Tables\Columns\TextColumn::make('client_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('industry')
                    ->badge(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),

                Tables\Columns\TextColumn::make('default_device')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'desktop' => 'info',
                        'tablet' => 'warning',
                        'mobile' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\Action::make('showcase')
                    ->label('Showcase')
                    ->icon('heroicon-o-device-phone-mobile')
                    ->url(fn (Demo $record): string => route('demos.showcase', $record->slug))
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('preview')
                    ->label('Fullscreen')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('success')
                    ->url(fn (Demo $record): string => route('demos.preview', $record->slug))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemos::route('/'),
            'create' => Pages\CreateDemo::route('/create'),
            'edit' => Pages\EditDemo::route('/{record}/edit'),
        ];
    }
}
