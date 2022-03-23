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
            $table->string('tag')->nullable();
            $table->text('synopsis');
            $table->json('info')->nullable();
            $table->string('poster')->nullable();
            $table->json('organizers')->nullable();
            $table->boolean('festival')->default(false);
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
