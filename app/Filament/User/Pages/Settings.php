<?php

namespace App\Filament\User\Pages;

use App\Http\Middleware\CheckUserIsIdVerified;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];

    protected static ?string $navigationIcon = 'heroicon-s-cog-8-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.user.pages.settings';
}
