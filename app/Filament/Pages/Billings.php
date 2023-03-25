<?php

namespace App\Filament\Pages;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Reading;
use Filament\Pages\Page;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\SessionManager;
use Barryvdh\Debugbar\Facades\Debugbar;

class Billings extends Page
{
    public $units = '';
    public $unit_id = '';
    public $unit_name = '';
    public $read_date = '';
    public $readings = '';
    public $prev_readings = [];
    public $readingText = [];
    public $name = '';
    public int $tenant_count;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';

    protected static ?string $title = 'Add New Readings';

    protected static ?string $slug = 'billings';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Add Readings All';

    public function mount()
    // public function render()
    {
        $this->readings = DB::table('readings')->get();

        $this->units = DB::table('units')
            ->orderBy('units.name')
            ->get();
        // $this->units = DB::table('units')
        //     ->join('tenants', 'units.id', '=', 'tenants.unit_id')
        //     ->get();
        // $this->units = DB::table('tenants')
        //     ->join('units', 'tenants.unit_id', '=', 'units.id')
            // ->where('is_primary', true)
            // ->where('is_current', true)
            // ->limit(2)
            // ->orderBy('units.name')
            // ->get();
        $this->prev_readings = DB::table('readings')
            ->whereMonth('readings.read_date', Carbon::now()->subMonth())
          ->get();

        $this->tenant_count = DB::table('tenants')
            ->join('units', 'tenants.unit_id', '=', 'units.id')
            ->where('is_primary', true)
            ->where('is_current', true)
            ->count();


        // $this->units = Unit::with('tenants')->get();
        // $this->units = Unit::first()->get();
        // dd($this->units);
    }
    protected function getActions(): array
    {
        return [
            Action::make('settings')->action('openSettingsModal'),
        ];
    }

    public function updated()
    // public function testupdated()
    {
        // $this->readings = DB::table('readings')->get();
        $this->units = DB::table('units')
            ->orderBy('units.name')
            ->get();

        $this->readings = DB::table('readings')->get();
        // $this->units = DB::table('units')
        //     ->join('tenants', 'units.id', '=', 'tenants.unit_id')
        //     ->get();
        // $this->units = DB::table('tenants')
        //     ->join('units', 'tenants.unit_id', '=', 'units.id')
        // ->where('is_primary', true)
        // ->where('is_current', true)
        // ->limit(2)`
        // ->orderBy('units.name')
        // ->get();

        $this->prev_readings = DB::table('readings')
            ->whereMonth('readings.read_date', Carbon::now()->subMonth())
          ->get();

    }


    public function addReading2($unit_id, $readingTextx)
    {
        dd($readingTextx);
        $reading = new Reading();
        $reading->reading = $this->readingTextx;
        $reading->read_date = today();
        $reading->unit_id = $unit_id;
        $reading->save();

        // $this->readingText = '';
    }

    public function submit()
    {
        // dd($this->read_date);
        // Debugbar::info($date);
        // dd($this->date);
        // dd($session);
        // $this->emit('refreshChildren');
        // dd($this->readingText);

        foreach ($this->readingText as $indReadingText) {
            foreach ($indReadingText as $key => $value) {
                // dd($value);
                $reading = new Reading();
                $reading->reading = $value;
                $reading->unit_id = $key;
                $reading->read_date = $this->read_date;
                $reading->save();
            }
            // dd($indReadingText);
            // dd($this->readingText);
            // echo($indReadingText);
            // print_r($indReadingText);
            // $reading->reading = $readingText;
            // // $reading->read_date = today();



        };
        return redirect()->to('admin/readings');
    }


    protected static string $view = 'filament.pages.billings';
    // public function render()
    // {
    //     return view('filament.pages.billings', [
    //         'date' => ''
    //     ]);
    // }


    protected static ?string $navigationGroup = 'Transactions';
}
