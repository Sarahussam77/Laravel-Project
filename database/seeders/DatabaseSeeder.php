<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pharmacy;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    $this->call([
    //     RolesAndPermissionsSeeder::class,
    //     UserSeeder::class
    //    ]); 
    //Seed the countries
$this->call('CountriesSeeder');
$this->command->info('Seeded the countries!'); 

       Pharmacy::factory(10)->create();
    }
}
