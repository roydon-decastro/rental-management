<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expense;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class ExpenseReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    public function __invoke(String $month)
    {
        // dd($month);

        $expenses = DB::table('expenses')
            ->whereMonth('expenses.created_at', $month)
            ->orderBy('category_name')
            ->get();

        // dd($expenses);

        $total_expenses = DB::table('expenses')
            ->whereMonth('expenses.created_at', $month)
            ->sum('expenses.amount');

        // $totalAmountPerCategory = DB::table('expenses')
        //     ->select('expense_category_id', DB::raw('SUM(amount) as total_amount'), 'category_name')
        //     ->groupBy('expense_category_id', 'category_name')
        //     ->get();


        $totalAmountPerCategory = DB::table('expenses')
            ->select('expense_category_id', DB::raw('SUM(amount) as total_amount'), 'category_name')
            ->whereMonth('expenses.created_at', $month)
            ->groupBy('expense_category_id', 'category_name')
            ->get();

        // dd($total_expenses);
        $year = now()->format('Y');
        $customPaper = array(0, 0, 567.00, 223.80);
        $fileName = "monthly_expenses_{$year}-{$month}.pdf";
        $pdf = Pdf::loadView(
            'monthly_expense_report',
            compact('expenses', 'month', 'total_expenses', 'totalAmountPerCategory', 'fileName')

        )->setPaper('A4', 'landscape');

        return $pdf->stream($fileName);
    }
}
