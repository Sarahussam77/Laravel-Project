<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // User::create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        //     'password' => Hash::make('mypassword'), // Replace 'mypassword' with your desired password
        //     'avatar_image'=>'abc',
        //     'national_id'=>'1234',
        //     "date_of_birth"=> now(),
        //     'gender'=>1,
        //     'phone'=>123,
        // ]);

    }
}
