<?php

namespace App\Filament\Admin\Resources\BottomGalleryResource\Pages;

use App\Filament\Admin\Resources\BottomGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBottomGalleries extends ListRecords
{
    protected static string $resource = BottomGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
