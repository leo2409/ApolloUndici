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
        $random = mt_rand(0,1);
        return [
            'film_id' => $this->faker->numberBetween(1,15),
            'seats' => $this->faker->numberBetween(10,70),
            'date' => $this->faker->dateTimeBetween('-1 days', '+15 days')->format('Y-m-d'),
            'time' => $this->faker->time(),
            'tag' => $random ? $this->faker->randomElement(['presentazione', 'q&a', 'rassegna']) : null,
            'description' => $random ? $this->faker->text() : null,
        ];
    }
}
