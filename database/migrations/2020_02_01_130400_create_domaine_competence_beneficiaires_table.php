<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomaineCompetenceBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaine_competence_bens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('statut_validation_comp_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->string('observation');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('statut_validation_comp_id')
                ->references('id')->on('statut_validation_comps')
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
        Schema::dropIfExists('domaine_comptence_beneficiaires');
    }
}
