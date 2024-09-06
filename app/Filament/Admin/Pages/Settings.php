<?php

namespace App\Filament\Admin\Pages;

use Filament\Notifications\Actions\Action;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-cog-6-tooth';

    protected static ?string $title = 'Settings';
    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = '/settings';

    protected static string $view = 'filament.admin.pages.settings';

    // public function mount(){
    //     Notification::make()
    //     ->title('Settings')
    //     ->body('Settings have been updated.')
    //     ->danger()
    //     ->icon('heroicon-s-cog')
    //     ->persistent()
    //     ->actions([
    //         Action::make('view')
    //             ->label('View')
    //             ->url('/admin/settings')
    //             ->outlined()
    //             ->icon('heroicon-s-eye'),
    //     ])
    //     ->send();
    // }

}
