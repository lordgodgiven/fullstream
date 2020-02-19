<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dossier_mise_oeuvre_id');
            $table->date('date_soumission');
            $table->string('observation');
            $table->integer('visa_beneficiaire');
            $table->date('date_approbation_beneficiaire');
            $table->integer('visa_on');
            $table->date('date_approbation_on');
            $table->integer('visa_due');
            $table->date('date_approbation_due');
            $table->foreign('dossier_mise_oeuvre_id')
                ->references('id')->on('dossier_mise_oeuvres')
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
        Schema::dropIfExists('rapports');
    }
}
