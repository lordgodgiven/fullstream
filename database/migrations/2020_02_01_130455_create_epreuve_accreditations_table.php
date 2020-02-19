<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpreuveAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epreuve_accreditations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accreditation_id');
            $table->unsignedBigInteger('domaine_cert_technique_id');
            $table->unsignedBigInteger('type_epreuve_id');
            $table->unsignedBigInteger('appreciation_id');
            $table->date('date_enregistrement');
            $table->string('thematique');
            $table->integer('volume_horaire');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('note_finale');
            $table->string('observation_evaluateur');
            $table->string('observation_gestionnaire');
            $table->foreign('domaine_cert_technique_id')
                ->references('id')->on('domaine_cert_techniques')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_epreuve_id')
                ->references('id')->on('type_epreuves')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('appreciation_id')
                ->references('id')->on('appreciations')
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
        Schema::dropIfExists('epreuve_accreditations');
    }
}
