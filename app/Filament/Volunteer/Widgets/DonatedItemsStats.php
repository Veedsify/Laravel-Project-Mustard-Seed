<?php

namespace App\Filament\Volunteer\Widgets;

use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class DonatedItemsStats extends BaseWidget
{

    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = -1;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Donated Items', function () {
                return Item::where('volunteer_id', Auth::id())->get()->count();
            })->icon('heroicon-s-server-stack')
                ->description("This is the total number of items donated to you by donors"),
            Stat::make('Pending Donations',  function () {
                return Item::where([
                    ['volunteer_id', Auth::id()],
                    ['status', false]
                ])->get()->count();
            })->icon('heroicon-s-scale')
                ->description("Pending items awaiting approval"),
            Stat::make('Approved Donations',  function () {
                return Item::where([
                    ['volunteer_id', Auth::id()],
                    ['status', true]
                ])->get()->count();
            })->icon('heroicon-s-check-circle')
                ->description("Items that have been approved for collection"),
        ];
    }
}
