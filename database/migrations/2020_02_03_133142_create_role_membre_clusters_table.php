<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMembreClustersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_membre_clusters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_groupe_id');
            $table->date('date_attribution');
            $table->foreign('role_groupe_id')
                ->references('id')->on('role_groupes')
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
        Schema::dropIfExists('role_membre_clusters');
    }
}
