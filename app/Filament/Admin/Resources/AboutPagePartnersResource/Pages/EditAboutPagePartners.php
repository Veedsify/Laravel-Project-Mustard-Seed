<?php

namespace App\Filament\Admin\Resources\AboutPagePartnersResource\Pages;

use App\Filament\Admin\Resources\AboutPagePartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutPagePartners extends EditRecord
{
    protected static string $resource = AboutPagePartnersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
