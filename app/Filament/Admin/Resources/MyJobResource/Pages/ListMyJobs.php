<?php

namespace App\Filament\Admin\Resources\MyJobResource\Pages;

use App\Filament\Admin\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyJobs extends ListRecords
{
    protected static string $resource = MyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
