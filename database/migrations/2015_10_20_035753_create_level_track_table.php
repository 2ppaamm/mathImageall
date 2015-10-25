<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_track', function (Blueprint $table) {
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->ondelete('cascade');
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks')->ondelete('cascade');
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
        Schema::drop('level_track');
    }
}
