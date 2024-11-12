<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DonatedItemsComponent extends Component
{

    public function render()
    {
        $items = Item::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        //  Check item applied item unit count of all unit rows is equal to item quantity
        $validItems = [];
        foreach ($items as $item) {
            $totalUnitCount = $item->appliedItems()->sum('unit');
            if ($item->quantity > $totalUnitCount) {
                // Add the item to the $validItems array
                $validItems[] = $item;
            }
        }

        return view('livewire.donated-items-component', [
            'items' => $validItems
        ]);
    }
}
