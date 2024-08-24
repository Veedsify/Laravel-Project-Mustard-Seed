<?php

namespace App\Livewire;

use App\Models\Campaign;
use App\Models\CampaignCategory;
use App\Models\Donation;
use Livewire\Component;

class DonationDetailComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $donation = Campaign::where('slug', $this->slug)->first();
        $categories = CampaignCategory::all();
        return view('livewire.donation-detail-component',[
            'donation' => $donation,
            'categories' => $categories
        ]);
    }
}
