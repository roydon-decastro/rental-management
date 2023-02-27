<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReceiptController extends Controller
{
    //

    public function __invoke(Payment $payment)
    {

        // $invoiceDate = $invoice->invoice_date->format('jFY');
        // $workerName = str($invoice->worker_name)->replace(' ', '')->headline();
        // $fileName = "invoice_{$invoiceDate}_{$workerName}.pdf";
        // $total = 0;

        // $pdf = PDF::loadView('print', compact('invoice', 'fileName', 'total'));

        // return $pdf->stream($fileName);


        // dd($payment);

        $payAmount = $payment->pay_amount;
        $payDate = $payment->pay_date;

        // $billDate = $bill->curr_read_date;
        // $billUnit = $bill->unit_name;
        // $billTenant = $bill->unit_name;

        // dd($billDate);
        // $workerName = str($invoice->worker_name)->replace(' ', '')->headline();
        $fileName = "{$payment->bill->unit_name}_{$payDate}_AR.pdf";
        // $fileName = "AR.pdf";
        // dd($fileName);
        // $total = 0;
        // $data['details']  = Bill::all()->first();

        // $pdf = Pdf::loadView('print', compact('invoice', 'fileName', 'total'));
        $customPaper = array(0,0,567.00,223.80);
        $pdf = Pdf::loadView(
            'receipt',
            compact('payment', 'fileName')
        )->setPaper($customPaper, 'portrait');
        // $bill);
        // $pdf->setPaper('c4', 'portrait');

        return $pdf->stream($fileName);
    }

}
