<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CallToActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title_fr' =>$this->faker->word(),
            'title_en' =>$this->faker->word(),
            'action' =>$this->faker->randomDigit(),


        ];
    }
}
