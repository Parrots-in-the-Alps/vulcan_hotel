<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entryDate' => $this->faker->dateTimethisYear(),
            'exitDate' => $this->faker->dateTimeThisyear(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'room_id' => $this->faker->numberBetween(1,31),
        ];
    }
}
