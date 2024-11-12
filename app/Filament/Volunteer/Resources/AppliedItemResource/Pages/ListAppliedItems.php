<?php

namespace App\Filament\Volunteer\Resources\AppliedItemResource\Pages;

use App\Filament\Volunteer\Resources\AppliedItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppliedItems extends ListRecords
{
    protected static string $resource = AppliedItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
