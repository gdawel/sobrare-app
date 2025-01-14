<?php

namespace App\Filament\Resources\DescendenciasResource\Pages;

use App\Filament\Resources\DescendenciasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDescendencias extends ListRecords
{
    protected static string $resource = DescendenciasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
