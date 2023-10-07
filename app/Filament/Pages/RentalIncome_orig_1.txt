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

    protected static ?string $navigationGroup = 'Rental Income';

    protected static ?string $navigationLabel = 'Add Monthly Rental';

    protected static string $view = 'filament.pages.rental-income';

    public $units = [];
    public $unit_id = '';
    public $unit_name = '';
    public $rental_date = '';
    public $prev_readings = [];
    public $readingText = [];
    public $rental_income = [];
    public $name = '';
    public int $tenant_count;
    public int $occupied_units;
    public int $occupied_count;

    public function mount()
    {
        // $this->units = DB::table('units')
        //     ->orderBy('units.name')
        //     ->get();

        // dd($this->units);

        $originalUnits = DB::table('units')
            ->leftJoin('tenants', 'units.id', '=', 'tenants.unit_id')
            ->select(
                'units.id as unitID',
                'units.name',
                'units.rent',
                'tenants.id as tenantID',
                'tenants.name as tenantName',
                'tenants.photo as tenantPhoto',
                'tenants.is_current as occupied',
                'tenants.has_parking as hasParking',
                'tenants.rent as tenantRent',
                'tenants.parking_fee as tenantParkingFee',
                'tenants.start_date as tenantStart',
                'tenants.end_date as tenantEnd'
            )
            ->where('tenants.is_current', '=', true)
            ->orderBy('units.name')
            ->get();

        $this->units = $originalUnits;
        // $this->occupied_count = array_count_values(array_column($this->units->toArray(), 'occupied'))[1];
        // dd($originalUnits);



        $this->rental_income = $originalUnits->map(function ($unit) {
            // $income = $unit->rent;
            $income = $unit->tenantRent;
            $id = $unit->unitID;
            $name = $unit->name;
            $tenant_name = $unit->tenantName;
            $occupied = $unit->occupied;
            $hasParking = $unit->hasParking;
            $parking_fee = $unit->tenantParkingFee;
            // if ($hasParking){
            //     $parking_fee = 750;
            // }
            $tenant_id = $unit->tenantID;
            return [
                // $id => [
                'income' => $income,
                'id' => $id,
                'occupied' => $occupied,
                'hasParking' => $hasParking,
                'tenant_id' => $tenant_id,
                'tenant_name' => $tenant_name,
                'name' => $name,
                'parking_fee' => $parking_fee,
                'date' => null
                // ],
            ];
        })->values()->toArray();

        // $this->units = json_decode(json_encode($unitsArray), true);
        // $units = json_encode($unitsArray);
        // $units = $unitsArray;

        // dd($units);
        // dd(gettype($units));

        // dd ($this->units);
        // foreach ($this->units as $unit) {
        // dd($indRental);
        // foreach ($indRental as $key => $value) {
        // dd($key);
        // $rental = new ModelsRentalIncome() ;
        // $rental->unit_id = $indRental['unit_id'];
        // $rental->tenant_id = $indRental['tenantID'];
        // $rental->income = $indRental['income'];
        // $rental->parking_fee = $indRental['parking_fee'];
        // $rental->pay_date = $indRental['date'];
        // $rental->save();
        // }
        // };
    }

    public function updated()
    {
        // $this->units = DB::table('units')
        //     ->orderBy('units.name')
        //     ->get();


        $originalUnits = DB::table('units')
            ->leftJoin('tenants', 'units.id', '=', 'tenants.unit_id')
            ->select(
                'units.id as unitID',
                'units.name',
                'units.rent',
                'tenants.id as tenantID',
                'tenants.name as tenantName',
                'tenants.is_current as occupied',
                'tenants.has_parking as hasParking',
                'tenants.rent as tenantRent',
                'tenants.parking_fee as tenantParkingFee',
                'tenants.start_date as tenantStart',
                'tenants.end_date as tenantEnd'
            )
            ->orderBy('units.name')
            ->get();

        $this->units = $originalUnits;
    }

    public function submit()
    {

        // $form_fields = $this->rental_income;
        // $rentalIncomeArray = [];

        // dd($form_fields);

        // foreach ($form_fields as $element) {
        //     foreach ($element as $key => $value) {
        //         $rentalIncomeArray[] = [
        //             'unit_id' => $key,
        //             'income' => $value['income'],
        //             'parking_fee' => $value['parking_fee'],
        //             'date' => $value['date']
        //         ];
        //     }
        // }

        // dd($rentalIncomeArray);

        // $tenants = DB::table('tenants')
        //     ->select('tenants.id as tenantID', 'tenants.unit_id', 'tenants.name')
        //     ->get();
        // $tenantsArray = $tenants->toArray();



        // dd($tenants);
        // dd(gettype($tenantsArray));

        // $unitsTenantRental = [];

        // foreach ($rentalIncomeArray as $element) {
        //  print_r($element);
        // $unitId = $element['unit_id'];

        // find the corresponding element in the tenant array
        // $tenantElement = null;
        // foreach ($tenantsArray as $tenant) {
        //     if ($tenant->unit_id == $unitId) {
        //         $tenantElement = $tenant;
        //         break;
        //     }
        // }

        // create a new element with the combined data
        // dd(gettype($tenantElement));
        //     $newElement = array_merge($element, json_decode(json_encode($tenantElement), true));
        //     $unitsTenantRental[] = $newElement;
        // }

        // dd($unitsTenantRental);

        // dd($this->rental_income);

        foreach ($this->rental_income as $indRental) {
            // dd($indRental);
            // foreach ($indRental as $key => $value) {
            // dd($key);
            if ($indRental['occupied'] == true) {

                $rental = new ModelsRentalIncome();
                $rental->unit_id = $indRental['id'];
                $rental->tenant_id = $indRental['tenant_id'];
                $rental->income = $indRental['income'];
                $rental->parking_fee = $indRental['parking_fee'];
                $rental->pay_date = $indRental['date'];
                $rental->save();
            }
            // }
        };
        return redirect()->to('admin');
    }
}
