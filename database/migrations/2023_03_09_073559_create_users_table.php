<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('role_id')->comment('Foreign key from roles');
            $table->string('name', 20);
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 20)->nullable();
            $table->string('email', 20)->unique();
            $table->string('password', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('designation_id')->comment('Foreign key from designations');
            $table->boolean('is_active')->default(1)->comment('1-Active & 0-Inactive');
            $table->string('token', 50)->nullable();
            $table->string('token_expiry', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('users');
    }
}
