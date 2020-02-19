<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceJointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('type_piece_id');
            $table->string('nom');
            $table->foreign('message_id')
                ->references('id')->on('messages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('document_id')
                ->references('id')->on('documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_piece_id')
                ->references('id')->on('type_pieces')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('piece_jointes');
    }
}
