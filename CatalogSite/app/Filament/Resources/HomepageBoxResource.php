<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageBoxResource\Pages;
use App\Filament\Resources\HomepageBoxResource\RelationManagers;
use App\Models\HomepageBox;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomepageBoxResource extends Resource
{
    protected static ?string $model = HomepageBox::class;

    static $page = HomepageBoxResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('link')
                    ->label('Link')
                    ->required()
                    ->url()
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->nullable(),

                TextInput::make('position')
                    ->label('Position')
                    ->numeric()
                    ->required()
                    ->nullable(),

                Toggle::make('visible')
                    ->label('Visible')
                    ->default(true)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                // Define your filters here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Select Homepage Box')
                ->label('Select Boxes')
                ->url(fn() => static::getUrl('select')) // Set the URL for the Select page
                ->color('primary') // You can customize the button color (optional)
                ->visible(fn() => true), // Optional visibility logic
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getResource(): string
    {
        return HomepageBoxResource::class;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageBoxes::route('/'),
            'create' => Pages\CreateHomepageBox::route('/create'),
            'edit' => Pages\EditHomepageBox::route('/{record}/edit'),
            'select' => Pages\SelectHomepageBoxes::route('/select'),
        ];
    }
}
