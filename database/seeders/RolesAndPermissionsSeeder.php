<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $adminRole=Role::create(['name'=>'admin']);
       $doctorRole=Role::create(['name'=>'doctor']);
       $pharmacyRole=Role::create(['name'=>'pharmacy']);
    }
}
