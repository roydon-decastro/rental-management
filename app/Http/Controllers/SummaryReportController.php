<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentalIncome;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class SummaryReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(String $month)
    {
        $total_incomes = DB::table('rental_incomes')
            ->whereMonth('rental_incomes.pay_date', $month)
            ->sum('rental_incomes.amount');

        $totalIncomePerCategory = DB::table('rental_incomes')
            ->select('category', DB::raw('SUM(amount) as total_amount'))
            ->whereMonth('rental_incomes.pay_date', $month)
            ->groupBy('category')
            ->get();

        $total_expenses = DB::table('expenses')
            ->whereMonth('expenses.created_at', $month)
            ->sum('expenses.amount');


        $totalExpensePerCategory = DB::table('expenses')
            ->select('expense_category_id', DB::raw('SUM(amount) as total_amount'), 'category_name')
            ->whereMonth('expenses.created_at', $month)
            ->groupBy('expense_category_id', 'category_name')
            ->get();

        $year = now()->format('Y');
        $customPaper = array(0, 0, 567.00, 223.80);
        $fileName = "monthly_summary_{$year}-{$month}.pdf";
        $pdf = Pdf::loadView(
            'monthly_summary_report',
            compact('month', 'total_incomes', 'total_expenses', 'totalIncomePerCategory', 'totalExpensePerCategory', 'fileName')

        )->setPaper('A4', 'landscape');

        return $pdf->stream($fileName);
    }
}
