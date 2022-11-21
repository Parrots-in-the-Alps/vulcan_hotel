<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->unique()->imageUrl(640, 480, 'lava', true),
            'slogan_fr' => $this->faker->unique()->realText($maxNbChars = 80, $indexSize = 2),
            'slogan_en' => $this->faker->unique()->realText($maxNbChars = 80, $indexSize = 2),
            'logo' => $this->faker->unique()->imageUrl(640, 480, 'volcano', true)
        ];
    }
}
