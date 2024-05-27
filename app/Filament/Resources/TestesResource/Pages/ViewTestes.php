<?php

namespace App\Filament\Resources\TestesResource\Pages;

use App\Filament\Resources\TestesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTestes extends ViewRecord
{
    protected static string $resource = TestesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
