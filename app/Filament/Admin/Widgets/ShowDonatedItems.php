<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Item;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ShowDonatedItems extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;

    protected function getDonationChart()
    {
        $today = Carbon::today();
        $sevenDaysAgo = Carbon::today()->subDays(6); // Start 6 days ago + today = 7 days

        $items = Item::whereBetween('created_at', [$sevenDaysAgo, $today])
            ->select(DB::raw('SUM(quantity) as total')) // Sum of quantities
            ->groupBy(DB::raw('DATE(created_at)')) // Group by date
            ->orderBy(DB::raw('DATE(created_at)')) // Order by date
            ->get();

        return $items->pluck('total')->toArray() ?? [];
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Donations', Item::all()->count())
                ->icon('heroicon-s-gift')
                ->description("Total Donations")
                ->descriptionColor('success')
                ->chart($this->getDonationChart())
                ->chartColor('success')
                ->url("/admin/items"),
            Stat::make('Pending Donations', Item::where('status', false)->count())
                ->icon('heroicon-s-gift-top')
                ->descriptionColor('success')
                ->url("/admin/items"),
            Stat::make('Approved Donations', Item::where('status', true)->count())
                ->icon('heroicon-s-gift-top')
                ->descriptionColor('success')
                ->url("/admin/items"),
        ];
    }
}
