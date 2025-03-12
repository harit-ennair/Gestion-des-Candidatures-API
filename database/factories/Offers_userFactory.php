<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\offers_user>
 */
class Offers_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'offer_id' => $this->faker->biasedNumberBetween(1, 10),
            'user_id' => $this->faker->biasedNumberBetween(1, 1),
            'cv' => $this->faker->text,
        ];
    }
}
