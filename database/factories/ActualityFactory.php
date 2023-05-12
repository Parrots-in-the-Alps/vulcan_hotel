<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActualityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(640, 480, 'actuality', true),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'title' => [
                'fr' => $this->faker->word(),
                'en' => $this->faker->word()
            ],
            'description' => [
                'fr' => $this->faker->sentence(),
                'en' => $this->faker->sentence()
            ]
        ];
    }
}
