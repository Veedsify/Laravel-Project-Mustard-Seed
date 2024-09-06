<?php

namespace App\Filament\Admin\Resources\CampaignCategoryResource\Pages;

use App\Filament\Admin\Resources\CampaignCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignCategory extends EditRecord
{
    protected static string $resource = CampaignCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
