<?php

namespace App\Filament\Resources\GruposDeTestesResource\Pages;

use App\Filament\Resources\GruposDeTestesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGruposDeTestes extends ListRecords
{
    protected static string $resource = GruposDeTestesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
