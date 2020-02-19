<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierMiseOeuvresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_mise_oeuvres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contrat_id');
            $table->unsignedBigInteger('etat_mise_en_oeuvre_id');
            $table->unsignedBigInteger('situation_a_i_id');
            $table->string('intitule_prestation');
            $table->string('description');
            $table->date('date_debut_prevue');
            $table->date('date_fin_prevue');
            $table->date('date_debut_reelle');
            $table->date('date_fin_reelle');
            $table->string('observation');
            $table->string('taux_progression');
            $table->foreign('contrat_id')
                ->references('id')->on('contrats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etat_mise_en_oeuvre_id')
                ->references('id')->on('etat_mise_en_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_a_i_id')
                ->references('id')->on('situation_a_i_s')
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
        Schema::dropIfExists('dossier_mise_oeuvres');
    }
}
