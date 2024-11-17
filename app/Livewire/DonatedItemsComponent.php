<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\State;
use Livewire\Component;

class DonatedItemsComponent extends Component
{

    public $location;
    public $item_type;
    public $searchQuery = '';

    public function render()
    {
        $states = State::all();
        $categories = ItemCategory::all();

        $validItemsQuery = Item::where('status', true)
            ->orderBy('created_at', 'desc')
            ->when($this->location, function ($query) {
                return $query->whereHas('volunteer.volunteer_settings', function ($query) {
                    return $query->whereRaw('LOWER(state) LIKE ?', ['%' . strtolower($this->location) . '%']);
                });
            })
            ->when($this->item_type, function ($query) {
                return $query->where('category_id', 'like', "%{$this->item_type}%");
            })
            ->when($this->searchQuery, function ($query) {
                return $query->where('name', 'like', "%{$this->searchQuery}%")
                    ->orWhere('description', 'like', "%{$this->searchQuery}%")
                    ->orWhere('content', 'like', "%{$this->searchQuery}%")                // Recommended way using whereHas
                    ->orWhereHas('volunteer.volunteer_settings', function($query) {
                        $query->where('city', 'like', "%{$this->searchQuery}%");
                    });
            })
            ->whereRaw('quantity > (SELECT COALESCE(SUM(unit), 0) FROM applied_items WHERE item_id = items.id)')
            ->paginate(10);

        return view('livewire.donated-items-component', [
            'items' => $validItemsQuery,
            'states' => $states,
            'categories' => $categories,
        ]);
    }
}
