<?php

namespace App\Livewire\User;

use App\Models\State;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUserSettings extends Component
{
    use WithFileUploads;

    public $name;
    public $email_address;
    public $bio;
    public $location;
    public $avatar;
    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name ?? '';
        $this->email_address = $user->email ?? '';
        $this->bio = $user->bio ?? '';
        $this->location = $user->location ?? '';
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email_address' => 'required|email|unique:users,email,' . Auth::id(),
            'bio' => 'required',
            'location' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $storeLink = null;
        if ($this->avatar) {
            $storeLink = $this->avatar->store('avatars', 'public');
        } else {
            $storeLink = Auth::user()->avatar;
        }

        User::where('id', Auth::id())->update([
            'name' => $this->name,
            'email' => $this->email_address,
            'bio' => $this->bio,
            'location' => $this->location,
            'avatar' => $storeLink
        ]);

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

        $this->dispatch('refreshProfilePage');
    }
    public function render()
    {
        $states = State::all();
        return view('livewire.user.edit-user-settings',[
            'states' => $states
        ]);
    }
}

