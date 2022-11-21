<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => Str::random(10) . '.png',
            'name_fr' => Str::random(10),
            'name_en' => Str::random(10),
        ];
    }
}
