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
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->integer('difficulty_id')->unsigned();
            $table->foreign('difficulty_id')->references('id')->on('levels');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('question');
            $table->string('image')->nullable();
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('answer4');
            $table->string('correct_answer');
            $table->boolean('is_private')->default(FALSE);
            $table->boolean('is_hidden')->default(FALSE);
            $table->string('source')->nullable();
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
