<?php

namespace App\Filament\User\Resources\ItemResource\Widgets;

use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class TotalDonations extends BaseWidget
{

    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Donations', Item::where('user_id', Auth::user()->id)->count())
                ->icon('heroicon-s-archive-box'),
            Stat::make('Active Donations', Item::where([
                'user_id' => Auth::user()->id
            ])->where('status', true)->count())
                ->icon('heroicon-s-check-circle')
        ];
    }
}
