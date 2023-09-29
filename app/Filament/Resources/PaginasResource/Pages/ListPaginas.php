<?php

namespace App\Filament\Resources\PaginasResource\Pages;

use App\Filament\Resources\PaginasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaginas extends ListRecords
{
    protected static string $resource = PaginasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
