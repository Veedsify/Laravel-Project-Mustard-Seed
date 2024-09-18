<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Blog;
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
            Stat::make('Articles', Blog::count())
                ->icon('heroicon-s-user-group')
                ->description("Total articles")
                ->descriptionIcon('heroicon-s-arrow-trending-up')
                ->descriptionColor('success')
                ->chart([
                    9,
                    10,
                    3,
                    12,
                    13,
                    4,
                    15,
                    6,
                    17,
                    18,
                    9,
                    20
                ])
                ->chartColor('success')
                ->url("/admin/blogs"),
            Stat::make('Total Users', User::all()->count())->icon('heroicon-s-user-group')
                ->descriptionColor('success')
                ->url("/admin/users")
                ->chartColor('danger')
                ->chart([
                    9,
                    10,
                    3,
                    12,
                    13,
                    4,
                    15,
                    6,
                    17,
                    18,
                    9,
                    20,
                    21,
                    4,
                    0,
                    1,
                    2,
                    12,
                    4,
                    16,
                    18,
                    2,
                    9
                ]),
            Stat::make('Active Campaigns', Campaign::where('status', 'published')->count())->icon('heroicon-s-user-group')
                ->descriptionColor('success')
                ->url("/admin/campaigns")
                ->chartColor('info')
                ->chart([
                    9,
                    10,
                    3,
                    12,
                    1
                ]),
        ];
    }
}
