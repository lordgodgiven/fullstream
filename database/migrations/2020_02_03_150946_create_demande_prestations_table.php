<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_prestations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->unsignedBigInteger('type_demande_id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('zone_intervention_id');
            $table->unsignedBigInteger('situation_demande_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('duree_homme_jour');
            $table->string('motivation');
            $table->date('date_creation');
            $table->date('date_modification');
            $table->foreign('dossier_beneficiaire_id')
                ->references('id')->on('dossier_beneficiaires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_demande_id')
                ->references('id')->on('type_demandes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cluster_id')
                ->references('id')->on('clusters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('zone_intervention_id')
                ->references('id')->on('zone_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_demande_id')
                ->references('id')->on('situation_demandes')
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
        Schema::dropIfExists('demande_prestations');
    }
}
