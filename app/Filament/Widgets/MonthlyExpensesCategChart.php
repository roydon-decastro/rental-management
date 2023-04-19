<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
// use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\DoughnutChartWidget;
// use ArielMejiaDev\LarapexCharts\Facades\Trend;

class MonthlyExpensesCategChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Expenses Per Category';

    protected static ?int $sort = 4;
    protected function getData(): array
    {
        // $trend = Trend::model(Expense::class)
        // ->between(
        //     start: now()->startOfYear(),
        //     end: now()->endOfYear(),
        // )
        // ->perMonth()
        // ->sum('amount');

        $expensesByCategory = DB::table('expenses')
            ->leftJoin('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
            ->select('expense_category_id', 'expense_categories.name', DB::raw('SUM(amount) as total_amount'))
            ->whereYear('expenses.created_at', '=', date('Y'))
            ->groupBy('expense_category_id')
            ->get();

        // Assuming your collection is named $expenses
        $totalAmounts = $expensesByCategory->pluck('total_amount')->toArray();
        $categoryNames = $expensesByCategory->pluck('name')->toArray();

        // $totalAmounts will now contain [200.35, 25000.0, 6000.56]


        // $trend = Trend::query()
        //     ->select('expense_category_id', Trend::raw('SUM(amount) as total_amount'))
        //     ->from('expenses')
        //     ->groupBy('expense_category_id')
        //     ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Rental Income',
                    // 'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                    'data' => $totalAmounts,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
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
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 159, 64)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 2,
                    'radius' => '70%',
                    // 'tension' => 0.3,
                    'fill' => false,
                ],
            ],
            // 'labels' => $trend->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M')),
            // 'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'labels' => $categoryNames,

        ];
    }
}
