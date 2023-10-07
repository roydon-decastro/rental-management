<?php

namespace App\Filament\Pages;

use App\Models\rental_income;
use App\Models\RentalIncome as ModelsRentalIncome;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalIncome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Rental Income';
    protected static ?string $navigationLabel = 'Add Rental Incomes';
    protected static string $view = 'filament.pages.rental-income';

    public $units = [];
    public $tenants = [];
    public $selectedUnit;
    public $selectedTenant;
    public $income_count = 1;
    public $incomesArray = [];

    public function mount()
    {
        $this->units = Unit::orderBy('name')->get();
        $this->tenants = Tenant::all();
    }

    public function updated()
    {
        $this->units = Unit::orderBy('name')->get();
        $this->tenants = Tenant::all();
    }

    public function changeUnit()
    {
        // if ($this->incomesArray['selectedUnit'] !== '-1') {
        //     $this->tenants = Tenant::where('unit_id', $this->selectedUnit)->get();
        // }

        // dd($this->incomesArray);
        foreach ($this->incomesArray as $single_income) {
            // dd($single_income['selectedUnit']);
            if ($single_income['selectedUnit'] !== '-1') {
                $this->tenants = Tenant::where('unit_id', $single_income['selectedUnit'])->get();
            }
        }
    }

    public function submit()
    {
        // dd($this->incomesArray);
        foreach ($this->incomesArray as $single_income) {
            $income = new ModelsRentalIncome();
            $income->unit_id = $single_income['selectedUnit'];
            $tenant = DB::table('tenants')
                ->select('id', 'name')
                ->where('unit_id', '=', $single_income['selectedUnit'])
                ->where('is_current', '=', 1)
                ->where('is_primary', '=', 1)
                ->first();
            // dd($tenant->name);
            $income->tenant_id = $tenant->id;
            $income->category = $single_income['category'];
            $income->payment_mode = $single_income['payment_mode'];
            $income->amount = $single_income['amount'];
            $income->pay_date = $single_income['pay_date'];
            $income->notes =
                isset($single_income['notes']) ? $single_income['notes'] : null;
            $income->save();
        };

        return redirect()->to('admin');
    }
}
