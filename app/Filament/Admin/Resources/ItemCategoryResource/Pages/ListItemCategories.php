<?php

namespace App\Filament\Admin\Resources\ItemCategoryResource\Pages;

use App\Filament\Admin\Resources\ItemCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemCategories extends ListRecords
{
    protected static string $resource = ItemCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
