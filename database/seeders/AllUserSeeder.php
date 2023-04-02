<?php

namespace Database\Seeders;

use App\Models\All_Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AllUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin= All_Users::create([
            'name' => 'admin',
            'password' =>Hash::make(123456) ,
            'avatar_image'=>'admin.jpg',
            'national_id'=>fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'user_type'=>'admin'
        ]);
        $admin->assignRole('admin');
    }
}
