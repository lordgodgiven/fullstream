<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePrestationDispenseesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_prestation_dispensees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->integer('annees_experience');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sous_categorie_id')
                ->references('id')->on('sous_categories')
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
        Schema::dropIfExists('type_prestation_dispensees');
    }
}