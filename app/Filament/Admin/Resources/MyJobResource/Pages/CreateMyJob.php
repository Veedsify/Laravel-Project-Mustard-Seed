<?php

namespace App\Filament\Admin\Resources\MyJobResource\Pages;

use App\Filament\Admin\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyJob extends CreateRecord
{
    protected static string $resource = MyJobResource::class;
}
