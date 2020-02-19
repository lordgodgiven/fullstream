<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroitHabilitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droit_habilitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profil_utilisateur_id');
            $table->unsignedBigInteger('droit_id');
            $table->unsignedBigInteger('fonctionnalite_id');
            $table->foreign('profil_utilisateur_id')
                ->references('id')->on('profil_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('droit_id')
                ->references('id')->on('droits')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('fonctionnalite_id')
                ->references('id')->on('fonctionnalites')
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
        Schema::dropIfExists('droit_habilitations');
    }
}
