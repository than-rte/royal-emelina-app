<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodSetitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_setitems', function (Blueprint $table) {
            $table->id();
            $table->integer('foodset_id');
            $table->string('name')->unique();
            $table->timestamps();

            $table->foreign('foodset_id')->references('id')->on('food_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_setitems');
    }
}
