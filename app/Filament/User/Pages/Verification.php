<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Verification extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-shield-check';
    protected static ?string $title = 'Verifications';
    protected static ?string $navigationGroup = 'Settings';
    protected static string $view = 'filament.user.pages.verification';
    protected static ?int $sort = -1;
}
