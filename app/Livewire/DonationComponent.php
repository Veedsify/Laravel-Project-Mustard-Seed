<?php

namespace App\Livewire;

use App\Models\Campaign;
use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;

class DonationComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $campaigns = Campaign::where('status', 'published')
            ->with('campaign_category')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        return view('livewire.donation-component', [
            'campaigns' => $campaigns
        ]);
    }
}
