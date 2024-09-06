<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\User;
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

        $volunteers = User::where('role', 'volunteer')->get()->pluck('id')->toArray();
        $itemCategories = ItemCategory::all();
        
        return view('livewire.donation-item-preview', [
            'item' => $item,
            'otherItems' => $otherItems,
            'volunteers' => $volunteers,
            'itemCategories' => $itemCategories
        ]);
    }
}
