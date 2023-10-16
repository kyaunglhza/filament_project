<?php

namespace App\Filament\Resources\NationalCardResource\Pages;

use App\Filament\Resources\NationalCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNationalCard extends EditRecord
{
    protected static string $resource = NationalCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
