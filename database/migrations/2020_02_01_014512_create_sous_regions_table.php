<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('continent_id');
            $table->string('code');
            $table->string('designation');
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
        Schema::dropIfExists('sous_regions');
    }
}
