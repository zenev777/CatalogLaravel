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
            // Избор на родителска категория
            Forms\Components\Select::make('parent_id')
                ->label('Parent Category')
                ->relationship('parent', 'title') // assuming 'parent' is the relation
                ->nullable() // root category if null
                ->searchable(), // allows searching categories
    
            // Заглавие на категорията
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required() // задължително поле
                ->maxLength(255), // максимална дължина 255 символа
    
            // Slug на категорията
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required() // задължително поле
                ->maxLength(255)
                ->unique('categories', 'slug'), // уникален slug за всяка категория
    
            // Кратко описание
            Forms\Components\Textarea::make('short_description')
                ->label('Short Description')
                ->maxLength(255), // максимална дължина 255 символа
    
            // Пълно описание с WYSIWYG редактор
            Forms\Components\RichEditor::make('description')
                ->label('Description') // текстово поле с форматинг
                ->required(), // задължително
    
            // Статус: видима или скрита
            Forms\Components\Toggle::make('visible')
                ->label('Visible')
                ->default(true), // по подразбиране е видима
    
            // Представена категория (featured)
            Forms\Components\Toggle::make('featured')
                ->label('Featured')
                ->default(false), // по подразбиране не е представена
    
            // Позиция в списъка
            Forms\Components\TextInput::make('position')
                ->label('Position')
                ->numeric() // приема само числа
                ->default(0), // по подразбиране 0
    
            // Икона за менюто
            Forms\Components\TextInput::make('menu_icon')
                ->label('Menu Icon Path')
                ->maxLength(255), // път до иконата
    
            // Избор на изображение за категорията
            Forms\Components\FileUpload::make('image')
                ->label('Category Image')
                ->directory('categories/images') // папка за съхранение на изображенията
                ->image() // само изображения могат да се качват
                ->maxSize(2048), // максимален размер 2MB
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
