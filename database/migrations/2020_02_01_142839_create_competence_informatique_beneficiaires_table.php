<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceInformatiqueBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_info_beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_competence_info_id');
            $table->unsignedBigInteger('niveau_maitrise_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->foreign('type_competence_info_id')
                ->references('id')->on('type_competence_infos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('niveau_maitrise_id')
                ->references('id')->on('niveau_maitrises')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_beneficiaire_id')
                ->references('id')->on('dossier_beneficiaires')
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
        Schema::dropIfExists('competence_info_beneficiaires');
    }
}
