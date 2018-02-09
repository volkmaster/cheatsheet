<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('description')->nullable();
            $table->text('code');
            $table->integer('language_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('knowledge_pieces', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knowledge_pieces');
    }
}
