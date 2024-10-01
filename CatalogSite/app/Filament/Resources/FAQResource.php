<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FAQResource\Pages;
use App\Filament\Resources\FAQResource\RelationManagers;
use App\Models\FAQ;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('question')->required(),
            Textarea::make('answer')->required(),
            Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'title') // Assuming 'name' is the category field
                ->required(),
            TextInput::make('position')->numeric()->required(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('question')->sortable()->searchable(),
            TextColumn::make('answer')->limit(50),
            TextColumn::make('category.name')->label('Category'),
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
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}
