<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Blog;
use App\Models\PageVisit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogStats extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Articles', Blog::all()->count())
                ->icon('heroicon-s-book-open')
                ->descriptionColor('success')
                ->url("/admin/blogs"),
            Stat::make('Overall Page Views', PageVisit::all()->count() > 999 ? number_format(PageVisit::all()->count()) : PageVisit::all()->count())
                ->icon('heroicon-s-eye')
                ->descriptionColor('success'),
            Stat::make('Articles', Blog::all()->count())
                ->icon('heroicon-s-book-open')
                ->descriptionColor('success')
                ->url("/admin/blogs"),
        ];
    }
}
