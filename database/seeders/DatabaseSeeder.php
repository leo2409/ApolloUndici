<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Event;
use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        //Film::factory(15)->create();
        //Event::factory(40)->create();

        //creazione admin
        $a = new Administrator();
        $a->username = 'leo';
        $a->password = Hash::make('leo');
        $a->email = 'leonardo.brunetti24@gmail.com';
        $a->big_boss = true;
        $a->remember_token = Str::random(10);
        $a->save();
    }
}
