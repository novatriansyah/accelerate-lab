<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Case Studies Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Project Details')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Project::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('client'),
                                Forms\Components\TextInput::make('industry'),
                                
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Project')
                                    ->helperText('Enable to display this project in the "Featured" section of the Case Studies page.')
                                    ->default(false),
                                
                                Forms\Components\ColorPicker::make('color')
                                    ->required(),
                                
                                Forms\Components\TextInput::make('icon')
                                    ->label('Material Icon Name')
                                    ->placeholder('e.g. rocket_launch'),

                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('challenge')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('solution')
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('technologies')
                                    ->relationship('technologies', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable(),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Visuals')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Featured Image')
                                    ->image()
                                    ->directory('projects'),

                                Forms\Components\FileUpload::make('gallery')
                                    ->multiple()
                                    ->image()
                                    ->directory('projects/gallery')
                                    ->reorderable(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Data & Proof')
                            ->schema([
                                Forms\Components\Repeater::make('stats')
                                    ->schema([
                                        Forms\Components\TextInput::make('label')->required(),
                                        Forms\Components\TextInput::make('value')->required(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Repeater::make('testimonials')
                                    ->schema([
                                        Forms\Components\TextInput::make('client')->required(),
                                        Forms\Components\Textarea::make('quote')->required(),
                                    ])
                                    ->collapsed(),
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
                Tables\Columns\ImageColumn::make('image_path'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('industry')
                    ->badge(),
                Tables\Columns\ToggleColumn::make('is_featured'),
                Tables\Columns\ColorColumn::make('color'),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
