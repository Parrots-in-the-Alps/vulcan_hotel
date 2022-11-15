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
            'title' => $this->faker->word(),
            'video_link' => $this->faker->imageUrl(640, 480, 'actuality', true),
            'description' => $this->faker->sentence(),
        ];
    }
}
