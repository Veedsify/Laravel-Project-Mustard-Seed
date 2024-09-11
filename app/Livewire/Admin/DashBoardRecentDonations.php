<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;

class DashBoardRecentDonations extends Component
{
    public $recentDonations;
    public function render()
    {
        $this->recentDonations = Item::latest()->take(5)->get();
        return view('livewire.admin.dash-board-recent-donations');
    }
}
