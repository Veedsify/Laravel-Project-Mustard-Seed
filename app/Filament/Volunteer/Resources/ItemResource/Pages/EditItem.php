<?php

namespace App\Filament\Volunteer\Resources\ItemResource\Pages;

use App\Filament\Volunteer\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;
    protected static ?string $title = 'Approve Donation';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
