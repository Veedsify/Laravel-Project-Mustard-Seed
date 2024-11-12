<?php

namespace App\Livewire\Comps;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class DonationDetailPrice extends Component
{
    public $campaigns;
    public $price;
    public $name = '';
    public $email = '';
    public $company_name = '';
    public $address = '';
    public $city = '';
    public $postcode = '';
    public $checked = '';

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function proceedToPay()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'company_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'checked' => 'required',
        ]);
        if($this->checked){
            $donation_id = Str::random(32);
            Donation::create([
                'amount' => $this->price,
                'name' => $this->name,
                'email' => $this->email,
                'company_email' => $this->company_name,
                'address' => $this->address,
                'city' => $this->city,
                'campaign_id' => $this->campaigns->id,
                'user_id' => Auth::user()->id,
                'payment_method' => 'Cash',
                'status' => 'pending',
                'payment_id' => 'pending',
                'payment_status' => 'pending',
            ]);
        }
    }

    public function mount($campaigns)
    {
        $this->campaigns = $campaigns;
        $this->price = $this->campaigns->goal * 0.2;
    }
    public function render()
    {
        return view('livewire.comps.donation-detail-price');
    }
}
