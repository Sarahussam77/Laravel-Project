<?php

namespace Database\Seeders;

use App\Models\All_Users;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
            // 'avatar_image'=>'admin.jpg',
            // 'national_id'=>fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => 'admin2@admin.com',
            // 'email_verified_at' => now(),
            'typeable_type'=>'admin',
            'typeable_id'=>'1'


        ]);
        $admin->assignRole('admin');

        $pharmacy= User::create([
            'name' => 'sameh',
            'password' =>Hash::make(123456) ,
            // 'avatar_image'=>'admin.jpg',
            // 'national_id'=>fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => 'pharmacy@gmail.com',
            // 'email_verified_at' => now(),
            'typeable_type'=>'pharmacy',
            'typeable_id'=>'3'


        ]);
        $pharmacy->assignRole('pharmacy');

   
    }
}

