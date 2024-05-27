<?php

namespace App\Filament\Resources\PerguntasResource\Pages;

use App\Filament\Resources\PerguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPerguntas extends ViewRecord
{
    protected static string $resource = PerguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
