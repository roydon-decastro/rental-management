<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => 'NCR'],
            ['name' => 'Abra'],
            ['name' => 'Agusan del Norte'],
            ['name' => 'Agusan del Sur'],
            ['name' => 'Aklan'],
            ['name' => 'Albay'],
            ['name' => 'Antique'],
            ['name' => 'Apayao'],
            ['name' => 'Aurora'],
            ['name' => 'Basilan'],
            ['name' => 'Bataan'],
            ['name' => 'Batanes'],
            ['name' => 'Batangas'],
            ['name' => 'Benguet'],
            ['name' => 'Biliran'],
            ['name' => 'Bohol'],
            ['name' => 'Bukidnon'],
            ['name' => 'Bulacan'],
            ['name' => 'Cagayan'],
            ['name' => 'Camarines Norte'],
            ['name' => 'Camarines Sur'],
            ['name' => 'Camiguin'],
            ['name' => 'Capiz'],
            ['name' => 'Catanduanes'],
            ['name' => 'Cavite'],
            ['name' => 'Cebu'],
            ['name' => 'Cotabato'],
            ['name' => 'Davao de Oro'],
            ['name' => 'Davao del Norte'],
            ['name' => 'Davao del Sur'],
            ['name' => 'Davao Occidental'],
            ['name' => 'Davao Oriental'],
            ['name' => 'Dinagat Islands'],
            ['name' => 'Eastern Samar'],
            ['name' => 'Guimaras'],
            ['name' => 'Ifugao'],
            ['name' => 'Ilocos Norte'],
            ['name' => 'Ilocos Sur'],
            ['name' => 'Iloilo'],
            ['name' => 'Isabela'],
            ['name' => 'Kalinga'],
            ['name' => 'La Union'],
            ['name' => 'Laguna'],
            ['name' => 'Lanao del Norte'],
            ['name' => 'Lanao del Sur'],
            ['name' => 'Leyte'],
            ['name' => 'Maguindanao del Norte'],
            ['name' => 'Maguindanao del Sur'],
            ['name' => 'Marinduque'],
            ['name' => 'Masbate'],
            ['name' => 'Misamis Occidental'],
            ['name' => 'Misamis Oriental'],
            ['name' => 'Mountain Province'],
            ['name' => 'Negros Occidental'],
            ['name' => 'Negros Oriental'],
            ['name' => 'Northern Samar'],
            ['name' => 'Nueva Ecija'],
            ['name' => 'Nueva Vizcaya'],
            ['name' => 'Occidental Mindoro'],
            ['name' => 'Oriental Mindoro'],
            ['name' => 'Palawan'],
            ['name' => 'Pampanga'],
            ['name' => 'Pangasinan'],
            ['name' => 'Quezon'],
            ['name' => 'Quirino'],
            ['name' => 'Rizal'],
            ['name' => 'Romblon'],
            ['name' => 'Samar'],
            ['name' => 'Sarangani'],
            ['name' => 'Siquijor'],
            ['name' => 'Sorsogon'],
            ['name' => 'South Cotabato'],
            ['name' => 'Southern Leyte'],
            ['name' => 'Sultan Kudarat'],
            ['name' => 'Sulu'],
            ['name' => 'Surigao del Norte'],
            ['name' => 'Surigao del Sur'],
            ['name' => 'Tarlac'],
            ['name' => 'Tawi-Tawi'],
            ['name' => 'Zambales'],
            ['name' => 'Zamboanga del Norte'],
            ['name' => 'Zamboanga del Sur'],
            ['name' => 'Zamboanga Sibugay'],

        ];

        foreach ($provinces as $key => $value) {
            Province::create($value);
        }
    }
}
