<?php

namespace App\Filament\User\Resources\MyJobResource\Pages;

use App\Filament\User\Resources\MyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyJob extends EditRecord
{
    protected static string $resource = MyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
