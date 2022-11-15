<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->unique()->name(),
            'number'=> $this->faker->unique()->randomNumber(2, false),
            'type'=> $this->faker->unique()->word(),
            'capacity'=> $this->faker->randomNumber(1, false),
            'price'=> $this->faker->randomNumber(4, false),
            'status'=> $this->faker->unique()->word(),
            'image'=> $this->faker->unique()->imageUrl(640, 480, 'hotel room', true),
            'description'=> $this->faker->unique()->paragraph()
        ];
    }
}
