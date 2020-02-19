<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pays_nationalite_id');
            $table->unsignedBigInteger('niveau_qualification_id');
            $table->unsignedBigInteger('civilite_id');
            $table->unsignedBigInteger('genre_sexe_id');
            $table->unsignedBigInteger('situation_familliale_id');
            $table->string('identifiant_prcceii');
            $table->string('niu');
            $table->string('nss');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('photo');
            $table->foreign('pays_nationalite_id')
                ->references('id')->on('pays_nationalites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('niveau_qualification_id')
                ->references('id')->on('niveau_qualifications')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('civilite_id')
                ->references('id')->on('civilites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('genre_sexe_id')
                ->references('id')->on('genre_sexes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_familliale_id')
                ->references('id')->on('situation_familliales')
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
        Schema::dropIfExists('individus');
    }
}
