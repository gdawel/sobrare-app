<?php

namespace App\Filament\Resources\SiteConfigurationResource\Pages;

use App\Filament\Resources\SiteConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteConfiguration extends EditRecord
{
    protected static string $resource = SiteConfigurationResource::class;

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
