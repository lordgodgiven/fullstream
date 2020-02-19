<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestation_accreditations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->date('date_delivrance');
            $table->date('date_expiration');
            $table->float('duree');
            $table->string('autori_delivrance');
            $table->string('observation');
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
        Schema::dropIfExists('attestation_accreditations');
    }
}
