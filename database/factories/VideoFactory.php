<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
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
            'video_link' => $this->faker->imageUrl(640, 480, 'actuality', true),
            'description_fr' => $this->faker->sentence(),
            'description_en' => $this->faker->sentence(),
        ];
    }
}
