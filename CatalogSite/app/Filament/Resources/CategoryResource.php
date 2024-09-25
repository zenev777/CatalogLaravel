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
use Illuminate\Validation\Rule;

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
                    ->label('Title') // "Title" in Bulgarian
                    ->required()
                    ->maxLength(255),

                // Short Description field
                Forms\Components\TextInput::make('short_description')
                    ->label('Short Description')
                    ->nullable()
                    ->maxLength(255),

                // Description field
                Forms\Components\RichEditor::make('description')
                    ->label('description') // "Description" in Bulgarian
                    ->nullable() // Made nullable to match the form
                    ->maxLength(1000),

                // Visibility and Featured toggles
                Forms\Components\Toggle::make('visible')
                    ->label('visible') // "Visible" in Bulgarian
                    ->default(true),

                Forms\Components\Toggle::make('featured')
                    ->label('featured') // "Featured" in Bulgarian
                    ->default(false),

                // Position field
                Forms\Components\TextInput::make('position')
                    ->label('position') // "Position" in Bulgarian
                    ->numeric()
                    ->default(0),


                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required() // cannot be empty
                    ->maxLength(255) // max char 255
                    ->rules(function ($record) {
                        return $record
                            ? [Rule::unique('pages', 'slug')->ignore($record->id)] // Ignore unique rule for the current record being edited
                            : ['unique:pages,slug']; // Apply unique rule only when creating a new record
                    }),

                // Parent Category dropdown (select field)
                Forms\Components\Select::make('parent_id')
                    ->label('Parent category') // "Parent Category" in Bulgarian
                    ->relationship('parent', 'title') // using the `parent` relationship and displaying the `title` of the category
                    ->options(Category::all()->pluck('title', 'id')) // Fetching all categories for the dropdown
                    ->searchable() // Makes the dropdown searchable
                    ->nullable(), // Allows the category to have no parent

                // Menu Icon and Image fields
                Forms\Components\FileUpload::make('menu_icon')
                    ->label('Menu Icon (35x38px, svg)') // "Menu icon" in Bulgarian
                    ->image()
                    ->disk('uploads')
                    ->directory('images')
                    ->maxSize(1024)
                    ->nullable(),

                Forms\Components\FileUpload::make('image')
                    ->label('Image') // "Image (jpg)" in Bulgarian
                    ->image()
                    ->disk('uploads')
                    ->directory('images')
                    ->maxSize(2048)
                    ->nullable(),
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
