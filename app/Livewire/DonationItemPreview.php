<?php

namespace App\Livewire;

use App\Models\AppliedItem;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DonationItemPreview extends Component
{

    public $slug;
    public $name = '';
    public $email = '';
    public $reason = '';
    public $unit = '';

    public function mount($slug)
    {
        $user = Auth::user();
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
        $this->slug = $slug;
    }

    public function apply()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'reason' => 'required',
        ];

        $this->validate($rules);

        $item = Item::where([
            ['slug', $this->slug],
            ['status', true],
        ])->first();

        if (!$item) {
            $this->dispatch('notify-error', message: 'Item not found');
            return;
        }

        $findAppliedItem = AppliedItem::where([
            ['item_id', $item->id],
            ['user_id', Auth::id()],
        ])->first();

        //find if user applied for other items today
        $otherItems = AppliedItem::where('user_id', Auth::id())
            ->whereDate('created_at', date('Y-m-d'))
            ->get();

        if (count($otherItems) >= 1) {
            $this->dispatch('notify-info', message: 'You can\'t apply for this item, as you have already applied for an item today');
            return;
        }

        if ($findAppliedItem) {
            $this->dispatch('notify-info', message: 'You can\'t apply for this item, as it you have already Applied');
            return;
        }

        // $checkId = User::find(Auth::id())->idVerified;
        // if(!$checkId || !$checkId->verification_status){
        //     $this->dispatch('notify-id', message:'You can\'t apply for this item, as your ID is not verified, please verify your id on your dashboard');
        //     return;
        // }

        $createAppliedItem = new AppliedItem();
        $createAppliedItem->item_id = $item->id;
        $createAppliedItem->user_id = Auth::id();
        $createAppliedItem->first_name = explode(' ', $this->name)[0];
        $createAppliedItem->last_name = explode(' ', $this->name)[1] ?? '';
        $createAppliedItem->reason = $this->reason;
        $createAppliedItem->unit = $this->unit;
        $createAppliedItem->is_approved = false;
        $createAppliedItem->save();

        $this->name = '';
        $this->email = '';
        $this->reason = '';

        $this->dispatch('notify', message: 'Application submitted successfully');
    }

    public function render()
    {
        $item = Item::where([
            ['slug', $this->slug],
            ['status', true],
        ])
            ->first();

        if (!$item) {
            abort(404);
            return;
        }
        $otherItems = Item::where('id', '!=', $item->id)
            ->limit(3)
            ->inRandomOrder()
            ->get();

        $volunteers = User::where('role', 'volunteer')->get()->pluck('id')->toArray();
        $itemCategories = ItemCategory::orderBy('name')->get();

//        Updating Units
        $this->unit = $item->unit;
        if ($item->quantity == $item->appliedItems->sum('unit')) {
            abort('404');
        }

        return view('livewire.donation-item-preview', [
            'item' => $item,
            'otherItems' => $otherItems,
            'volunteers' => $volunteers,
            'itemCategories' => $itemCategories,
        ]);
    }
}
