<?php

namespace App\Filament\Admin\Resources\ContactPageResource\Pages;

use App\Filament\Admin\Resources\ContactPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactPage extends EditRecord
{
    protected static string $resource = ContactPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
