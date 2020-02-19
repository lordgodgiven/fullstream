<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEligibilitePrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eligibilite_prestataires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('etat_dossier_id');
            $table->unsignedBigInteger('decision_eligibilite_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->float('note1');
            $table->float('note2');
            $table->float('note3');
            $table->float('note4');
            $table->float('note5');
            $table->integer('total');
            $table->string('observation');
            $table->foreign('etat_dossier_id')
                ->references('id')->on('etat_dossiers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('decision_eligibilite_id')
                ->references('id')->on('decision_eligibilites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_prestataire_id')
                ->references('id')->on('dossier_prestataires')
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
        Schema::dropIfExists('eligibilite_prestataires');
    }
}
