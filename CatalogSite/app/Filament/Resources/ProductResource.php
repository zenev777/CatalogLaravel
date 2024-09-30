<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Заглавие на продукта
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                // Кратко описание на продукта
                Forms\Components\Textarea::make('short_description')
                    ->label('Short Description')
                    ->maxLength(255)
                    ->nullable(),

                // Пълно описание на продукта
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required(),

                // SKU на продукта
                Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->maxLength(255)
                    ->nullable(),

                // Код на производителя
                Forms\Components\TextInput::make('manufacturer_code')
                    ->label('Manufacturer Code')
                    ->maxLength(255),

                // Избор на производител (manufacturer_id)
                Forms\Components\Select::make('manufacturer_id')
                    ->label('Manufacturer')
                    ->relationship('manufacturer', 'title') // assuming there's a relationship 'manufacturer'
                    ->required(),
                // Slug на продукта
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique('products', 'slug'),

                // Цена на продукта
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->step(0.01), // decimal field for price (8,2)

                // Стара цена на продукта (old_price)
                Forms\Components\TextInput::make('old_price')
                    ->label('Old Price')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->step(0.01) // decimal field for old price (8,2)
                    ->nullable(), // Старото поле може да е незадължително

                // Позиция в списъка
                Forms\Components\TextInput::make('position')
                    ->label('Position')
                    ->numeric()
                    ->default(0)
                    ->nullable(),

                // Статус на продукта: видим или скрит
                Forms\Components\Toggle::make('visible')
                    ->label('Visible')
                    ->default(true)
                    ->nullable(),


                Forms\Components\Select::make('category_id')
                    ->label('Categories') // "Parent Category" in Bulgarian
                    ->relationship('categories', 'title') // using the `parent` relationship and displaying the `title` of the category
                    ->options(Category::all()->pluck('title', 'id')) // Fetching all categories for the dropdown
                    ->searchable() // Makes the dropdown searchable
                    ->nullable(), // Allows the category to have no parent

                Forms\Components\FileUpload::make('images')
                    ->label('Product Images')
                    ->disk('uploads')
                    ->directory('uploads')
                    ->image()
                    ->maxSize(2048)
                    ->nullable(), // 2MB max size per image

                // Тегло
                Forms\Components\TextInput::make('weight')
                    ->label('Weight (grams)')
                    ->numeric()
                    ->nullable(),

                // Размери
                Forms\Components\TextInput::make('width')
                    ->label('Width (cm)')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('height')
                    ->label('Height (cm)')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('length')
                    ->label('Length (cm)')
                    ->numeric()
                    ->nullable(),

                // Налични количества
                Forms\Components\TextInput::make('available_qty')
                    ->label('Available Quantity')
                    ->numeric()
                    ->default(0)
                    ->nullable(),

                // Характеристики: Представен, Нов, Топ цена
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured'),
                Forms\Components\Toggle::make('is_new')
                    ->label('New'),
                Forms\Components\Toggle::make('is_top_price')
                    ->label('Top Price'),

                // Гаранция
                Forms\Components\Toggle::make('warranty_1y')
                    ->label('1 Year Warranty'),
                Forms\Components\Toggle::make('warranty_6m')
                    ->label('6 Months Warranty'),

                // Опции (Заглавие и Цена за всяка опция)
                Forms\Components\Repeater::make('options')
                    ->label('Options')
                    ->schema([
                        Forms\Components\TextInput::make('option_title')
                            ->label('Option Title')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('option_price')
                            ->label('Option Price')
                            ->numeric(),
                    ])
                    ->minItems(1) // поне една опция
                    ->collapsed(false), // показва всички опции разширени 

                // Мощност (Power)
                Forms\Components\TextInput::make('power')
                    ->label('Power')
                    ->numeric()
                    ->nullable(),

                // Впръскване (Vpruzkvane)
                Forms\Components\TextInput::make('vpruzkvane')
                    ->label('Vpruzkvane')
                    ->nullable(),

                // Реверс (Revers)
                Forms\Components\TextInput::make('revers')
                    ->label('Revers')
                    ->nullable(),

                // Таймер (Taimer)
                Forms\Components\TextInput::make('taimer')
                    ->label('Taimer')
                    ->nullable(),

                // Осветление (Osvetlenie)
                Forms\Components\TextInput::make('osvetlenie')
                    ->label('Osvetlenie')
                    ->nullable(),

                // Разстояние между водачите (Raztqnie Mezhdu Vodachite)
                Forms\Components\TextInput::make('raztuqnie_mejdu_vodachite')
                    ->label('Distance Between Guides (cm)')
                    ->numeric()
                    ->step(0.01)
                    ->nullable(),

                // Температура (Temperatura)
                Forms\Components\TextInput::make('temperatura')
                    ->label('Temperature')
                    ->numeric()
                    ->nullable(),

                // Свързване (Svurzvane)
                Forms\Components\TextInput::make('svurzvane')
                    ->label('Connection')
                    ->nullable(),

                //Много към много за свързаните продукти
                Forms\Components\BelongsToManyMultiSelect::make('connectedProducts')
                    ->relationship('connectedProducts', 'title')
                    ->label('Connected Products')
                    ->placeholder('Select connected products'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
