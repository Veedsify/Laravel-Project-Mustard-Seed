<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class BlogChart extends ChartWidget
{
    protected static ?string $heading = 'Blog Chart';
    protected static ?int $sort = 2;
    protected static ?string $description = 'Blog Based on Popular Categories';

    protected function getData(): array
    {
        return [
            'labels' => ['Red', 'Blue', 'Yellow'],
            'datasets' => [
                [
                    'data' => [100, 50, 100],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    'hoverOffset' => 8,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
