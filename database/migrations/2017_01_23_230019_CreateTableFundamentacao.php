<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFundamentacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundamentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('txt_fundamentacao');
            $table->boolean('abrangencia')->nullable(); 
            /*
             ABRANGENCIA: FUNDAMENTACAO GERAL=0, QUE USA PRA QUALQUER DESPACHO 
             OU LOCAL=1, QUE SE USA PRA DETERMINADOS CASOS SOMENTE.
            */
            $table->boolean('despacho');
            /*
             1 = concedido;
             0 = indeferido;
            */
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
        Schema::drop('fundamentacoes');
    }
}
