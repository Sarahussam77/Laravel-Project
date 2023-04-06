<?php

namespace Database\Factories;
use App\Models\Area;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $area=Area::select('id')->inRandomOrder()->limit(1)->get();
        $user=User::select('id')->inRandomOrder()->where('typeable_type','app\Models\Client')->limit(1)->get();
        return [
            'street_name' => fake()->name(),
            'building_number' => fake()->randomNumber(),
            'floor_number' => fake()->randomNumber(),
            'flat_number' => fake()->randomNumber(),
            'is_main'=>'1',
            'area_id'=>$area[0]->id,
            'user_id'=>$user[0]->id,
            
        ];
    }
}
