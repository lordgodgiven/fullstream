<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilCompteUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_compte_utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compte_utilisateur_id');
            $table->unsignedBigInteger('profil_utilisateur_id');
            $table->string('code');
            $table->string('libelle');
            $table->string('description');
            $table->foreign('compte_utilisateur_id')
                ->references('id')->on('compte_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('profil_utilisateur_id')
                ->references('id')->on('profil_utilisateurs')
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
        Schema::dropIfExists('profil_compte_utilisateurs');
    }
}
