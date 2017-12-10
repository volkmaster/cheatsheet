<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheatsheetKnowledgePiecePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheatsheet_knowledge_piece', function (Blueprint $table) {
            $table->integer('cheatsheet_id')->unsigned()->index();
            $table->integer('knowledge_piece_id')->unsigned()->index();
            $table->primary(['cheatsheet_id', 'knowledge_piece_id'], 'cheatsheet_knowledge_piece_primary');
            $table->integer('position');
            $table->timestamps();
        });

        Schema::table('cheatsheet_knowledge_piece', function (Blueprint $table) {
            $table->foreign('cheatsheet_id')->references('id')->on('cheatsheets')->onDelete('cascade');
            $table->foreign('knowledge_piece_id')->references('id')->on('knowledge_pieces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheatsheet_knowledge_piece');
    }
}
