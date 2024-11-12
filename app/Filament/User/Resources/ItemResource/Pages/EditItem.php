<?php

namespace App\Filament\User\Resources\ItemResource\Pages;

use App\Filament\User\Resources\ItemResource;
use Filament\Resources\Pages\EditRecord;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;
    public static function canEdit($record): bool
    {
        return false;
    }
    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
