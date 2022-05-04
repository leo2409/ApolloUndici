<?php

use App\Models\Festival;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->json('organizers')->nullable();
            //TODO: DURATA    permanente / finito / ultimo evento
            //TODO: icona rassegna (immagine quadrata)
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
        $rassegne = Festival::all();
        foreach ($rassegne as $rassegna) {
            $rassegna->delete();
        }
        Schema::dropIfExists('festivals');
    }
}
