<?php

namespace App\Filament\Resources\PerguntasResource\Pages;

use App\Filament\Resources\PerguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerguntas extends EditRecord
{
    protected static string $resource = PerguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
