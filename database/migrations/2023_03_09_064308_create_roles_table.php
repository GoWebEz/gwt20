<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50);
            $table->boolean('is_active')->default(1);
            $table->dateTime('created_at');
            $table->integer('created_by')->nullable()->comment('Created By User Id');
            $table->dateTime('updated_at');
            $table->integer('updated_by')->nullable()->comment('Created By User Id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
