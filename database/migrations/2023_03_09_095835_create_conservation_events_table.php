<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConservationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conservation_events', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('device_id', 30)->comment('id from water conservation api');
            $table->date('event_date')->nullable();
            $table->string('event_begin', 50)->nullable();
            $table->string('event_end', 50)->nullable();
            $table->string('event_day_part', 50)->nullable();
            $table->string('event_duration', 50)->nullable();
            $table->string('total_seconds', 20)->nullable();
            $table->string('event_usage', 50)->nullable();
            $table->string('event_source', 50)->nullable();
            $table->string('leak_score', 50)->nullable();
            $table->integer('event_hour');
            $table->string('event_begin_gmt', 50);
            $table->string('event_end_gmt', 50);
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
        Schema::dropIfExists('conservation_events');
    }
}
