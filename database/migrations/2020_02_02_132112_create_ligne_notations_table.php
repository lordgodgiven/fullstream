<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneNotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_notations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_critere_indicateur_id');
            $table->unsignedBigInteger('domaine_evaluation_id');
            $table->float('note');
            $table->string('observation');
            $table->foreign('type_critere_indicateur_id')
                ->references('id')->on('type_critere_indicateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('domaine_evaluation_id')
                ->references('id')->on('domaine_evaluations')
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
        Schema::dropIfExists('ligne_notations');
    }
}
