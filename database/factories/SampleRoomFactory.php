<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SampleRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_fr'=> $this->faker->unique()->name(),
            'name_en'=> $this->faker->unique()->name(),
            'type_fr'=> $this->faker->unique()->word(),
            'type_en'=> $this->faker->unique()->word(),
            'capacity'=> $this->faker->randomNumber(1, false),
            'price'=> $this->faker->randomNumber(4, false),
            'image'=> $this->faker->unique()->imageUrl(640, 480, 'hotel room', true),
            'description_fr'=> $this->faker->unique()->paragraph(),
            'description_en'=> $this->faker->unique()->paragraph(),
        ];
    }
}
