<?php

namespace App\Filament\Pages;

use App\Models\rental_income;
use App\Models\RentalIncome as ModelsRentalIncome;
use Filament\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalIncome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Rent';

    protected static ?string $navigationLabel = 'Add Monthly Rental';

    protected static string $view = 'filament.pages.rental-income';

    public $units = '';
    public $unit_id = '';
    public $unit_name = '';
    public $rental_date = '';
    public $prev_readings = [];
    public $readingText = [];
    public $rental_income = [];
    public $name = '';
    public int $tenant_count;

    public function mount()
    {
        $this->units = DB::table('units')
            ->orderBy('units.name')
            ->get();
    }

    public function updated()
    {
        $this->units = DB::table('units')
            ->orderBy('units.name')
            ->get();
    }

    public function submit()
    {

        $form_fields = $this->rental_income;
        $rentalIncomeArray = [];

        foreach ($form_fields as $element) {
            foreach ($element as $key => $value) {
                $rentalIncomeArray[] = [
                    'unit_id' => $key,
                    'income' => $value['income'],
                    'date' => $value['date']
                ];
            }
        }

        // dd($rentalIncomeArray);

        $tenants = DB::table('tenants')
  			->select('tenants.id as tenantID', 'tenants.unit_id', 'tenants.name')
  			->get();
        $tenantsArray = $tenants->toArray();



        // dd($tenants);
        // dd(gettype($tenantsArray));

        $unitsTenantRental = [];

        foreach ($rentalIncomeArray as $element) {
            //  print_r($element);
            $unitId = $element['unit_id'];

            // find the corresponding element in the tenant array
            $tenantElement = null;
            foreach ($tenantsArray as $tenant) {
                if ($tenant->unit_id == $unitId) {
                    $tenantElement = $tenant;
                    break;
                }
            }

            // create a new element with the combined data
            // dd(gettype($tenantElement));
            $newElement = array_merge($element, json_decode(json_encode($tenantElement), true));
            $unitsTenantRental[] = $newElement;
        }

        // dd($unitsTenantRental);

        foreach ($unitsTenantRental as $indRental) {
            // dd($indRental);
            // foreach ($indRental as $key => $value) {
                // dd($key);
                $rental = new ModelsRentalIncome() ;
                $rental->unit_id = $indRental['unit_id'];
                $rental->tenant_id = $indRental['tenantID'];
                $rental->income = $indRental['income'];
                $rental->pay_date = $indRental['date'];
                $rental->save();
            // }
        };
        return redirect()->to('admin');

    }
}
