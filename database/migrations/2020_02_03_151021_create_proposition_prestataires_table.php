<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositionPrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposition_prestataires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tdr_id');
            $table->date('date_soumission');
            $table->string('observation');
            $table->foreign('tdr_id')
                ->references('id')->on('tdrs')
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
        Schema::dropIfExists('proposition_prestataires');
    }
}
