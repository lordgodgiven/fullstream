<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_document_id');
            $table->unsignedBigInteger('type_document_id');
            $table->unsignedBigInteger('nature_document_id');
            $table->unsignedBigInteger('langue_id');
            $table->string('titre');
            $table->string('objet_document');
            $table->string('description');
            $table->string('resume_document');
            $table->date('date_document');
            $table->string('version_document');
            $table->string('reference_document');
            $table->string('url_document');
            $table->date('date_modification');
            $table->date('date_creation');
            $table->foreign('model_document_id')
                ->references('id')->on('model_documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_document_id')
                ->references('id')->on('type_documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nature_document_id')
                ->references('id')->on('nature_documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('langue_id')
                ->references('id')->on('langues')
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
        Schema::dropIfExists('documents');
    }
}
