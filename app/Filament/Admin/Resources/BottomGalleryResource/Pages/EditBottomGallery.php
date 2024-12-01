<?php

namespace App\Filament\Admin\Resources\BottomGalleryResource\Pages;

use App\Filament\Admin\Resources\BottomGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBottomGallery extends EditRecord
{
    protected static string $resource = BottomGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
