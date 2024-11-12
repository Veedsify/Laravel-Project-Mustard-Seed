<?php

namespace App\Livewire;

use App\Models\ContactPage;
use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        $contactData = ContactPage::first();
        return view('livewire.contact-component',[
            'contactData' => $contactData
        ]);
    }
}
