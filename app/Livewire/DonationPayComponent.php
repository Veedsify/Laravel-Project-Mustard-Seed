<?php

namespace App\Livewire;

use Livewire\Component;

class DonationPayComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        return view('livewire.donation-pay-component');
    }
}
