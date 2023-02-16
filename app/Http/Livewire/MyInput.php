<?php

namespace App\Http\Livewire;

use App\Models\Reading;
use Livewire\Component;

class MyInput extends Component
{
    public $name;
    public $units;
    public $unit_id;
    public $unit_name;
    public $readings;
    public $readingText;


    public function mount($name) {
        $this->name = $name;
    }
    // public function addReading2($unit_id, $readingText )
    public function addReading2($unit_id)
    {
        // dd($readingText);
        $reading = new Reading();
        $reading->reading = $this->readingText;
        // $reading->reading = $readingText;
        $reading->read_date = today();
        $reading->unit_id = $unit_id;
        $reading->save();

        $this->readingText = '';

    }
    public function render()
    {
        return view('livewire.my-input');
    }
}
