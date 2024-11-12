<?php

namespace App\Livewire\User;

use App\Models\Address;
use App\Models\State;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;


class LocationSettingsComponent extends Component
{
    public $address = '';
    public $name = '';
    public $state = '';
    public $city = '';
    public $zip = '';


    public function mount()
    {
        $userAddress = Auth::user()->load('address')->address;

        $this->address =  $userAddress->address ?? '';
        $this->state =  $userAddress->state ?? '';
        $this->city =  $userAddress->city ?? '';
        $this->zip =  $userAddress->zip ?? '';
        $this->name = $userAddress->name ?? '';
    }

    public function save()
    {
        $this->validate([
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'name' => 'nullable',
        ]);

        $user = User::find(Auth::id());
        $address = $user->address;
        $slug = Str::slug($this->address);

        $checkAddress = Address::where('slug', $slug)->first();

        if ($checkAddress) {
            Notification::make()
                ->title('Address already exists')
                ->danger()
                ->send();
            return;
        }

        if (!$address) {
            $address = $user->address()->create([
                'name' => $this->name,
                'address' => $this->address,
                'slug' => $slug,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
            ]);
        } else {
            $today = now();
            $lastUpdatedDate = $address->updated_at;
            $diff = $today->diffInDays($lastUpdatedDate);
            if ($diff < 3) {
                Notification::make()
                    ->title('You can only update your address once, in 72 hours')
                    ->danger()
                    ->send();
                return;
            }

            $address->update([
                'name' => $this->name,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
            ]);
        }

        Notification::make()
            ->title('Address has been updated successfully')
            ->success()
            ->send();
    }

    public function render()
    {
        $states = State::all();
        // dump(Auth::user()->load('address'));
        // dump(Auth::user()->load('address')->address->city);
        return view('livewire.user.location-settings-component', [
            'states' => $states
        ]);
    }
}
