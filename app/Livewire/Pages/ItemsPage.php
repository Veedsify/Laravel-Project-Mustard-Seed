<?php

namespace App\Livewire\Pages;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsPage extends Component
{
    use WithPagination;

    public function render()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(9);
        return view('livewire.pages.items-page', [
            'items' => $items
        ]);
    }
}
