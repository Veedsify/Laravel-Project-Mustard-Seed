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
            'labels' => ['Red', 'Blue', 'Yellow', 'Skyblue'],
            'datasets' => [
                [
                    'data' => [100, 50, 100, 900],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(155, 255, 255)'
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
