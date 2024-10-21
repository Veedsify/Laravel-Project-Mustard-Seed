<?php

namespace App\Livewire\User;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserVerificationDetails extends Component
{

    public $first_name = '';
    public $last_name = '';
    public $phone_number = '';
    public $address = '';

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone_number' => 'required|string',
        'address' => 'required|string',
    ];

    public function mount(){
        $user = Auth::user();
        if($user->idVerified && $user->idVerified->first_name !== null) {
            $this->first_name = $user->idVerified->first_name;
            $this->last_name = $user->idVerified->last_name;
            $this->phone_number = $user->idVerified->phone;
            $this->address = $user->idVerified->residential_address;
        }
    }

    public function saveDetails()
    {
        $this->validate();
        $user = Auth::user();
        $findUserId = $user->idVerified;
        if ($findUserId) {
            $findUserId->first_name = $this->first_name;
            $findUserId->last_name = $this->last_name;
            $findUserId->phone = $this->phone_number;
            $findUserId->residential_address = $this->address;
            $findUserId->save();
            Notification::make()
                ->title('User Details Updated')
                ->success()
                ->send();
            $this->dispatch('nextStep');
            return;
        } else {
            $user->idVerified()->create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone_number,
                'residential_address' => $this->address,
            ]);
            Notification::make()
                ->title('User Details Updated')
                ->success()
                ->send();
            $this->dispatch('nextStep');
            return;
        }
    }

    public function render()
    {
        return view('livewire.user.user-verification-details');
    }
}
