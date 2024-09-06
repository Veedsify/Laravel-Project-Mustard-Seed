<?php

namespace App\Livewire;

use Livewire\Component;

class EventsComponent extends Component
{

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.events-component');
    }
}
