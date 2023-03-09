<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConservationDeviceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conservation_device_details', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 30)->comment('id from water conservation api');
            $table->string('display_name', 50)->nullable();
            $table->string('client_id', 50)->nullable()->comment('id from water conservation api');
            $table->string('varient', 30)->nullable();
            $table->string('init_date', 50)->nullable();
            $table->string('status', 30)->nullable();
            $table->string('last_recipt', 50)->nullable();
            $table->string('pct_last_days', 50)->nullable();
            $table->string('pct_last_7_days', 50)->nullable();
            $table->string('learning_pct_complete', 20)->nullable();
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
        Schema::dropIfExists('conservation_device_details');
    }
}
