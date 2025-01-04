<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class VolunteersDetailsComponent extends Component
{
    public $username;
    public $rating = 0;
    public $reviews = [];
    public $reviewText = '';

    public function setRating($rating)
    {   
        $this->rating = $rating;
    }

    public function submitReview(){

    }

    public function mount($username)
    {
        $this->username = $username;
    }

    public function render()
    {
        $volunteer = User::where('username', $this->username)->with('volunteer_settings')->firstOrFail();

        if (!$volunteer) {
            return abort(404);
        }
        return view('livewire.volunteers-details-component', [
            'volunteer' => $volunteer,
            'reviews' => $this->reviews,
        ]);
    }
}
