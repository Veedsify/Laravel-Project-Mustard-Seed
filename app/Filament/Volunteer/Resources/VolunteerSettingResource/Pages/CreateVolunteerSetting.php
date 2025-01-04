<?php

namespace App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;

use App\Filament\Volunteer\Resources\VolunteerSettingResource;
use Filament\Actions;
use Filament\Actions\Action as ActionsAction;
use Filament\Pages\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateVolunteerSetting extends CreateRecord
{
    protected static string $resource = VolunteerSettingResource::class;

    public function afterFill(): void
    {
        if (auth()->user()->volunteer_settings->count() > 0) {
            $this->redirect(ListVolunteerSettings::getUrl());
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static bool $canCreateAnother = false;

    protected function getCreateFormAction(): ActionsAction
    {
        return parent::getCreateFormAction()
            ->icon('heroicon-s-cog')
            ->label('Save Settings');
    }
}
