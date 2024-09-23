<?php

namespace App\Filament\Resources\HomepageBoxResource\Pages;

use App\Filament\Resources\HomepageBoxResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageBoxes extends ListRecords
{
    protected static string $resource = HomepageBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
