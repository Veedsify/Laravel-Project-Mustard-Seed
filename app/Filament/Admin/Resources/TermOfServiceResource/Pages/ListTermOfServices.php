<?php

namespace App\Filament\Admin\Resources\TermOfServiceResource\Pages;

use App\Filament\Admin\Resources\TermOfServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTermOfServices extends ListRecords
{
    protected static string $resource = TermOfServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
