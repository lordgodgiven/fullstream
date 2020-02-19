<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommuneVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commune_villes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('pays_nationalite_id');
            $table->integer('codeISO3166-2');
            $table->string('designation');
            $table->foreign('departement_id')
                ->references('id')->on('departements')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pays_nationalite_id')
                ->references('id')->on('pays_nationalites')
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
        Schema::dropIfExists('commune_villes');
    }
}
