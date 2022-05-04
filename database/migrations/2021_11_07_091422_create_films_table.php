<?php

use App\Models\Film;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->string('tag')->nullable();
            $table->string('director');
            $table->text('synopsis');
            $table->text('info')->nullable();
            $table->string('trailer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $films = Film::all();
        foreach ($films as $film) {
            $film->delete();
        }
        Schema::dropIfExists('films');
    }
}
