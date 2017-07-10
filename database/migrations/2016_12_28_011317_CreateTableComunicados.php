<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComunicados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_comunicado_tipo');
            $table->foreign('id_comunicado_tipo')->references('id')->on('comunicadostipos');
            $table->date('dt_comunicado');
            $table->string('destino');
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
        Schema::drop('comunicados');
    }
}
