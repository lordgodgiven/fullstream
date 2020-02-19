<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionCircuitValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_circuit_validations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_decision_id');
            $table->unsignedBigInteger('appreciation_id');
            $table->date('date_avis_decison');
            $table->string('observation');
            $table->foreign('type_decision_id')
                ->references('id')->on('type_decisions')
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
        Schema::dropIfExists('decision_circuit_validations');
    }
}
