<?php

namespace App\Filament\Resources\GenerosResource\Pages;

use App\Filament\Resources\GenerosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneros extends EditRecord
{
    protected static string $resource = GenerosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
