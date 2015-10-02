<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->integer('current_level');
            $table->time('date_attained_current');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('users_tracks');
    }
}
