<?php

namespace App\Filament\Donator\Resources\ItemResource\Pages;

use App\Filament\Donator\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
    protected static ?string $title = 'New Donations';
}
