<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('category_id')->comment('Foreign key of categories table');
            $table->string('code', 20);
            $table->string('name', 50);
            $table->string('primary_email', 50)->unique()->nullable();
            $table->string('secondary_email', 50)->unique()->nullable();
            $table->integer('state')->comment('Foreign key of states table');
            $table->string('city', 50)->nullable();
            $table->string('ZMW', 20)->nullable();
            $table->string('time_zone', 90)->nullable();
            $table->string('startup_hour', 20)->nullable();
            $table->string('opening_hour', 20)->nullable();
            $table->string('closing_hour', 20)->nullable();
            $table->string('shutdown_hour', 20)->nullable();
            $table->string('measurement', 20)->nullable();
            $table->string('cost_per_measurement', 20)->nullable();
            $table->boolean('is_location_changed')->default(0)->comment('0 = location is not changed, 1 = location is changed');
            $table->boolean('is_active')->default(1)->comment('1-Active & 0-Inactive');
            $table->dateTime('created_at')->useCurrent();
            $table->integer('created_by')->nullable()->comment('Created By User Id');
            $table->timestamp('updated_at')->useCurrent();
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
        Schema::dropIfExists('locations');
    }
}
