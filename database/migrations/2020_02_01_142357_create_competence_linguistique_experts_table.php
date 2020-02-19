<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceLinguistiqueExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_lin_experts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('langue_id');
            $table->unsignedBigInteger('niveau_maitrise_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->foreign('langue_id')
                ->references('id')->on('langues')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('niveau_maitrise_id')
                ->references('id')->on('niveau_maitrises')
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
        Schema::dropIfExists('competence_linguistique_experts');
    }
}
