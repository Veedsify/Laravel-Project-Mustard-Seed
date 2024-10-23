<?php

namespace App\Livewire;

use App\Models\TermOfService;
use Livewire\Component;

class TermsComponent extends Component
{
    public function render()
    {
        $terms = TermOfService::first();
        return view('livewire.terms-component',[
            'terms' => $terms
        ]);
    }
}
