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
            $table->increments('id');
            $table->integer('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('set null');
            $table->integer('difficulty_id')->unsigned()->nullable();
            $table->foreign('difficulty_id')->references('id')->on('difficulties')->onDelete('set null');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('question');
            $table->string('question_image')->nullable();
            $table->string('answer0')->nullable();
            $table->string('answer0_image')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer1_image')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer2_image')->nullable();
            $table->string('answer3')->nullable();
            $table->string('answer3_image')->nullable();
            $table->integer('correct_answer');
            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('source')->nullable();
            $table->string('solution')->nullable();
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
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
