<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-cog-8-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.user.pages.settings';
}
