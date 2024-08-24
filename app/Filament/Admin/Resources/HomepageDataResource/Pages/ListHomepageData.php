<?php

namespace App\Filament\Admin\Resources\HomepageDataResource\Pages;

use App\Filament\Admin\Resources\HomepageDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageData extends ListRecords
{
    protected static string $resource = HomepageDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
