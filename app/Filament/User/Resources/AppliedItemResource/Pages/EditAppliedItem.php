<?php

namespace App\Filament\User\Resources\AppliedItemResource\Pages;

use App\Filament\User\Resources\AppliedItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppliedItem extends EditRecord
{
    protected static string $resource = AppliedItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
