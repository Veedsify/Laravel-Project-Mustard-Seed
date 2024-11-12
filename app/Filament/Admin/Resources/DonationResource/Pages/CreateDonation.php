<?php

namespace App\Filament\Admin\Resources\DonationResource\Pages;

use App\Filament\Admin\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;

//    public function create(array $data)
//    {
//        // Create the donation record
//        $donation = parent::create($data);
//
//        // Update the related campaign's raised amount
//        $campaign = Campaign::find($data['campaign_id']);
//        if ($campaign) {
//            $campaign->increment('raised', $data['amount']);
//        }
//
//        return true;
//    }
}
