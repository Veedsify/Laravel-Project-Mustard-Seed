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
            ->orderBy('created_at', 'desc')->get();

        if (!$items) {
            abort(404);
        }

        return view('livewire.donated-items-component', [
            'items' => $items
        ]);
    }
}
