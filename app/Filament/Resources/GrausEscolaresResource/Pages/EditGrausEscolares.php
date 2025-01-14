<?php

namespace App\Filament\Resources\GrausEscolaresResource\Pages;

use App\Filament\Resources\GrausEscolaresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrausEscolares extends EditRecord
{
    protected static string $resource = GrausEscolaresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
