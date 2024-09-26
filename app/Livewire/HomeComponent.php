<?php

namespace App\Livewire;

use App\Models\Campaign;
use App\Models\HomepageData;
use App\Models\Service;
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
        $services = Service::where('service_status', true)->orderBy('service_name', 'DESC')->get()->take(4);

        return view('livewire.home-component', [
            'data' => HomepageData::first(),
            'services' => $services,
            'campaigns' => $campaigns
        ]);
    }
}
