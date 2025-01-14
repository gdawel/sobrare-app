<?php

namespace App\Filament\Resources\DescendenciasResource\Pages;

use App\Filament\Resources\DescendenciasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDescendencias extends EditRecord
{
    protected static string $resource = DescendenciasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
