<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 20)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('client_name', 50)->nullable()->comment('client name from water conservation api');
            $table->string('status', 50)->nullable();
            $table->string('key_code', 30)->nullable();
            $table->string('name', 50)->nullable();
            $table->integer('location_id')->comment('Foreign key of category table');
            $table->string('mode', 50)->nullable();
            $table->string('setpoint', 50)->nullable();
            $table->boolean('is_active')->default(1)->comment('1-Active & 0-Inactive');
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
        Schema::dropIfExists('devices');
    }
}
