<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class DonatedItemsComponent extends Component
{
    
    public function render()
    {
        $items = Item::
        where('status', true)
        ->orderBy('created_at', 'desc')->get();
        return view('livewire.donated-items-component',[
            'items' => $items
        ]);
    }
}
