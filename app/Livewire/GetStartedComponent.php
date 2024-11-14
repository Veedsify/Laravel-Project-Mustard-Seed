<?php

namespace App\Livewire;

use Livewire\Component;

class GetStartedComponent extends Component
{
    public $title;

    public function mount()
    {
        $this->title = 'Get Started - Learn how to use' . config('app.name');
    }

    public function render()
    {
        return view('livewire.get-started-component');
    }
}
