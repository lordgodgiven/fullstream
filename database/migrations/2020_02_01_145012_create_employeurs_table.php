<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dossier_prestataire_id');
            $table->unsignedBigInteger('pays_nationalite_id');
            $table->unsignedBigInteger('type_employeur_id');
            $table->string('autre_structure');
            $table->integer('anciennete');
            $table->string('mission_principales');
            $table->foreign('dossier_prestataire_id')
                ->references('id')->on('dossier_prestataires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('pays_nationalite_id')
                ->references('id')->on('pays_nationalites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_employeur_id')
                ->references('id')->on('type_employeurs')
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
        Schema::dropIfExists('employeurs');
    }
}
