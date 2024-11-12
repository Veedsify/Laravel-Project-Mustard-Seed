<?php

namespace App\Filament\Admin\Resources\HomepageDataResource\Pages;

use App\Filament\Admin\Resources\HomepageDataResource;
use App\Models\HomepageData;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageData extends ListRecords
{
    protected static string $resource = HomepageDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->visible(fn () => HomepageData::first() === null)    
            ->label('Create')
            // Actions\EditAction::make(),w
        ];
    }
}
