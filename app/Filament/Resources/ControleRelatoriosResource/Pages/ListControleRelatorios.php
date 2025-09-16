<?php

namespace App\Filament\Resources\ControleRelatoriosResource\Pages;

use App\Filament\Resources\ControleRelatoriosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListControleRelatorios extends ListRecords
{
    protected static string $resource = ControleRelatoriosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
