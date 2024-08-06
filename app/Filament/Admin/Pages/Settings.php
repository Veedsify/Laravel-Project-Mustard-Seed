<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-cog-6-tooth';

    protected static ?string $title = 'Settings';
    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = '/settings';

    protected static string $view = 'filament.admin.pages.settings';


}
