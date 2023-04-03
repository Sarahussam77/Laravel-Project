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
       $clientRole=Role::create(['name'=>'client']);
       $createDoctorPer = Permission::create(['name' => 'create doctor']);
       $updatePharmacyinfoPer = Permission::create(['name' => 'update some pharmacy info']);
       $updatePharmacyareaPer = Permission::create(['name' => 'update pharmacy area']);
       $updatePharmacypriorityPer = Permission::create(['name' => 'update priority ']);
       $adminRole->givePermissionTo([$createDoctorPer, $updatePharmacyinfoPer, $updatePharmacyareaPer, $updatePharmacypriorityPer]);
       $pharmacyRole->givePermissionTo([$createDoctorPer, $updatePharmacyinfoPer]);
    }
}
