<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_locations', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('city', 50);
            $table->string('state_code', 2);
            $table->string('country_code', 2);
            $table->string('country', 50);
            $table->string('zmw', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_locations');
    }
}
