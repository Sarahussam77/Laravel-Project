<?php

namespace App\Console\Commands;
use Spatie\Permission\Models\Role;
use Illuminate\Console\Command;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {email} 
    {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create new admin user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {  
        $email = explode('=',$this->argument('email'));
        $password = explode('=',$this->argument('password'));
        
        $user =  User::create([
            'name' => 'admin',
            'email' => $email[1],
            'password' => Hash::make($password[1]),
            'avatar_image'=>'admin.jpg',
        'national_id'=>fake()->unique()->randomNumber($nbDigits = NULL, $strict = false),
            
            'date_of_birth'=>fake()->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years'),
        'gender'=>fake()->numberBetween(1, 2),
        'phone'=>fake()->phoneNumber,
        'email_verified_at' => now(),
        'user_type'=>'admin'
            
        ])->id;
        
        $role_id = DB::table('roles')->where('name', 'admin')->value('id');
        User::find($user)->roles()->sync($role_id) ;
    }
}
