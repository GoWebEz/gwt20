<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConservationHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conservation_hours', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 30);
            $table->string('hour', 50)->nullable();
            $table->string('flow', 50)->nullable();
            $table->string('flow_unit', 10)->nullable();
            $table->string('max_leak_score', 50)->nullable();
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
        Schema::dropIfExists('conservation_hours');
    }
}
