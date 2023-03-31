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
            'national_id'=>fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => 'admin@admin.com',
            'date_of_birth'=>fake()->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years'),
            'gender'=>fake()->numberBetween(1, 2),
            'phone'=>fake()->phoneNumber,
            'email_verified_at' => now(),
            
           
            
        ]);
        $admin->assignRole('admin');

    }
}
