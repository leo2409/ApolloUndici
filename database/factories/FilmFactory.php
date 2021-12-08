<?php

namespace Database\Factories;

use App\Helpers\Filters\ResizesEncodingFilter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Image;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        static $n = 1;
        $title = $this->faker->text(20);
        $path = 'posters/' . str_replace(" ", "-", $title) . '-' . $n;
        Image::make(public_path('posters/' . $n++ . '.jpeg' ))->filter(new ResizesEncodingFilter('.jpeg', storage_path('app/public/' . $path)));
        return [
            'title' => $title,
            'synopsis' => $this->faker->text(),
            'tag' => $this->faker->randomElement(['film','musica','letteratura']),
            //'poster' => $this->faker->imageUrl(),
            'poster' => $path,
        ];
    }
}
