<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource\RelationManagers;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Title field
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required() // Field cannot be empty
                    ->maxLength(255), // Maximum length of 255 characters

                // Short Description field
                Forms\Components\TextInput::make('short_description')
                    ->label('Short Description')
                    ->nullable() // This field is optional
                    ->maxLength(255)
                    ->nullable(), // Maximum length of 255 characters

                // Description field
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required() // Field cannot be empty
                    ->maxLength(1000), // You can adjust the maximum length as needed

                // Visibility Toggle
                Forms\Components\Toggle::make('visible')
                    ->label('Visible')
                    ->default(true)
                    ->nullable(), // Default to true (visible)

                // Position field
                Forms\Components\TextInput::make('position')
                    ->label('Position')
                    ->numeric() // Only numeric values allowed
                    ->default(0)
                    ->nullable(), // Default to 0

                // Logo field
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image() // Only images are allowed
                    ->disk('uploads') // Specify the disk for file storage
                    ->directory('uploads') // Specify the directory to store logos
                    ->maxSize(2048) // Max size of 2MB
                    ->rules(['dimensions:max_width=500,max_height=500'])
                    ->nullable(), // This field is optional

                // Feature Toggle
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured')
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
