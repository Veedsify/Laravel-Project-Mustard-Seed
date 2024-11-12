<?php

namespace App\Livewire\Comps;

use Livewire\Component;

class HomeUrgentSection extends Component
{
    public $title = 'Urgent Section';
    public function render()
    {
        return view('livewire.comps.home-urgent-section');
    }
}
