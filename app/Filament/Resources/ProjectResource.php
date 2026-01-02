<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('client')
                            ->label('Client Name'),
                        TextInput::make('color')
                            ->label('Accent Color (e.g., blue, purple, primary)')
                            ->placeholder('primary'),
                        TextInput::make('icon')
                            ->label('Material Icon Name')
                            ->placeholder('payments')
                            ->helperText('Use Google Material Icons names'),
                    ])->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('challenge')
                            ->rows(3),
                        Textarea::make('solution')
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Media & Stats')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Project Thumbnail')
                            ->image()
                            ->directory('projects')
                            ->columnSpanFull(),
                        TagsInput::make('technology_tags')
                            ->separator(',')
                            ->suggestions(['Laravel', 'React', 'Vue', 'AWS', 'Tailwind', 'Docker']),
                        Repeater::make('stats')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('value')->required(),
                            ])
                            ->columns(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Image'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('client')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
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
