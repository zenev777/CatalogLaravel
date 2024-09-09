<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
        Forms\Components\TextInput::make('name')
            ->label('Page Name')
            ->required() // cannot be empty
            ->maxLength(255), // max char 255

        Forms\Components\TextInput::make('slug')
            ->label('Slug')
            ->required() // cannot be empty
            ->maxLength(255) // max char 255
            ->unique('pages', 'slug'), // unique in pages table

        Forms\Components\Textarea::make('description')
            ->label('Description')
            ->maxLength(65535), // text field

        Forms\Components\Toggle::make('visible')
            ->label('Visible') // use boolean (true/false)
            ->default(true), // default true

        Forms\Components\TextInput::make('position')
            ->label('Position')
            ->numeric() // ensures it's a number
            ->default(0), // default 0
    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'), 
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
