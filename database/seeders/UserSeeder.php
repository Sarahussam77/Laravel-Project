<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $admin= User::create([
            'name' => 'admin',
            'password' =>Hash::make(123456) ,
            'avatar_image'=>'admin.jpg',
            'national_id'=>'5394267842450618',
            'email' => 'admin@admin.com',
            'date_of_birth'=>'1998-12-18',
            'gender'=>1,
            'phone'=>'01273296544',
            'email_verified_at' => now(),
           
            
        ]);
        $admin->assignRole('admin');

    }
}
