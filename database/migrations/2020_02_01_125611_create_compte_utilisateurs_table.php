<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_compte_id');
            $table->unsignedBigInteger('profil_utilisateur_id')->nullable();
            $table->unsignedBigInteger('civilite_id');
            $table->unsignedBigInteger('genre_sexe_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('login');
            $table->string('password');
            $table->string('email');
            $table->string('question_securite');
            $table->string('reponse_question_securite');
            $table->boolean('non_fonction_publique')->default(0);
            $table->boolean('accord_usage_donnees')->default(0);
            $table->boolean('accord_reception_info')->default(0);
            $table->foreign('type_compte_id')
                ->references('id')->on('type_comptes')
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
        Schema::dropIfExists('compter_utilisateurs');
    }
}
