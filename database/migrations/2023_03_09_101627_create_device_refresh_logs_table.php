<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceRefreshLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_refresh_logs', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 30)->nullable()->comment('id from devices table refer only category 1');
            $table->string('keycode', 30)->nullable();
            $table->text('request_log')->nullable();
            $table->text('response_log')->nullable();
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
        Schema::dropIfExists('device_refresh_logs');
    }
}
