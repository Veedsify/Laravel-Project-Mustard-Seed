<?php

namespace App\Filament\Admin\Resources\AboutPageConfigResource\Pages;

use App\Filament\Admin\Resources\AboutPageConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutPageConfig extends EditRecord
{
    protected static string $resource = AboutPageConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
