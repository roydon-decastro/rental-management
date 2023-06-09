<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Filament\Widgets\LineChartWidget;

class MonthlyExpensesChart extends LineChartWidget
{
    protected static ?string $heading = 'Monthly Expenses ';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $trend = Trend::model(Expense::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Expenses',
                    'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(128, 0, 128, 0.2)',
                        'rgba(255, 99, 71, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 255, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(128, 0, 128, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    // 'borderColor' => 'blue',
                    'borderColor' =>
                    [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 99, 132)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 2,
                    // 'tension' => 0.3,
                    'fill' => false,
                ],
            ],
            'labels' => $trend->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M')),

        ];
    }
}
