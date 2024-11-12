<?php

namespace App\Filament\Admin\Resources\CampaignCategoryResource\Pages;

use App\Filament\Admin\Resources\CampaignCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaignCategories extends ListRecords
{
    protected static string $resource = CampaignCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Category'),
        ];
    }
}
