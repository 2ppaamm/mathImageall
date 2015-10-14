<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->integer('track_id')->unsigned()->nullable();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('set null');
            $table->integer('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->integer('difficulty_id')->unsigned()->nullable();
            $table->foreign('difficulty_id')->references('id')->on('levels')->onDelete('set null');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('question');
            $table->string('image_question')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer1_image')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer2_image')->nullable();
            $table->string('answer3')->nullable();
            $table->string('answer3_image')->nullable();
            $table->string('answer4')->nullable();
            $table->string('answer4_image')->nullable();
            $table->string('correct_answer');
            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('source')->nullable();
            $table->string('solution')->nullable();
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
        Schema::drop('questions');
    }
}
