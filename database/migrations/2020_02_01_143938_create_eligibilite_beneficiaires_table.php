<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEligibiliteBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eligibilite_beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('etat_dossier_id');
            $table->unsignedBigInteger('decision_eligibilite_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->float('note_documention');
            $table->float('note_entretien');
            $table->float('moyenne');
            $table->float('date');
            $table->float('observation');
            $table->foreign('etat_dossier_id')
                ->references('id')->on('etat_dossiers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('decision_eligibilite_id')
                ->references('id')->on('decision_eligibilites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_beneficiaire_id')
                ->references('id')->on('dossier_beneficiaires')
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
        Schema::dropIfExists('eligibilite_beneficiaires');
    }
}
