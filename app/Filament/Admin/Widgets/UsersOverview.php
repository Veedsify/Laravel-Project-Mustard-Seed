<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Campaign;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Volunteers', User::all()->map(function ($user) {
                return $user->hasRole('volunteer') ? 1 : 0;
            })->sum())
                ->icon('heroicon-s-rocket-launch')
                ->url("/admin/users"),
            Stat::make('Total Users', User::all()->count())
                ->icon('heroicon-s-user-group')
                ->url("/admin/users"),
            Stat::make('Active Campaigns', Campaign::where('status', 'published')
                ->count())
                ->icon('heroicon-s-inbox-stack')
                ->descriptionColor('success')
                ->url("/admin/campaigns")
                ->chartColor('info')
                ->chart(
                    Campaign::where('status', 'published')
                        ->selectRaw('count(*) as total, DATE(created_at) as date')
                        ->groupBy('date')
                        ->get()
                        ->pluck('total')
                        ->toArray()
                ),
        ];
    }
}
