<?php

namespace App\Filament\Pages;

use App\Models\Reading;
use App\Models\Unit;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Billings extends Page
{
    public $units;
    public $unit_id;
    public $unit_name;
    public $readings;
    public $readingText;
    public $name = 'Milo';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public function mount()
    {
        $this->readings = DB::table('readings')->get();
        $this->units = DB::table('units')->get();
    }

    public function updated()
    {
        $this->readings = DB::table('readings')->get();
        $this->units = DB::table('units')->get();
    }

    public function addReading($unit_id, $readingText)
    {
        dd($readingText);
        $reading = new Reading();
        $reading->reading = $this->readingText;
        $reading->read_date = today();
        $reading->unit_id = $unit_id;
        $reading->save();

        $this->readingText = '';

    }



    protected static string $view = 'filament.pages.billings';

    protected static ?string $navigationGroup = 'Transactions';
}
