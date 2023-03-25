<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Bill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BillPerMonthReport extends Controller
{
    public function __invoke(String $month)
    // public function __invoke($month)
    {
        //
        // dd($request);
        // dd($month);
        // $fileName = "{$billUnit}_{$billDate}_waterbill.pdf";

        $bills = DB::table('bills')
  			->whereMonth('bills.created_at', $month)
            ->get();
  			// ->sum('consumption');.
        $total_consumption = DB::table('bills')
            ->whereMonth('bills.created_at', $month)
            ->sum('bills.consumption');
        $days_in_month = Carbon::createFromDate(null, $month)->daysInMonth;
        // dd($days_in_month);
        // $average_consumption = DB::table('bills')
        //     ->whereMonth('bills.created_at', $month)
        //     ->average('bills.consumption');

        $average_consumption = $total_consumption / $days_in_month;

        // dd($average_consumption);

        $total_amount = DB::table('bills')
            ->whereMonth('bills.created_at', $month)
            ->sum('bills.total_amount_due');
        // ->sum('consumption');.
            // dd($bills);
        $year = now()->format('Y');
        $customPaper = array(0,0,567.00,223.80)        ;
        $fileName = "monthly_water_bill_{$year}-{$month}.pdf";
        // dd($fileName);

        $pdf = Pdf::loadView(
            'waterbill',
            compact('bills', 'month', 'total_consumption', 'total_amount', 'average_consumption', 'fileName')

        )->setPaper('A4', 'landscape');
        // )->setPaper($customPaper, 'landscape');

        return $pdf->stream($fileName);
    }
}
