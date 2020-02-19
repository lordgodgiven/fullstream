<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_compte_id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('login');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->unique();
            $table->rememberToken();
            $table->foreign('type_compte_id')
                ->references('id')->on('type_comptes')
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
        Schema::dropIfExists('users');
    }
}
