<?php

namespace App\Filament\Resources\GenerosResource\Pages;

use App\Filament\Resources\GenerosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneros extends ListRecords
{
    protected static string $resource = GenerosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
