<?php

namespace App\Filament\Admin\Resources\PageHeaderImagesResource\Pages;

use App\Filament\Admin\Resources\PageHeaderImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageHeaderImages extends EditRecord
{
    protected static string $resource = PageHeaderImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
