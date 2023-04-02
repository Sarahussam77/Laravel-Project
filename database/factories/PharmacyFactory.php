<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacy>
 */
class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => fake()->name(),
            'password' => fake()->randomNumber($nbDigits = NULL, $strict = false), // password
            'avatar_image' => Str::random(10),
            'national_id' => fake()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => fake()->unique()->safeEmail(),
=======
>>>>>>> d515279e4754757eadecd710c84198dadf6fa62b
            'area_id'=>'1',
            'priority'=>'4'
        ];
    }
}
