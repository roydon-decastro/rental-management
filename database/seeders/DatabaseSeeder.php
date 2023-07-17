<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\BarangaySeeder;
use Database\Seeders\ProvinceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // step Expense Category
        $this->call(ExpenseCategorySeeder::class);
        // step Province
        $this->call(ProvinceSeeder::class);
        // step City
        $this->call(CitySeeder::class);
        // step City
        $this->call(BarangaySeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // fyi terminal commands
        /*
         php artisan migrate:fresh
         php artisan db:seed

         php artisan make:filament-user
         php artisan make:factory BuildingFactory
         php artisan make:seeder LevelsTableSeeder
        */
    }
}
