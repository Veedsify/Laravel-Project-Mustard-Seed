<?php

namespace App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApplicantFromOrganizations extends ListRecords
{
    protected static string $resource = ApplicantFromOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Applicant')  ,
        ];
    }
}
