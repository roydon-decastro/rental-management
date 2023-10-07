<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Reports extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.reports';

    public $month = '';
    public $expense_month = '';
    public $income_month = '';
    public $summary_month = '';
    public $year = '2023';

    public function submit()
    {
        // dd($this->month);
        // $bills = DB::table('bills')
        // 	->whereMonth('bills.created_at', $this->month)
        //     ->get();
        // dd($bills);
        // $url = 'http://127.0.0.1:8000/';
        // echo "<script>window.open('".$url."', '_blank')</script>";
        return redirect()->away('billpermonth/' . $this->month);
        // return url('billpermonth/' . $this->month);
        // return redirect()->to('billpermonth/' . $this->month, ['target' => '_blank'])->with(['message' => 'Successfully opened in new tab', 'target' => '_blank']);




    }
}
