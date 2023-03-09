<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConservationDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conservation_devices', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 30)->unique()->comment('id from water conservation api');
            $table->string('display_name', 50)->nullable();
            $table->string('client_id', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('init_date', 50)->nullable();
            $table->string('last_receipt', 50)->nullable();
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
        Schema::dropIfExists('conservation_devices');
    }
}
