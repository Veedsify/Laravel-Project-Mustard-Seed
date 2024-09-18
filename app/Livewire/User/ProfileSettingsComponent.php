<?php

namespace App\Livewire\User;

use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class ProfileSettingsComponent extends Component
{

    #[On('deleteUser')]
    public function delete()
    {
        $user = User::find(Auth::id());
        Auth::logout();
        $user->delete();
        $this->dispatch('notify', 'Account deleted successfully');
        Notification::make()
            ->title('Account deleted successfully')
            ->success()
            ->send();
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
