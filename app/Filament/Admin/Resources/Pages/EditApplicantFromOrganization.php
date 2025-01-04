<?php

namespace App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplicantFromOrganization extends EditRecord
{
    protected static string $resource = ApplicantFromOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
