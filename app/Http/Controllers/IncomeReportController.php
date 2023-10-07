<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentalIncome;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class IncomeReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(String $month)
    {
        // $incomes = DB::table('rental_incomes')
        //     ->whereMonth('rental_incomes.pay_date', $month)
        //     ->orderBy('pay_date')
        //     ->get();

        $incomes = DB::table('rental_incomes')
            ->leftJoin('tenants', 'rental_incomes.tenant_id', '=', 'tenants.id')
            ->leftJoin('units', 'rental_incomes.unit_id', '=', 'units.id')
            ->whereMonth('rental_incomes.pay_date', 9)
            ->select('rental_incomes.*', 'tenants.name as TenantName', 'units.name as UnitName')
            ->orderBy('pay_date')
            ->get();

        $total_incomes = DB::table('rental_incomes')
            ->whereMonth('rental_incomes.pay_date', $month)
            ->sum('rental_incomes.amount');

        $totalAmountPerCategory = DB::table('rental_incomes')
            ->select('category', DB::raw('SUM(amount) as total_amount'))
            ->whereMonth('rental_incomes.pay_date', $month)
            ->groupBy('category')
            ->get();

        $year = now()->format('Y');
        $customPaper = array(0, 0, 567.00, 223.80);
        $fileName = "monthly_incomes_{$year}-{$month}.pdf";
        $pdf = Pdf::loadView(
            'monthly_income_report',
            compact('incomes', 'month', 'total_incomes', 'totalAmountPerCategory', 'fileName')

        )->setPaper('A4', 'landscape');

        return $pdf->stream($fileName);
    }
}
