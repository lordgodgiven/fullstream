<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotationBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notation_beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->unsignedBigInteger('visa_decision_id');
            $table->unsignedBigInteger('dossier_mise_oeuvre_id');
            $table->date('date_enregistrement');
            $table->string('ref_tdr');
            $table->date('date_signature_tdr');
            $table->string('representant_beneficiaire');
            $table->string('email_representation_beneificiare');
            $table->String('telephone_representant_beneficiaire');
            $table->string('observation_beneficaire');
            $table->float('note_moyenne');
            $table->String('observation_gestionnaire');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_beneficiaire_id')
                ->references('id')->on('dossier_beneficiaires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_prestataire_id')
                ->references('id')->on('dossier_prestataires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('visa_decision_id')
                ->references('id')->on('visa_decisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_mise_oeuvre_id')
                ->references('id')->on('dossier_mise_oeuvres')
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
        Schema::dropIfExists('notation_beneficiaires');
    }
}
