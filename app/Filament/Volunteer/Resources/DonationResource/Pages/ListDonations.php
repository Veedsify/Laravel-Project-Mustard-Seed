<?php

namespace App\Filament\Volunteer\Resources\DonationResource\Pages;

use App\Filament\Volunteer\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonations extends ListRecords
{
    protected static string $resource = DonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
