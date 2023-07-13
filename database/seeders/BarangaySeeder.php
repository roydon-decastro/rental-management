<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangays = [
            ['name' => 'Binondo', 'city_id' => 6],
            ['name' => 'Ermita', 'city_id' => 6],
            ['name' => 'Intramuros', 'city_id' => 6],
            ['name' => 'Malate', 'city_id' => 6],
            ['name' => 'Paco', 'city_id' => 6],
            ['name' => 'Pandacan', 'city_id' => 6],
            ['name' => 'Port Area', 'city_id' => 6],
            ['name' => 'Quiapo', 'city_id' => 6],
            ['name' => 'Sampaloc', 'city_id' => 6],
            ['name' => 'San Andres', 'city_id' => 6],
            ['name' => 'San Miguel', 'city_id' => 6],
            ['name' => 'San Nicolas', 'city_id' => 6],
            ['name' => 'Santa Ana', 'city_id' => 6],
            ['name' => 'Santa Cruz', 'city_id' => 6],
            ['name' => 'Santa Mesa', 'city_id' => 6],
            ['name' => 'Tondo', 'city_id' => 6],

        ];

        foreach ($barangays as $key => $value) {
            Barangay::create($value);
        }
    }
}
