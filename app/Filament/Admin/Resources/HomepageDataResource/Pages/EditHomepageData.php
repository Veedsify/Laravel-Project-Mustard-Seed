<?php

namespace App\Filament\Admin\Resources\HomepageDataResource\Pages;

use App\Filament\Admin\Resources\HomepageDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomepageData extends EditRecord
{
    protected static string $resource = HomepageDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
