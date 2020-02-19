<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceIdentitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_identites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('individu_id');
            $table->unsignedBigInteger('structure_id');
            $table->unsignedBigInteger('type_piece_identite_id');
            $table->string('autre_autorite');
            $table->date('date_delivrance');
            $table->date('date_expiration');
            $table->date('date_prorogation');
            $table->string('observations');
            $table->foreign('individu_id')
                ->references('id')->on('individus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('structure_id')
                ->references('id')->on('structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_piece_identite_id')
                ->references('id')->on('type_piece_identites')
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
        Schema::dropIfExists('piece_identites');
    }
}
