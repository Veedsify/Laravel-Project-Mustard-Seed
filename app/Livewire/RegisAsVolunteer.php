<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class RegisAsVolunteer extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $founded_year = '';
    public $address = '';
    public $state = '';
    public $city = '';
    public $zipcode = '';
    public $local_gov = '';
    public $nin = '';
    public $nin_state = '';
    public $nin_city = '';
    public $nin_zipcode = '';
    public $nin_local_gov = '';


    public function saveuser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'founded_year' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'local_gov' => 'required',
            'nin' => 'required',
            'nin_state' => 'required',
            'nin_city' => 'required',
            'nin_zipcode' => 'required',
            'nin_local_gov' => 'required',
        ]);

        $password = Str::random(8);


        $findUser = User::where('email', $this->email)->first();
        if ($findUser) {
            $this->dispatch('notify-error', message: 'User with this email already exists');
            return;
        }


        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($password),
            'username' => '@' . Str::replace(' ', '', $this->name) . rand(10, 100),
            'avatar' => 'avatar.png',
            'cover' => 'cover.png',
            'role' => 'volunteer',
            'bio' => 'I am a volunteer',
            'admin_approved' => false,
            'location' => $this->state,
            'password_reset_token' => Str::random(32),
            'email_verified_at' => NULL,
        ]);

        $user->volunteer_settings()->create([
            'is_available' => true,
            'organization' =>  $this->name,
            'age' => $this->founded_year,
            'bio' => 'I am a volunteer',
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => fake()->imageUrl(), 
            'website' => 'https://example.com',
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'country' => 'Nigeria',
            'zip' => $this->zipcode,
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'verification_numeber' => $this->nin,
            'verification_state' => $this->nin_state,
            'verification_city' => $this->nin_city,
            'verification_zip' => $this->nin_zipcode,
            'verification_lga' => $this->nin_local_gov,
        ]);

        $role = Role::where('name', 'volunteer')->first();
        $user->roles()->attach($role);

        $emailData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
        ];

        // Send email to volunteer with google auth signin


        $this->redirect(route('login'));
        $this->dispatch('notify', message: 'Volunteer has been registered successfully, check your email for login details');
    }


    public function render()
    {
        $states = State::all();
        return view('livewire.regis-as-volunteer', [
            'states' => $states
        ]);
    }
}
