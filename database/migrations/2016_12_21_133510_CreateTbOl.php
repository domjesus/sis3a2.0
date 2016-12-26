<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->string('nome');
            $table->string('sigla')->nullable();
            $table->string('endereco')->nullable();
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
        Schema::drop('ols');
    }
}
