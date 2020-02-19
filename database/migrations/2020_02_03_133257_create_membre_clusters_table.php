<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembreClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre_clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_groupe_id');
            $table->unsignedBigInteger('situation_instance_id');
            $table->unsignedBigInteger('dossier_beneficiaire_id');
            $table->unsignedBigInteger('cluster_id');
            $table->unsignedBigInteger('role_membre_cluster_id');
            $table->date('date_adhesion');
            $table->integer('role_cluster');
            $table->foreign('role_groupe_id')
                ->references('id')->on('role_groupes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('situation_instance_id')
                ->references('id')->on('situation_instances')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dossier_beneficiaire_id')
                ->references('id')->on('dossier_beneficiaires')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cluster_id')
                ->references('id')->on('clusters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('role_membre_cluster_id')
                ->references('id')->on('role_membre_clusters')
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
        Schema::dropIfExists('membre_clusters');
    }
}
