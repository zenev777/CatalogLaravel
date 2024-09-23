<?php

namespace App\Filament\Resources\HomepageBoxResource\Pages;

use App\Filament\Resources\HomepageBoxResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomepageBox extends EditRecord
{
    protected static string $resource = HomepageBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
