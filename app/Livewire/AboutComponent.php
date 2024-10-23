<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class AboutComponent extends Component
{
    public $title = 'About Us';
    public function render()
    {
        $services = Service::where('service_status', true)->orderBy('service_name', 'DESC')->get()->take(4);
        $volunteers = User::where('admin_approved', true)
            ->latest()
            ->where(function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', 'volunteer'); // Adjust according to your role structure
                });
            })
            ->limit(3)
            ->get();
            
            return view('livewire.about-component', [
            'services' => $services,
            'volunteers' => $volunteers,
        ]);
    }
}
