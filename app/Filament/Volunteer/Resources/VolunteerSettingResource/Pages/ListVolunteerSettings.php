<?php

namespace App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;

use App\Filament\Volunteer\Resources\VolunteerSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerSettings extends ListRecords
{
    protected static string $resource = VolunteerSettingResource::class;
    protected static ?string $title = 'Settings';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()
        ];
    }

    protected function getFooterActions(): array
    {
        return [

        ];
    }

}
