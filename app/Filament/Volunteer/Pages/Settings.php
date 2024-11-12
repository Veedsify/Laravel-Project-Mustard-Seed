<?php

namespace App\Filament\Volunteer\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-cog-8-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.volunteer.pages.settings';
}
