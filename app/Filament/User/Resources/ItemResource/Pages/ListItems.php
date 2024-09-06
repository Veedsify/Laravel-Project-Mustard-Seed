<?php

namespace App\Filament\User\Resources\ItemResource\Pages;

use App\Filament\User\Resources\ItemResource;
use App\Filament\User\Resources\ItemResource\Widgets\TotalDonations;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TotalDonations::class
        ];
    }
}
