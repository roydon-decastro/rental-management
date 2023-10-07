<?php

namespace App\Filament\Widgets;

use App\Models\Bill;
use App\Models\Payment;
use App\Models\RentalIncome;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

use Filament\Widgets\LineChartWidget;

class RentalIncomeChart extends LineChartWidget
{
    protected static ?string $heading = 'Monthly Rental Income';

    protected static ?int $sort = 1;
    // protected int | string | array $columnSpan = 'full';

    // public static function query(): Builder
    // {
    //     return DB::table('rental_income')
    //         ->select(DB::raw('DATE(pay_date) as date'), DB::raw('COUNT(*) as value'))
    //         ->groupBy('date')
    //         ->orderBy('date', 'ASC');
    // }

    protected function getData(): array
    {
        $trend = Trend::model(RentalIncome::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            // ->sum('income');
            ->sum('amount');

        // $trend = DB::table('rental_incomes')
        //     ->select(DB::raw('DATE(pay_date) as date'), DB::raw('COUNT(*) as value'))
        //     ->groupBy('pay_date')
        //     ->orderBy('pay_date', 'ASC')
        //     ->sum('income');

        // dd($trend);
        return [
            'datasets' => [
                [
                    'label' => 'Rental Income',
                    'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(128, 0, 128, 0.2)',
                        'rgba(255, 99, 71, 0.2)',
                        'rgba(0, 255, 255, 0.2)',
                        'rgba(128, 0, 128, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    // 'borderColor' => 'blue',
                    'borderColor' =>
                    [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(153, 102, 255)',
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
