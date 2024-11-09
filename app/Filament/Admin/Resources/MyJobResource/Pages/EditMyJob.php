<?php

namespace App\Filament\Admin\Resources\MyJobResource\Pages;

use App\Filament\Admin\Resources\MyJobResource;
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
