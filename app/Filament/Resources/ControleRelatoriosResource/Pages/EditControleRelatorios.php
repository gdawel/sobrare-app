<?php

namespace App\Filament\Resources\ControleRelatoriosResource\Pages;

use App\Filament\Resources\ControleRelatoriosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditControleRelatorios extends EditRecord
{
    protected static string $resource = ControleRelatoriosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
