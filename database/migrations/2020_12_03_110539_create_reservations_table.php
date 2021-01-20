<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('cell_number');
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->integer('user_id');
            $table->integer('event_id');
            $table->integer('venue_id');
            $table->integer('foodset_id')->nullable();

            $table->tinyInteger('read')->default(0);
            $table->tinyInteger('booked')->default(0);
            $table->tinyInteger('deleted')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('foodset_id')->references('id')->on('food_sets');

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
        Schema::dropIfExists('reservations');
    }
}
