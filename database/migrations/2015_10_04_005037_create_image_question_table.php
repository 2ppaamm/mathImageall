<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_question', function (Blueprint $table) {
            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->on('images')->references('id')->onDelete('cascade');
            $table->string('question_id');
            $table->foreign('question_id')->on('questions')->references('id')->onDelete('cascade');
            $table->primary(['image_id','question_id']);
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
        Schema::drop('image_question');
    }
}
