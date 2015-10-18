<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_maker_id')->unsigned()->default(1);
            $table->foreign('test_maker_id')->references('id')->on('users')->ondelete('cascade');
            $table->integer('user_id')->unsigned()->default(2);
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->string('image')->nullable();
            $table->boolean('completed')->nullable();
            $table->date('date_completed');
            $table->decimal('result', 3, 2);
            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::drop('tests');
    }
}
