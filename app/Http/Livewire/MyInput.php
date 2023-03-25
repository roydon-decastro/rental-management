<?php

namespace App\Http\Livewire;

use App\Models\Reading;
use Livewire\Component;
use Barryvdh\Debugbar\Facades\Debugbar;

class MyInput extends Component
{
    public $name;
    // public $unit = "";
    // public $units;
    public $unit_id;
    public $unit_name;
    public $readings;
    public $index;
    public $tenant_count;
    public $date;
    public $readingText;

    protected $listeners = ['refreshChildren' => 'saveReadings'];


    public function saveReadings($date)
    {
        Debugbar::info($date);
        // dd('Goes here?');
        // dd($date);

    }


    // public function mount($name) {
    public function mount($unit, $date, $tenant_count, $index) {

        // dd($unit);
        // dd($tenant_count);
        // $this->name = $name;
        // $this->unit = $unit;
        $this->name = $unit->name;
        $this->unit_id = $unit->unit_id;

        $this->tenant_count = $tenant_count;
        $this->index = $index;
        // $this->tenant = $tenant;
    }


    public function addReading2($unit_id, $readingText)

    {
        //  dd($this->readingText);
        dd($this->date);
        //  dd($this->name);
        $reading = new Reading();
        $reading->reading = $this->readingText;
        $reading->reading = $readingText;
        $reading->read_date = $this->date;
        // $reading->read_date = today();
        $reading->unit_id = $unit_id;
        $reading->save();

        $this->readingText = '';
    }


    public function addReading3()

    {
        //  dd($this->readingText);
        dd("This wont work");
        //  dd($this->name);
        // $reading = new Reading();
        // $reading->reading = $this->readingText;
        // $reading->reading = $readingText;
        // $reading->read_date = $this->date;
        // // $reading->read_date = today();
        // $reading->unit_id = $unit_id;
        // $reading->save();

        // $this->readingText = '';
    }


    public function render()
    {
        // $this->name = $name;
        // $this->name = $unit->name;
        // $this->unit_id = $unit->unit_id;
        return view('livewire.my-input', ['name', 'unit_id']);
    }
}
