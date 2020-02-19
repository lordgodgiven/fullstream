<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visa_decision_id');
            $table->unsignedBigInteger('versement_id');
            $table->string('reference_programme');
            $table->string('reference_trd');
            $table->float('montant_honoraires');
            $table->float('montant_perdiem');
            $table->integer('nbre_jour_total');
            $table->string('titre_mission');
            $table->string('composante_sous_composante');
            $table->string('objet_mission');
            $table->string('prestation_demandees');
            $table->string('beneficiaires');
            $table->string('livrable_attendus');
            $table->string('lieu_execution');
            $table->date('date_demarrage');
            $table->date('date_debut_mision');
            $table->date('date_fin_mision');
            $table->date('duree_mission');
            $table->string('periode_deroulement');
            $table->date('date_limite_remise_livrable');
            $table->string('responsable_suivi');
            $table->float('montant_depense_accessoires');
            $table->string('profils_experts_competences_exigees');
            $table->date('date_soumission_tdr');
            $table->date('date_approbation_tdr_on');
            $table->date('date_approbation_tdr_due');
            $table->date('date_reception_vc_siege_agrer');
            $table->date('date_approbation_cv_on');
            $table->date('date_approbation_cv_due');
            $table->foreign('visa_decision_id')
                ->references('id')->on('visa_decisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('versement_id')
                ->references('id')->on('versements')
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
        Schema::dropIfExists('tdrs');
    }
}
