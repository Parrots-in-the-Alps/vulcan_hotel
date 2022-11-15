<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_num' => $this->faker->randomDigit(),
            'street_name' => $this->faker->name(),
            'zip' => $this->faker->postCode(),
            'city_name' => $this->faker->city(),
            'country' => $this->faker->country(),
            
        ];
    }
}
