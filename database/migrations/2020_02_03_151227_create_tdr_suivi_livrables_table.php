<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdrSuiviLivrablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdr_suivi_livrables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_livrable_id');
            $table->unsignedBigInteger('situation_valid_visa_decision_id');
            $table->unsignedBigInteger('situation_a_i_id');
            $table->string('titre');
            $table->date('date_limite_previsionnelle_soumission');
            $table->date('date_effective_soumission');
            $table->date('date_validation');
            $table->string('observation');
            $table->foreign('type_livrable_id')
                ->references('id')->on('type_livrables')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_valid_visa_decision_id')
                ->references('id')->on('situation_valid_visa_decisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_a_i_id')
                ->references('id')->on('situation_a_i_s')
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
        Schema::dropIfExists('tdr_suivi_livrables');
    }
}
