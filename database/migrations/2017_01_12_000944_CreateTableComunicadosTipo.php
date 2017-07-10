<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComunicadosTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicadostipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('id_ol');
            $table->foreign('id_ol')->references('id')->on('ols');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->boolean('ativo');
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
        Schema::drop('comunicadostipo');
    }
}
