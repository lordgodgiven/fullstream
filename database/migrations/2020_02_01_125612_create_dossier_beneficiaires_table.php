<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('secteur_juridique_id');
            $table->unsignedBigInteger('compte_utilisateur_id');
            $table->unsignedBigInteger('activite_principale_id');
            $table->unsignedBigInteger('situation_structure_id');
            $table->unsignedBigInteger('pays_nationalite_id');
            $table->unsignedBigInteger('commune_ville_id');
            $table->unsignedBigInteger('arrondissement_id');
            $table->unsignedBigInteger('quartier_id');
            $table->string('naema');
            $table->string('nopma');
            $table->string('denomination_raison_sociale');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sigle_abbreviation');
            $table->string('rccm');
            $table->string('niu');
            $table->string('scien');
            $table->string('sciet');
            $table->string('nss');
            $table->string('autre_identifiant');
            $table->string('activite_secondaire');
            $table->string('date_creation');
            $table->string('capitale_sociale');
            $table->string('gerant_responsable');
            $table->string('presentation_generale');
            $table->string('nombre_employes');
            $table->string('structure_mere');
            $table->boolean('filiale_multinationale');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('site_web');
            $table->string('reseaux_sociaux');
            $table->string('motivations');
            $table->foreign('secteur_juridique_id')
                ->references('id')->on('secteur_juridiques')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('compte_utilisateur_id')
                ->references('id')->on('compte_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('activite_principale_id')
                ->references('id')->on('activite_principales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_structure_id')
                ->references('id')->on('situation_structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pays_nationalite_id')
                ->references('id')->on('pays_nationalites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('commune_ville_id')
                ->references('id')->on('commune_villes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('arrondissement_id')
                ->references('id')->on('arrondissements')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('quartier_id')
                ->references('id')->on('quartiers')
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
        Schema::dropIfExists('dossier_beneficiaires');
    }
}
