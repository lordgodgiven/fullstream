<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEligibiliteOffrePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eligibilite_offre_prestations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visa_decision_id');
            $table->unsignedBigInteger('appreciation_id');
            $table->date('date_validation');
            $table->date('date_validite');
            $table->string('observation');
            $table->foreign('visa_decision_id')
                ->references('id')->on('visa_decisions')
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
        Schema::dropIfExists('eligibilite_offre_prestations');
    }
}
