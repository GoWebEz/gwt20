<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterConservationApiLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_conservation_api_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('api_count', 20)->nullable()->comment('Water conservation api cron count');
            $table->dateTime('created_at');
            $table->integer('created_by')->nullable()->comment('Created By User Id');
            $table->timestamp('updated_at');
            $table->integer('updated_by')->nullable()->comment('Updated By User Id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_conservation_api_logs');
    }
}
