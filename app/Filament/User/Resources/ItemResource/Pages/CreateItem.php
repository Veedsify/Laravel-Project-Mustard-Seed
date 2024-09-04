<?php

namespace App\Filament\User\Resources\ItemResource\Pages;

use App\Filament\User\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
    protected static ?string $title = 'New Donations';
}
