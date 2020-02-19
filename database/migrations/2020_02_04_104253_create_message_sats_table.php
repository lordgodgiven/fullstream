<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageSatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_sats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compte_utilisateur_id');
            $table->unsignedBigInteger('type_message_sat_id');
            $table->unsignedBigInteger('priorite_id');
            $table->unsignedBigInteger('statut_message_sat_id');
            $table->integer('numero_ticket');
            $table->date('date_envoi');
            $table->string('objet');
            $table->string('corps_message_sat');
            $table->date('date_traitement');
            $table->foreign('compte_utilisateur_id')
                ->references('id')->on('compte_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_message_sat_id')
                ->references('id')->on('type_message_sats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('priorite_id')
                ->references('id')->on('priorites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('statut_message_sat_id')
                ->references('id')->on('statut_message_sats')
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
        Schema::dropIfExists('message_sats');
    }
}
