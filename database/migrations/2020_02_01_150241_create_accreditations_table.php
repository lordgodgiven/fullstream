<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('niveau_accreditation_id');
            $table->unsignedBigInteger('transition_accreditation_id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->unsignedBigInteger('visa_decision_id');
            $table->unsignedBigInteger('appreciation_id');
            $table->unsignedBigInteger('mention_id');
            $table->date('date_decision_accreditation');
            $table->string('observation');
            $table->foreign('niveau_accreditation_id')
                ->references('id')->on('niveau_accreditations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('transition_accreditation_id')
                ->references('id')->on('transition_accreditations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_prestataire_id')
                ->references('id')->on('dossier_prestataires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('visa_decision_id')
                ->references('id')->on('visa_decisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('appreciation_id')
                ->references('id')->on('appreciations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('mention_id')
                ->references('id')->on('mentions')
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
        Schema::dropIfExists('accreditations');
    }
}
