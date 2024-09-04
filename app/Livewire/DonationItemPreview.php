<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class DonationItemPreview extends Component
{

    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $item = Item::where([
            ['slug', $this->slug],
            ['status', true]
        ])->first();
        if (!$item) {
            return abort(404);
        }
        $otherItems = Item::where('id', '!=', $item->id)
            ->limit(3)
            ->inRandomOrder()
            ->get();
        return view('livewire.donation-item-preview', [
            'item' => $item,
            'otherItems' => $otherItems
        ]);
    }
}
