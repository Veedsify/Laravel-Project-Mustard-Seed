<?php

namespace App\Filament\User\Resources\MyJobApplicationResource\Pages;

use App\Filament\User\Resources\MyJobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyJobApplication extends CreateRecord
{
    protected static string $resource = MyJobApplicationResource::class;
}
