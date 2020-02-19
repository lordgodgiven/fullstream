<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationNiveau3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditation_niveau3s', function (Blueprint $table) {
            $table->unsignedBigInteger('accreditation_id');
            $table->unsignedBigInteger('type_audit_id');
            $table->boolean('audit');
            $table->float('note_audit');
            $table->float('moyenne');
            $table->foreign('accreditation_id')
                ->references('id')->on('accreditations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_audit_id')
                ->references('id')->on('type_audits')
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
        Schema::dropIfExists('accreditation_niveau3s');
    }
}
