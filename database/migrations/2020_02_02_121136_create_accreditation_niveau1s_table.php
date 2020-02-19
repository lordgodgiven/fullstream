<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationNiveau1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditation_niveau1s', function (Blueprint $table) {
            $table->unsignedBigInteger('accreditation_id');
            $table->unsignedBigInteger('etat_dossier_id');
            $table->integer('noteA');
            $table->integer('noteB');
            $table->integer('noteC');
            $table->integer('noteD');
            $table->integer('total');
            $table->integer('moyenne');
            $table->date('date_decisionn_accreditation');
            $table->string('observation');
            $table->foreign('accreditation_id')
                ->references('id')->on('accreditations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('etat_dossier_id')
                ->references('id')->on('etat_dossiers')
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
        Schema::dropIfExists('accreditation_niveau1s');
    }
}
