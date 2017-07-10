<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProcuradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procuradores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('oab')->nullable();
            $table->string('nit')->nullable();
            $table->string('escritorio')->nullable();
            $table->string('telefone');
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('id_ol');
            $table->foreign('id_ol')->references('id')->on('ols');
            $table->string('id_user');
            $table->foreign('id_user')->references('id')->on('users');

            $table->smallinteger('ativo');            
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
        Schema::drop('procuradores');
    }
}
