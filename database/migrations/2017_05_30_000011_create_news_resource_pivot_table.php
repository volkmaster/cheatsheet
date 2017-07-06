<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsResourcePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_resource', function (Blueprint $table) {
            $table->integer('news_id')->unsigned()->index();
            $table->integer('resource_id')->unsigned()->index();
            $table->primary(['news_id', 'resource_id']);
            $table->timestamps();
        });

        Schema::table('news_resource', function (Blueprint $table) {
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_resource');
    }
}
