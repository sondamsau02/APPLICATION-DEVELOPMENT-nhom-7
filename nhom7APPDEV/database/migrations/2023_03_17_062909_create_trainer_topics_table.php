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
        Schema::create('trainer_topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('topic_id');
 
            $table->foreign('topic_id')->references('id')->on('topics');
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
        Schema::dropIfExists('trainer_topics');
    }
};