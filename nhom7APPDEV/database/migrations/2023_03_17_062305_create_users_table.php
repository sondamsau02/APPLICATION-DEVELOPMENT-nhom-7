<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',13)->nullable();
            $table->string('department',50)->nullable();
            $table->string('type',200)->nullable()->default('internal');
            $table->string('academic_standard',50)->nullable();
            $table->string('age',2)->nullable();
            $table->string('date_of_birth',10)->nullable();
            $table->string('address',100)->nullable();
            $table->string('CERF_level',2)->nullable();
            $table->string('proficient_language',50)->nullable('none');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
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
};
