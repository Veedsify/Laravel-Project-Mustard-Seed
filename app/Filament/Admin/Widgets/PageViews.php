<?php

namespace App\Filament\Admin\Widgets;

use App\Models\PageVisit;
use Filament\Widgets\ChartWidget;

class PageViews extends ChartWidget
{
    protected static ?string $heading = 'Page Views This Week';
    protected static ?string $pollingInterval = '15s';
    protected static ?int $sort = 6;
    protected static bool $isLazy = false;
    // protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Page Views',
                    'data' => [
                        PageVisit::whereDate('created_at', now()->subDays(6))->count(), // Monday
                        PageVisit::whereDate('created_at', now()->subDays(5))->count(), // Tuesday
                        PageVisit::whereDate('created_at', now()->subDays(4))->count(), // Wednesday
                        PageVisit::whereDate('created_at', now()->subDays(3))->count(), // Thursday
                        PageVisit::whereDate('created_at', now()->subDays(2))->count(), // Friday
                        PageVisit::whereDate('created_at', now()->subDays(1))->count(), // Saturday
                        PageVisit::whereDate('created_at', now())->count(), // Sunday
                    ],
                    'backgroundColor' => '#9BD0F5',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
