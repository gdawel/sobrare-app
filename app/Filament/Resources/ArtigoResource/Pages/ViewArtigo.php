<?php

namespace App\Filament\Resources\ArtigoResource\Pages;

use App\Filament\Resources\ArtigoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewArtigo extends ViewRecord
{
    protected static string $resource = ArtigoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
