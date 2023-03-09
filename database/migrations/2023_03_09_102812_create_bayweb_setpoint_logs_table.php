<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaywebSetpointLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayweb_setpoint_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 20)->nullable()->comment('id from devices table refer category 1');
            $table->integer('location_id')->nullable();
            $table->string('previous_mode', 20)->nullable();
            $table->string('current_mode', 20)->nullable();
            $table->string('previous_setpoint', 20)->nullable();
            $table->string('current_setpoint', 20)->nullable();
            $table->string('request_log', 20)->nullable();
            $table->string('response_log', 20)->nullable();
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
        Schema::dropIfExists('bayweb_setpoint_logs');
    }
}
