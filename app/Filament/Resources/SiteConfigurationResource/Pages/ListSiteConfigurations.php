<?php

namespace App\Filament\Resources\SiteConfigurationResource\Pages;

use App\Filament\Resources\SiteConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteConfigurations extends ListRecords
{
    protected static string $resource = SiteConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
