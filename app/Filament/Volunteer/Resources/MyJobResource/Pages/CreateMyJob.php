<?php

namespace App\Filament\Volunteer\Resources\MyJobResource\Pages;

use App\Filament\Volunteer\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyJob extends CreateRecord
{
    protected static string $resource = MyJobResource::class;
    protected static ?string $title = 'Add New Job';
}
