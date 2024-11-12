<?php

namespace App\Filament\User\Resources\MyJobResource\Pages;

use App\Filament\User\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyJob extends CreateRecord
{
    protected static string $resource = MyJobResource::class;
}
