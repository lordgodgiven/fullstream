<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffrePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_prestations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('zone_intervention_id');
            $table->unsignedBigInteger('visa_decision_id');
            $table->unsignedBigInteger('appreciation_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->string('description');
            $table->string('titre');
            $table->string('duree_hj');
            $table->string('tarif_journalier');
            $table->string('type_clible');
            $table->string('moyens_intervention');
            $table->string('moyens_beneficiaire');
            $table->string('contraintes');
            $table->string('references_clients');
            $table->date('date_validation');
            $table->date('date_validite');
            $table->string('observation');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('zone_intervention_id')
                ->references('id')->on('zone_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('visa_decision_id')
                ->references('id')->on('visa_decisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('appreciation_id')
                ->references('id')->on('appreciations')
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
        Schema::dropIfExists('offre_prestations');
    }
}
