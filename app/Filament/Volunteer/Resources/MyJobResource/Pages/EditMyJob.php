<?php

namespace App\Filament\Volunteer\Resources\MyJobResource\Pages;

use App\Filament\Volunteer\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyJob extends EditRecord
{
    protected static string $resource = MyJobResource::class;
    protected static ?string $title =  'Edit Job Details';
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
