<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdrSuiviActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdr_suivi_activites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('phase_mise_en_oeuvre_id');
            $table->unsignedBigInteger('nature_activite_id');
            $table->unsignedBigInteger('situation_a_i_id');
            $table->string('etape_mise_oeuvre');
            $table->date('date_debut_prevue');
            $table->date('date_fin_prevue');
            $table->date('date_debut_reelle');
            $table->date('date_fin_reelle');
            $table->float('nbre_homme_jour');
            $table->string('observation');
            $table->foreign('phase_mise_en_oeuvre_id')
                ->references('id')->on('phase_mise_en_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nature_activite_id')
                ->references('id')->on('nature_activites')
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
        Schema::dropIfExists('tdr_suivi_activites');
    }
}
