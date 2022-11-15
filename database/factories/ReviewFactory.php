<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => 'Xx__' . $this->faker->word() . '__xXDu' . random_int(1, 99),
            'image_user_avatar' => Str::random(10) . '.png',
            'rating' => random_int(0, 5),
            'comment' => $this->faker->paragraph(),
            'creation_date' => $this->faker->dateTime()
        ];
    }
}
