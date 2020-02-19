<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tdr_id');
            $table->unsignedBigInteger('type_a_t_id');
            $table->string('reference_contrat');
            $table->date('date_soumission');
            $table->date('date_signature_gestionnaire');
            $table->date('date_signature_prestataire');
            $table->date('date_enregistrement');
            $table->string('observation_gestionnaire');
            $table->foreign('tdr_id')
                ->references('id')->on('tdrs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_a_t_id')
                ->references('id')->on('type_a_t_s')
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
        Schema::dropIfExists('contrats');
    }
}
