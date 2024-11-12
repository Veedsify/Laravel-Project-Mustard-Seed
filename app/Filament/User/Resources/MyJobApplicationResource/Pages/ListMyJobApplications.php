<?php

namespace App\Filament\User\Resources\MyJobApplicationResource\Pages;

use App\Filament\User\Resources\MyJobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyJobApplications extends ListRecords
{
    protected static string $resource = MyJobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
