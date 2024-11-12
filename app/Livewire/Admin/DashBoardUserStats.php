<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Item;
use App\Models\PageVisit;

class DashBoardUserStats extends Component
{
    public $users;
    public $thisWeekUsers;
    public $donatedItems;
    public $thisWeekDonatedItems;
    public $visitsToday;
    public $visitsThisWeek;


    public function render()
    {
        $this->users = User::where('id', '!=', Auth::id())->get()->count();
        $this->thisWeekUsers = User::where('id', '!=', Auth::id())->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get()->count();
        $this->donatedItems = Item::all()->count();
        $this->thisWeekDonatedItems = Item::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get()->count();
        $this->visitsToday = PageVisit::all()->count();
        $this->visitsThisWeek = PageVisit::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get()->count();

        return view('livewire.admin.dash-board-user-stats');
    }
}
