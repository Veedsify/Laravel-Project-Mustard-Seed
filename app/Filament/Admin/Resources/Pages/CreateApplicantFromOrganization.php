<?php

namespace App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource\Pages;

use App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource;
use App\Models\ApplicantFromOrganization;
use App\Models\Item;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateApplicantFromOrganization extends CreateRecord
{
    protected static string $resource = ApplicantFromOrganizationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $applicantFromOrganizationCount = ApplicantFromOrganization::where('item_id', $data['item_id'])->count();
        $item = Item::findOrFail($data['item_id']); // Use findOrFail for required items
        $appliedItems = $item->appliedItems->count();
        $itemQuantity = $item->quantity;
        $itemUnit = $item->unit;

        $condition = (($appliedItems * $itemUnit) + ($applicantFromOrganizationCount * $itemUnit)) >= $itemQuantity;

        if ($condition) {
            Notification::make()
                ->danger()
                ->title('Item Quantity Exceeded')
                ->body('The quantity of the donated item has been exceeded.')
                ->send();

            $this->halt(); // Halt further execution if the condition is met
        }

        // Proceed to create the record
        return static::getModel()::create($data);
    }
}
