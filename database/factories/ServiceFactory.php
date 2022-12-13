<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_icon' => $this->faker->imageUrl(640, 480, 'service', true),
            'title_fr' => $this->faker->word(),
            'title_en' => $this->faker->word(),
            'billing_type' => $this->faker->word(),
            'description_fr' => $this->faker->sentence(),
            'description_en' => $this->faker->sentence(),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
