<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf')->unique()->nullable();
            $table->string('matricula')->unique();
            $table->string('nome');
            $table->string('passwd');
            $table->integer('nivel_acesso');
            $table->foreign('nivel_acesso')->references('id')->on('nivel_acessos');
            $table->string('id_ol');
            $table->foreign('id_ol')->references('id')->on('ols');
            $table->string('id_cargo');
            $table->foreign('id_cargo')->references('id')->on('cargos');
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
        Schema::drop('users');
    }
}
