<?php

namespace App\Filament\Volunteer\Resources\ItemResource\Pages;

use App\Filament\Volunteer\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
}
