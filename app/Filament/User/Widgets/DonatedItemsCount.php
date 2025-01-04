<?php

namespace App\Filament\User\Widgets;

use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class DonatedItemsCount extends BaseWidget
{


    protected static bool $isLazy = false;
    protected ?string $heading = 'Analytics';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Donations', Item::where('user_id', Auth::user()->id)->count())
                ->icon('heroicon-s-archive-box'),
            Stat::make('Active Donations', Item::where([
                'user_id' => Auth::user()->id,
            ])->where('status', true)->count())
                ->icon('heroicon-s-check-circle'),
            Stat::make('Received Donations', Item::where('user_id', Auth::user()->id)
                ->where('status', false)
                ->whereHas('appliedItems', function ($query) {
                    $query->where('is_approved', true);
                })
                ->count())
                ->icon('heroicon-s-x-circle'),
        ];
    }
}
