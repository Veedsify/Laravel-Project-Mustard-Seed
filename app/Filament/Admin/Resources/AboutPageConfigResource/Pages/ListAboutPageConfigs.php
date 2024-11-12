<?php

namespace App\Filament\Admin\Resources\AboutPageConfigResource\Pages;

use App\Filament\Admin\Resources\AboutPageConfigResource;
use App\Models\AboutPageConfig;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutPageConfigs extends ListRecords
{
    protected static string $resource = AboutPageConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->hidden(
                fn () => AboutPageConfig::count() > 0
            )
        ];
    }
}
