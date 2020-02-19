<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapeCircuitValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etape_circuit_validations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('circuit_validation_id');
            $table->unsignedBigInteger('role_acteur_id');
            $table->string('position');
            $table->foreign('circuit_validation_id')
                ->references('id')->on('circuit_validations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('role_acteur_id')
                ->references('id')->on('role_acteurs')
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
        Schema::dropIfExists('etape_circuit_validations');
    }
}
