<?php

namespace App\Filament\Admin\Resources\ContactPageResource\Pages;

use App\Filament\Admin\Resources\ContactPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactPage extends CreateRecord
{
    protected static string $resource = ContactPageResource::class;
}
