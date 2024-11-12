<?php

namespace App\Filament\Admin\Resources\MyJobApplicationResource\Pages;

use App\Filament\Admin\Resources\MyJobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyJobApplications extends ListRecords
{
    protected static string $resource = MyJobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
