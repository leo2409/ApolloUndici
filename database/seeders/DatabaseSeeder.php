<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Film::factory(15)->create();
        Event::factory(40)->create();
    }
}
