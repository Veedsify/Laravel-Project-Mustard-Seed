<?php

namespace App\Filament\Admin\Resources\ItemCategoryResource\Pages;

use App\Filament\Admin\Resources\ItemCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemCategory extends EditRecord
{
    protected static string $resource = ItemCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
