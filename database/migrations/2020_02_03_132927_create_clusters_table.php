<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('famille_intervention_id');
            $table->unsignedBigInteger('sous_categorie_id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('structure_organisme_id');
            $table->integer('identifiant_prcceii');
            $table->string('nom');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('date_creation');
            $table->foreign('famille_intervention_id')
                ->references('id')->on('famille_interventions')
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
            $table->foreign('structure_organisme_id')
                ->references('id')->on('structure_organismes')
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
        Schema::dropIfExists('clusters');
    }
}
