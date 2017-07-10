<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_processo');
            $table->foreign('id_processo')->references('id')->on('processos');
            $table->integer('id_procurador');
            $table->foreign('id_procurador')->references('id')->on('procuradores');
            $table->date('dt_carga');
            $table->date('dt_devolucao')->nullable();
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_ol');
            $table->foreign('id_ol')->references('id')->on('ols');
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
        Schema::drop('cargas');
    }
}
