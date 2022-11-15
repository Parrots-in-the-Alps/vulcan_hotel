<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FooterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'mail' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->unique()->imageUrl(640, 480, 'volcano', true) 
        ];
    }
}
