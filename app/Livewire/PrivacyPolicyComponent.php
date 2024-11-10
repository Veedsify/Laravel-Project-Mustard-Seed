<?php

namespace App\Livewire;

use App\Models\PrivacyPolicy;
use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        $privacy = PrivacyPolicy::first();
        return view('livewire.privacy-policy-component',[
            'privacy' => $privacy
        ]);
    }
}
