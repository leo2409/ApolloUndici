<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'film_id' => Film::factory(),
            'seats' => $this->faker->numberBetween(10,70),
            'date' => $this->faker->dateTimeBetween('+0 days', '+15 days')->format('Y-m-d'),
            'time' => $this->faker->time(),
            'description' => $this->faker->text(),
        ];
    }
}
