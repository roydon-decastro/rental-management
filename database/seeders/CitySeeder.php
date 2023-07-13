<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Caloocan', 'province_id' => 1],
            ['name' => 'Las Piñas', 'province_id' => 1],
            ['name' => 'Makati', 'province_id' => 1],
            ['name' => 'Malabon', 'province_id' => 1],
            ['name' => 'Mandaluyong', 'province_id' => 1],
            ['name' => 'Manila', 'province_id' => 1],
            ['name' => 'Marikina', 'province_id' => 1],
            ['name' => 'Muntinlupa', 'province_id' => 1],
            ['name' => 'Navotas', 'province_id' => 1],
            ['name' => 'Parañaque', 'province_id' => 1],
            ['name' => 'Pasay', 'province_id' => 1],
            ['name' => 'Pasig', 'province_id' => 1],
            ['name' => 'Quezon City', 'province_id' => 1],
            ['name' => 'San Juan', 'province_id' => 1],
            ['name' => 'Taguig', 'province_id' => 1],
            ['name' => 'Valenzuela', 'province_id' => 1],
        ];

        foreach ($cities as $key => $value) {
            City::create($value);
        }
    }
}
