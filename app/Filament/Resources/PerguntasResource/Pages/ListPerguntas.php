<?php

namespace App\Filament\Resources\PerguntasResource\Pages;

use App\Filament\Resources\PerguntasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerguntas extends ListRecords
{
    protected static string $resource = PerguntasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
