<?php

namespace App\Livewire;

use App\Mail\SendUserWelcomeEmail;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Resend\Laravel\Facades\Resend;

class RegisAsVolunteer extends Component
{
    public $name = "";
    public $email = "";
    public $phone = "";
    public $founded_year = "";
    public $address = "";
    public $state = "";
    public $city = "";
    public $zipcode = "";
    public $local_gov = "";
    public $nin = "";
    public $nin_state = "";
    public $nin_city = "";
    public $nin_zipcode = "";
    public $is_valid_organisation = false;
    public $nin_local_gov = "";

    public function saveuser(): void
    {
        $this->validate([
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "founded_year" => "required",
            "address" => "required",
            "state" => "required",
            "city" => "required",
            "zipcode" => "required",
            "local_gov" => "required",
            "nin" => $this->is_valid_organisation ? "nullable" : "required",
            "nin_state" => $this->is_valid_organisation ? "nullable" : "required",
            "nin_city" => $this->is_valid_organisation ? "nullable" : "required",
            "nin_zipcode" => $this->is_valid_organisation ? "nullable" : "required",
            "nin_local_gov" => $this->is_valid_organisation ? "nullable" : "required",
        ]);

        $password = Str::random(8);

        $findUser = User::where("email", $this->email)->first();
        if ($findUser) {
            $this->dispatch(
                "notify-error",
                message: "User with this email already exists"
            );
            return;
        }

        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($password),
            "username" =>
            "@" . Str::replace(" ", "", $this->name) . rand(10, 100),
            "avatar" => "avatar.png",
            "cover" => "cover.png",
            "role" => "volunteer",
            "bio" => "I am a volunteer",
            "is_valid_organisation" => $this->is_valid_organisation,
            "admin_approved" => false,
            "location" => $this->state,
            "password_reset_token" => Str::random(32),
            "email_verified_at" => null,
        ]);

        $user->volunteer_settings()->create([
            "is_available" => true,
            "organization" => $this->name,
            "age" => $this->founded_year,
            "bio" => "I am a volunteer",
            "phone" => $this->phone,
            "email" => $this->email,
            "image" => asset("assets/images/avatar.png"),
            "website" => "https://example.com",
            "address" => $this->address,
            "city" => $this->city,
            "state" => $this->state,
            "country" => "Nigeria",
            "zip" => $this->zipcode,
            "facebook" => "https://facebook.com",
            "twitter" => "https://twitter.com",
            "linkedin" => "https://linkedin.com",
            "verification_numeber" => $this->nin,
            "verification_state" => $this->nin_state,
            "verification_city" => $this->nin_city,
            "verification_zip" => $this->nin_zipcode,
            "verification_lga" => $this->nin_local_gov,
        ]);

        $role = Role::where("name", "volunteer")->first();
        $user->roles()->attach($role);

        $message =
            "Your account has been created successfully, volunteer accounts would be approved by the admin, you would be notified when your account is approved";

        // Send email to volunteer with google auth signin
        Resend::emails()->send([
            "from" => "Mustard Seed Charity <info@mustardseedcharity.com>",
            "to" => $user->email,
            "subject" => "Welcome to Mustard Seed Charity",
            "html" => (new SendUserWelcomeEmail($user, $message))->render(),
        ]);

        $this->dispatch(
            "notify",
            message: "Volunteer has been registered successfully, check your email for login details"
        );
    }

    public function render()
    {
        $states = State::all();
        return view("livewire.regis-as-volunteer", [
            "states" => $states,
        ]);
    }
}
