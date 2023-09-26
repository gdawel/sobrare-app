<?php

namespace App\Filament\Resources\PaginasResource\Pages;

use App\Filament\Resources\PaginasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaginas extends EditRecord
{
    protected static string $resource = PaginasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
