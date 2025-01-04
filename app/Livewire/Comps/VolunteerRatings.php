<?php

namespace App\Livewire\Comps;

use App\Models\Rating;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class VolunteerRatings extends Component
{
    use WithPagination;
    public $volunteer;
    public $rating = 0;
    public $reviewText = '';
    public $page = 1;

    public function saveRating()
    {
        $this->validate([
            'rating' => 'required|integer|between:1,5',
            'reviewText' => 'required'
        ]);

        $user = auth()->user();

        if ($user->id === $this->volunteer->id) {
            $this->dispatch('notify-error', message: 'You cannot rate yourself.');
            return;
        }

        if(Rating::where('user_id', $user->id)->where('volunteer_id', $this->volunteer->id)->exists()) {
            $this->dispatch('notify-error', message: 'You have already rated this volunteer.');
            return;
        }

        Rating::create([
            'rating' => $this->rating,
            'review' => $this->reviewText,
            'user_id' => auth()->id(),
            'volunteer_id' => $this->volunteer->id
        ]);

        $this->dispatch('review-added');
        $this->dispatch('notify', message: 'Review added successfully.');

        $this->rating = 0;
        $this->reviewText = '';
        $this->page = 1;
    }

    public function calculateAverageRating($ratings)
    {
        $totalRatings = count($ratings); // Total number of ratings
        if ($totalRatings === 0) {
            return 0;
        }
        $sumOfRatings = array_sum($ratings); // Sum of all ratings
        return round($sumOfRatings / $totalRatings, 2); // Calculate and round to 2 decimal places
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function mount($volunteer)
    {
        $this->volunteer = $volunteer;
    }

    #[On('review-added')]
    public function render()
    {
        $reviews = Rating::where('volunteer_id', $this->volunteer->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.comps.volunteer-ratings', [
            'reviews' => $reviews,
            'averageRating' => $this->calculateAverageRating($reviews->pluck('rating')->toArray())
        ]);
    }
}
