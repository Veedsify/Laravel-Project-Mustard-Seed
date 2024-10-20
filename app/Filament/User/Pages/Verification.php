<?php

namespace App\Filament\User\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Verification extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-shield-check';
    protected static ?string $title = 'Verifications';
    protected static ?string $navigationGroup = 'Settings';
    protected static string $view = 'filament.user.pages.verification';
    protected static ?int $sort = -1;
    // protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];
    public function mount()
    {
        // Retrieve flash messages
        $sessionMessage = session('error');
        if($sessionMessage) {
            Notification::make()
                ->title($sessionMessage)
                ->danger()
                ->send();
        }
    }
}
