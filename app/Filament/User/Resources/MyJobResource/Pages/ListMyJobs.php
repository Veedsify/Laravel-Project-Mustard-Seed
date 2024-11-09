<?php

namespace App\Filament\User\Resources\MyJobResource\Pages;

use App\Filament\User\Resources\MyJobResource;
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
