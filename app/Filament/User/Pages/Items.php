<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Items extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-inbox';
    protected static ?string $navigationGroup = 'Campaigns';
    protected static ?string $navigationLabel = 'Donated Items';
    protected static ?string $title = 'Donated Items';
    protected static string $view = 'filament.user.pages.items';
}
