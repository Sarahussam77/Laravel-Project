<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->randomNumber(),
            'user_address_id'=>fake()->randomNumber(),,
            'doctor_id'=>fake()->randomNumber(),,
            'pharmacy_id'=>fake()->randomNumber(),,
            'status'=>'1',
            'actions'=>fake()->text(),
            'is_insured'=>'1',
            'creator_type'=>'1',
            'price'=>fake()->randomNumber(),
        ];
    }
}
