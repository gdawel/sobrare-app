<?php

namespace App\Filament\Resources\DepoimentosResource\Pages;

use App\Filament\Resources\DepoimentosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepoimentos extends ListRecords
{
    protected static string $resource = DepoimentosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
