<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function __invoke(Bill $bill)
    {

        // $invoiceDate = $invoice->invoice_date->format('jFY');
        // $workerName = str($invoice->worker_name)->replace(' ', '')->headline();
        // $fileName = "invoice_{$invoiceDate}_{$workerName}.pdf";
        // $total = 0;

        // $pdf = PDF::loadView('print', compact('invoice', 'fileName', 'total'));

        // return $pdf->stream($fileName);


        // dd($bill);

        $billDate = $bill->curr_read_date;
        $billUnit = $bill->unit_name;
        // $billTenant = $bill->unit_name;

        // dd($billDate);
        // $workerName = str($invoice->worker_name)->replace(' ', '')->headline();
        $fileName = "{$billUnit}_{$billDate}_waterbill.pdf";
        // dd($fileName);
        // $total = 0;
        // $data['details']  = Bill::all()->first();

        // $pdf = Pdf::loadView('print', compact('invoice', 'fileName', 'total'));
        $pdf = Pdf::loadView(
            'print',
            compact('bill', 'fileName')
        );
        // $bill);
        // $pdf->setPaper('c4', 'portrait');

        return $pdf->stream($fileName);
    }
}
