<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierPrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_prestataires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('individu_id');
            $table->unsignedBigInteger('compte_utilisateur_id');
            $table->unsignedBigInteger('disponibilite_id');
            $table->unsignedBigInteger('zone_intervention_id');
            $table->unsignedBigInteger('type_expert_id');
            $table->unsignedBigInteger('situation_id');
            $table->string('identifiant_roster_prcceii');
            $table->string('naema');
            $table->string('nopema');
            $table->string('motivation');
            $table->foreign('individu_id')
                ->references('id')->on('individus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('compte_utilisateur_id')
                ->references('id')->on('compte_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('disponibilite_id')
                ->references('id')->on('disponibilites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('zone_intervention_id')
                ->references('id')->on('zone_interventions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_expert_id')
                ->references('id')->on('type_experts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_id')
                ->references('id')->on('situations')
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
        Schema::dropIfExists('dossier_prestataires');
    }
}
