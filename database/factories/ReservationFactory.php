<?php

namespace Database\Factories;

use Carbon\Carbon;
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
            'entryDate' => Carbon::now()->format('Y-m-d'),
            'exitDate' => Carbon::now()->addMonth()->format('Y-m-d'),
            'user_id' => $this->faker->numberBetween(1, 10),
            'service_id' => [$this->faker->numberBetween(1, 5), $this->faker->numberBetween(1, 5),],
            'room_id' => $this->faker->numberBetween(1,31),
        ];
    }
}
