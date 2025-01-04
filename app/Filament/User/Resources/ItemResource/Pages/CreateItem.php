<?php

namespace App\Filament\User\Resources\ItemResource\Pages;

use App\Filament\User\Resources\ItemResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
    protected static ?string $title = 'New Donations';


    protected function handleRecordCreation(array $data): Model
    {        
        Notification::make()
        ->success()
        ->title('You have been assigned a new donation.')
        ->body('You have been assigned a new donation. Please check your dashboard.')
        ->sendToDatabase(User::find($data['volunteer_id']));

        return static::getModel()::create($data);
    }
}
