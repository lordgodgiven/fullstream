<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignePropositionPrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_proposition_prestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proposition_prestataire_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->boolean('preference_beneficiaire')->default(false);
            $table->string('observation');
            $table->foreign('proposition_prestataire_id')
                ->references('id')->on('proposition_prestataires')
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
        Schema::dropIfExists('ligne_proposition_prestataires');
    }
}
