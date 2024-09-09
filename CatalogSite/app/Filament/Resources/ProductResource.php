<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
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

        // Избор на категории
        Forms\Components\Select::make('categories')
            ->label('Categories')
            ->multiple()
            ->relationship('categories', 'title') // assuming a relationship to categories
            ->nullable(),

        // Избор на изображения (много снимки)
        Forms\Components\FileUpload::make('images')
            ->label('Product Images')
            ->directory('products/images')
            ->multiple() // allows multiple image uploads
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
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('option_price')
                    ->label('Option Price')
                    ->numeric()
                    ->required(),
            ])
            ->minItems(1) // поне една опция
            ->collapsed(false), // показва всички опции разширени

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
