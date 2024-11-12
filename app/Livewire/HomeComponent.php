<?php

namespace App\Livewire;

use App\Models\Campaign;
use App\Models\Event;
use App\Models\HomepageData;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
        $upcoming_events = Event::latest()->limit(4)->get();

        return view('livewire.home-component', [
            'data' => HomepageData::first(),
            'services' => $services,
            'campaigns' => $campaigns,
            'upcoming_events' => $upcoming_events
        ]);
    }
}
