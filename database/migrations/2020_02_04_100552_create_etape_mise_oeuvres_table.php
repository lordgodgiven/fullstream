<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapeMiseOeuvresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etape_mise_oeuvres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dossier_mise_oeuvre_id');
            $table->unsignedBigInteger('etat_mise_en_oeuvre_id');
            $table->unsignedBigInteger('phase_mise_en_oeuvre_id');
            $table->unsignedBigInteger('situation_a_i_id');
            $table->string('activite');
            $table->date('date_debut_prevue');
            $table->date('date_fin_prevue');
            $table->date('date_debut_reelle');
            $table->date('date_fin_reelle');
            $table->float('taux_progression');
            $table->date('date_creation');
            $table->date('date_modification');
            $table->string('observation');
            $table->foreign('dossier_mise_oeuvre_id')
                ->references('id')->on('dossier_mise_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etat_mise_en_oeuvre_id')
                ->references('id')->on('etat_mise_en_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('phase_mise_en_oeuvre_id')
                ->references('id')->on('phase_mise_en_oeuvres')
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
        Schema::dropIfExists('etape_mise_oeuvres');
    }
}
