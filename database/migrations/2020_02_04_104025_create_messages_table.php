<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('compte_utilisateur_id');
            $table->unsignedBigInteger('type_recipiant_id');
            $table->unsignedBigInteger('statut_marquage_message_id');
            $table->unsignedBigInteger('priorite_id');
            $table->unsignedBigInteger('type_evenement_id');
            $table->string('objet');
            $table->string('objet_message');
            $table->date('date_message');
            $table->foreign('message_id')
                ->references('id')->on('messages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('compte_utilisateur_id')
                ->references('id')->on('compte_utilisateurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_recipiant_id')
                ->references('id')->on('type_recipiants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('statut_marquage_message_id')
                ->references('id')->on('statut_marquage_messages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('priorite_id')
                ->references('id')->on('priorites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_evenement_id')
                ->references('id')->on('type_evenements')
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
        Schema::dropIfExists('messages');
    }
}
