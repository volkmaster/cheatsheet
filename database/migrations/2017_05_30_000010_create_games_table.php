<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team1_id')->unsigned();
            $table->integer('team2_id')->unsigned();
            $table->integer('score1')->unsigned();
            $table->integer('score2')->unsigned();
            $table->datetime('date');
            $table->integer('venue_id')->unsigned()->nullable();
            $table->integer('referee_id')->unsigned()->nullable();
            $table->integer('league_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('referee_id')->references('id')->on('referees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
