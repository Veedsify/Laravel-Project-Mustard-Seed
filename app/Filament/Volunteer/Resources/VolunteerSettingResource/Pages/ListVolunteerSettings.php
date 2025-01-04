<?php

namespace App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;

use App\Filament\Volunteer\Resources\VolunteerSettingResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Actions\MountableAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListVolunteerSettings extends ListRecords
{
    protected static string $resource = VolunteerSettingResource::class;
    protected static ?string $title = 'Settings';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-s-cog')
                ->label('Add Settings')
                ->hidden(fn() => Auth::user()->volunteer_settings?->count() > 0),
        ];
    }
}
