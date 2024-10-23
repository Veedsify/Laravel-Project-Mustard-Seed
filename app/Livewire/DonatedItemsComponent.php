<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class DonatedItemsComponent extends Component
{

    public function render()
    {
        $items = Item::where('status', true)
            ->orderBy('created_at', 'desc')
            ->doesntHave('appliedItem')
            ->get();

        return view('livewire.donated-items-component', [
            'items' => $items
        ]);
    }
}
