<?php

namespace App\Filament\Widgets;

use App\Models\Bill;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Filament\Widgets\BarChartWidget;

class BillsChart extends BarChartWidget
{
    protected static ?string $heading = 'Monthly Bill Totals';

    protected static ?int $sort = 0;

    protected function getData(): array
    {
        $trend = Trend::model(Bill::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('total_amount_due');

        return [
            'datasets' => [
                [
                    'label' => 'Total Bills',
                    'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' =>  $trend->map(fn (TrendValue $value) => $value->date),

        ];
    }
}
