<?php

namespace App\Filament\Resources\NationalCardResource\Pages;

use App\Filament\Resources\NationalCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNationalCards extends ListRecords
{
    protected static string $resource = NationalCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
