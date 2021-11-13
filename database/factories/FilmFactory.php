<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(),
            //'poster' => $this->faker->imageUrl(),
            'poster' => '/posters/' . $this->faker->numberBetween(1,15) . '.jpeg',
        ];
    }
}
