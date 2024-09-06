<?php

namespace App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;

use App\Filament\Volunteer\Resources\VolunteerSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerSetting extends EditRecord
{
    protected static string $resource = VolunteerSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
