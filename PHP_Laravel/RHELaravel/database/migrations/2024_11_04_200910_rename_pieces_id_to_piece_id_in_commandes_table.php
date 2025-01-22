<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePiecesIdToPieceIdInCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->renameColumn('pieces_id', 'piece_id');
        });
    }
    
    public function down()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->renameColumn('piece_id', 'pieces_id');
        });
    }
}
