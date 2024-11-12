<?php

namespace App\Filament\Admin\Resources\ServiceeResource\Pages;

use App\Filament\Admin\Resources\ServiceeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicees extends ListRecords
{
    protected static string $resource = ServiceeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
