<?php

namespace App\Filament\Admin\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Admin\Resources\ApplicantFromOrganizationResource;
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
