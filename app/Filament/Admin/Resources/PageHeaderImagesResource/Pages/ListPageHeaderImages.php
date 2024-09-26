<?php

namespace App\Filament\Admin\Resources\PageHeaderImagesResource\Pages;

use App\Filament\Admin\Resources\PageHeaderImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPageHeaderImages extends ListRecords
{
    protected static string $resource = PageHeaderImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
