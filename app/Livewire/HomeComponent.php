<?php

namespace App\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public $title = 'Home Page';
    public function render()
    {
        return view('livewire.home-component');
    }
}
