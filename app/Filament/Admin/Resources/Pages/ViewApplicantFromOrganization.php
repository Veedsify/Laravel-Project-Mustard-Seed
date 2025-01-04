<?php

namespace App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewApplicantFromOrganization extends ViewRecord
{
    protected static string $resource = ApplicantFromOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
