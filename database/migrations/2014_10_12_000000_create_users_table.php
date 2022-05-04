<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->dateTime('birthday');
            $table->string('birth_place');
            $table->string('city');
            $table->string('address');
            $table->string('cap');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('accepted')->nullable();
            $table->timestamp('associated_at')->nullable();
            $table->enum('status', ['richiedente', 'nuovo', 'rinnovo', 'rifiutato']);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    //TODO: ADD STATUS COLUMN MIGRATION

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
