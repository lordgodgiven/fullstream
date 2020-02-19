<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysNationalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays_nationalites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sous_region_id');
            $table->unsignedBigInteger('continent_id');
            $table->string('designation');
            $table->string('codeISO3166-1');
            $table->foreign('sous_region_id')
                ->references('id')->on('sous_regions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('continent_id')
                ->references('id')->on('continents')
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
        Schema::dropIfExists('pays_nationalites');
    }
}
