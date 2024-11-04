<?php

namespace App\Filament\Volunteer\Resources\MyJobResource\Pages;

use App\Filament\Volunteer\Resources\MyJobResource;
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
