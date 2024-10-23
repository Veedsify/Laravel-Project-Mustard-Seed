<?php

namespace App\Livewire\User;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ProfileSettingsComponent extends Component
{

    #[On('deleteUser')]
    public function delete()
    {
        $user = User::find(Auth::id());

        if ($user->hasRole('user')) {
            Notification::make()
                ->title('Account deleted successfully')
                ->success()
                ->send();
            $user->delete();
            Auth::logout();
            return;
        }
        Notification::make()
            ->title('Sorry ' . ucwords($user->role) . ' Accounts Cant Be deleted')
            ->danger()
            ->send();
        return;
    }

    #[On('refreshProfilePage')]
    public function refreshThis()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.user.profile-settings-component');
    }
}
