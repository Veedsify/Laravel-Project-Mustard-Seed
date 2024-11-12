<?php

namespace App\Filament\User\Pages;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Verification extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-shield-check';
    protected static ?string $title = 'Verifications';
    protected static ?string $navigationGroup = 'Settings';
    protected static string $view = 'filament.user.pages.verification';

    public static function canAccess(): bool
    {
        if (!Auth::check()) {
            return false;
        }
        $user = User::find(Auth::id());
        return !optional($user->idVerified)->verification_status; 
    }

    public $step = 1;
    // protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];

    #[On('nextStep')]
    public function nextStep()
    {
        $this->step = $this->step + 1;
    }

    #[On('backStep')]
    public function backStep()
    {
        $this->step = $this->step - 1;
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user->IdVerified) {
            if (empty($user->IdVerified->first_name)) {
                $this->step = 2;
            } elseif (empty($user->IdVerified->id_path)) {
                $this->step = 3;
            } elseif (!empty($user->IdVerified->face_path)) {
                $this->step = 4;
            }
        }

        // Retrieve flash messages
        $sessionMessage = session('error');
        if ($sessionMessage) {
            Notification::make()
                ->title($sessionMessage)
                ->danger()
                ->send();
        }
    }
}
