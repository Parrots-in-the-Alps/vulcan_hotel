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
            'title_fr' => $this->faker->word(),
            'title_en' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480, 'actuality', true),
            'description_fr' => $this->faker->sentence(),
            'description_en' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
