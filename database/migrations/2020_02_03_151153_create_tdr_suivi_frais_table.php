<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdrSuiviFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdr_suivi_frais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categorie_depense_accessoires_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->unsignedBigInteger('situation_a_i_id');
            $table->string('role_profil_expert');
            $table->float('cout_unitaire');
            $table->float('unites_prevus');
            $table->double('total_previsionnel');
            $table->float('unites_consommees');
            $table->string('observation');
            $table->foreign('categorie_depense_accessoires_id')
                ->references('id')->on('categorie_depense_accessoires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_prestataire_id')
                ->references('id')->on('dossier_prestataires')
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
        Schema::dropIfExists('tdr_suivi_frais');
    }
}
