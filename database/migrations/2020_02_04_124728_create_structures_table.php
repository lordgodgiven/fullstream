<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_juridique_id');
            $table->unsignedBigInteger('forme_juridique_id');
            $table->unsignedBigInteger('secteur_juridique_id');
            $table->unsignedBigInteger('secteur_domaine_activite_id');
            $table->unsignedBigInteger('departement_secteur_ministeriel');
            $table->unsignedBigInteger('type_activite_id');
            $table->unsignedBigInteger('type_structure_id');
            $table->unsignedBigInteger('categorie_structure_id');
            $table->unsignedBigInteger('situation_structure_id');
            $table->unsignedBigInteger('structure');
            $table->string('denomination_raison_sociale');
            $table->string('nom');
            $table->string('prenom');
            $table->string('rccm');
            $table->string('niu');
            $table->string('scien');
            $table->string('sciet');
            $table->string('nss');
            $table->string('autre_identifiant');
            $table->date('date_creation');
            $table->string('reference_texte_creation');
            $table->double('capital_social');
            $table->string('responsable_gerant');
            $table->integer('effectif');
            $table->boolean('filiale_multinationale');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('reseaux_sociaux');
            $table->date('date_entree_activite');
            $table->foreign('famille_juridique_id')
                ->references('id')->on('famille_juridiques')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('forme_juridique_id')
                ->references('id')->on('forme_juridiques')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('secteur_juridique_id')
                ->references('id')->on('secteur_juridiques')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('secteur_domaine_activite_id')
                ->references('id')->on('secteur_domaine_activites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('departement_secteur_ministeriel')
                ->references('id')->on('departement_secteur_ministeriels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('structure')
                ->references('id')->on('structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('categorie_structure_id')
                ->references('id')->on('categorie_structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_activite_id')
                ->references('id')->on('type_activites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_structure_id')
                ->references('id')->on('type_structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_structure_id')
                ->references('id')->on('situation_structures')
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
        Schema::dropIfExists('structures');
    }
}
