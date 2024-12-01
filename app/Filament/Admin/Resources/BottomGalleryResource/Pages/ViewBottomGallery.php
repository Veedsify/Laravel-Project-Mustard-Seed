<?php

namespace App\Filament\Admin\Resources\BottomGalleryResource\Pages;

use App\Filament\Admin\Resources\BottomGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBottomGallery extends ViewRecord
{
    protected static string $resource = BottomGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
