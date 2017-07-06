<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->integer('founded');
            $table->integer('resource_id')->unsigned()->nullable();
            $table->string('motto', 255)->nullable();
            $table->string('homepage', 2048)->nullable();
            $table->decimal('location_latitude', 9, 6);
            $table->decimal('location_longitude', 9, 6);
            $table->integer('coach_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('teams', function (Blueprint $table)
        {
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
