<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Title field
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                // Short Description field
                Forms\Components\TextInput::make('short_description')
                    ->label('Short Description')
                    ->nullable()
                    ->maxLength(255),

                // Description field
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(1000),

                // Visibility Toggle
                Forms\Components\Toggle::make('visible')
                    ->label('Visible')
                    ->default(true),

                // Position field
                Forms\Components\TextInput::make('position')
                    ->label('Position')
                    ->numeric()
                    ->default(0),

                // Logo field
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('logos')
                    ->maxSize(2048)
                    ->nullable(),

                // Menu Options
                Forms\Components\Toggle::make('in_menu')
                    ->label('Show in Menu')
                    ->default(false), // Default to false, so categories are not shown in the menu by default

                Forms\Components\TextInput::make('menu_order')
                    ->label('Menu Order')
                    ->numeric()
                    ->nullable() // Optional field, if it is not provided it can be null
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
