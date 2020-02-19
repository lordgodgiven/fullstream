<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoixApprobationPrestataireCesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choix_approbation_prestataire_ces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trd_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->date('date_approbation_prestataire_on');
            $table->date('date_approbation_prestataire_due');
            $table->string('observation');
            $table->foreign('trd_id')
                ->references('id')->on('tdrs')
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
        Schema::dropIfExists('choix_approbaton_prestataire_ces');
    }
}
