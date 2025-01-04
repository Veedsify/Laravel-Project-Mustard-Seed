<?php

namespace App\Filament\Admin\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Admin\Resources\ApplicantFromOrganizationResource;
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
