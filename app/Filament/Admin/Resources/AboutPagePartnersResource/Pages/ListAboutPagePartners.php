<?php

namespace App\Filament\Admin\Resources\AboutPagePartnersResource\Pages;

use App\Filament\Admin\Resources\AboutPagePartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutPagePartners extends ListRecords
{
    protected static string $resource = AboutPagePartnersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
