<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 20)->nullable();
            $table->string('startup_hour', 20)->nullable();
            $table->string('opening_hour', 20)->nullable();
            $table->string('closing_hour', 20)->nullable();
            $table->string('shutdown_hour', 20)->nullable();
            $table->string('measurement', 20)->nullable();
            $table->string('cost_per_measurement', 20)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
