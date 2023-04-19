<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this->call(ExpenseCategorySeeder::class);
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
