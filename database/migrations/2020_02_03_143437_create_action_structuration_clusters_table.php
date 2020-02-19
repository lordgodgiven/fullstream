<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionStructurationClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_structuration_clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('phase_mise_en_oeuvre_id');
            $table->unsignedBigInteger('type_action_structure_id');
            $table->string('ref_trd');
            $table->date('date_debut_prevue');
            $table->date('date_fin_prevue');
            $table->integer('duree_homme_jour_prevue');
            $table->integer('duree_homme_jour_realisee');
            $table->string('etape');
            $table->string('activite');
            $table->date('date_debut_fin_effective');
            $table->date('date_fin_effective');
            $table->string('lieu_execution');
            $table->float('taux_progression');
            $table->string('observation');
            $table->foreign('cluster_id')
                ->references('id')->on('clusters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('phase_mise_en_oeuvre_id')
                ->references('id')->on('phase_mise_en_oeuvres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_action_structure_id')
                ->references('id')->on('type_action_structures')
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
        Schema::dropIfExists('action_structure_clusters');
    }
}
