<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('type_projet_id');
            $table->unsignedBigInteger('phase_mise_en_oeuvre_id');
            $table->unsignedBigInteger('secteur_domaine_activite_id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('departement_id');
            $table->string('intitule');
            $table->string('description');
            $table->date('date_demarrage');
            $table->date('date_cloture');
            $table->string('observation');
            $table->foreign('cluster_id')
                ->references('id')->on('clusters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('phase_mise_en_oeuvre_id')
                ->references('id')->on('phase_mise_en_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('secteur_domaine_activite_id')
                ->references('id')->on('secteur_domaine_activites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('departement_id')
                ->references('id')->on('departements')
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
        Schema::dropIfExists('projet_structure_clusters');
    }
}
