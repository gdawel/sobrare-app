<?php

namespace App\Filament\Resources\GruposDeTestesResource\Pages;

use App\Filament\Resources\GruposDeTestesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGruposDeTestes extends EditRecord
{
    protected static string $resource = GruposDeTestesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
