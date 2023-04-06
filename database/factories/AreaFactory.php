<?php

namespace Database\Factories;
use App\Models\Country;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {    
        $country=Country::select('id')->inRandomOrder()->limit(1)->get();
        
        return [
            'name'=>fake()->name(),
            'address'=>fake()->text($maxNbChars = 10),
            'country_id'=>$country[0]->id
        ];
        
    }
}
