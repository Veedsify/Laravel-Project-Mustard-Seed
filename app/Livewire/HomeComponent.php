<?php

namespace App\Livewire;

use App\Models\Campaign;
use App\Models\HomepageData;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class HomeComponent extends Component
{
    public $title = 'Home Page';
    public function render()
    {
        $campaigns = Campaign::where('status', 'published')
            ->with('campaign_category')
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();
        return view('livewire.home-component', [
            'data' => HomepageData::first(),
            'campaigns' => $campaigns
        ]);
    }
}
