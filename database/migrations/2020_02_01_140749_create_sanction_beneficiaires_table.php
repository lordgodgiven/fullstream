<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_sanction_id');
            $table->unsignedBigInteger('motif_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->date('date');
            $table->string('observation');
            $table->foreign('type_sanction_id')
                ->references('id')->on('type_sanctions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('motif_id')
                ->references('id')->on('motifs')
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
        Schema::dropIfExists('sanction_beneficiaires');
    }
}
