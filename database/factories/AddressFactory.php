<?php

namespace Database\Factories;

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
    {
        return [
            'street_name' => fake()->name(),
            'building_number' => fake()->randomNumber(),
            'floor_number' => fake()->randomNumber(),
            'flat_number' => fake()->randomNumber(),
            'is_main'=>'1',
            'area_id'=>fake()->randomNumber(),
            'user_id'=>fake()->randomNumber(),

        ];
    }
}
