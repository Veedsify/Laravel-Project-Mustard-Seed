<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class AboutComponent extends Component
{
    public $title = 'Blog Page';
    public function render()
    {
    $services = Service::where('service_status', true)->orderBy('service_name', 'DESC')->get()->take(4);
        return view('livewire.about-component',[
            'services' => $services
        ]);
    }
}
