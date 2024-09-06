<?php

namespace App\Filament\Admin\Resources\ItemCategoryResource\Pages;

use App\Filament\Admin\Resources\ItemCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItemCategory extends CreateRecord
{
    protected static string $resource = ItemCategoryResource::class;
    protected static ?string $title = 'New Category';
}
