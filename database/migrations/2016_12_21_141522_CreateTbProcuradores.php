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
            $table->string('oab')->unique()->nullable();
            $table->string('nit')->unique()->nullable();
            $table->string('escritorio')->nullable();
            $table->string('telefone');
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('id_ol');
            $table->string('id_servidor');
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
