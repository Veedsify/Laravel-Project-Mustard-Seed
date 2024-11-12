<?php

namespace App\Filament\Volunteer\Resources\ItemResource\Pages;

use App\Filament\Volunteer\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = ItemResource::class;
    protected static ?string $title = 'All Donations';
    protected static $sort = ['name' => 'asc'];


    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
