<?php

namespace App\Filament\Admin\Resources\ServiceeResource\Pages;

use App\Filament\Admin\Resources\ServiceeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicee extends EditRecord
{
    protected static string $resource = ServiceeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
