<?php

namespace App\Livewire\Comps;

use Livewire\Component;

class DonationDetailPrice extends Component
{
    public $donation;
    public $price;
    public $name = '';
    public $email = '';
    public $company_name = '';
    public $address = '';
    public $city = '';
    public $postcode = '';

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function mount($donation)
    {
        $this->donation = $donation;
        $this->price = $this->donation->goal * 0.2;
    }
    public function render()
    {
        return view('livewire.comps.donation-detail-price');
    }
}
