<?php

namespace App\Filament\User\Resources\MyJobApplicationResource\Pages;

use App\Filament\User\Resources\MyJobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyJobApplication extends EditRecord
{
    protected static string $resource = MyJobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
