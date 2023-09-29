<?php

namespace App\Filament\Resources\PaginasResource\Pages;

use App\Filament\Resources\PaginasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaginas extends CreateRecord
{
    protected static string $resource = PaginasResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
