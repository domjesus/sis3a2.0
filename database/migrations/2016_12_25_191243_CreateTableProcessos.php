<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProcessos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            /**
            todos os processos devem ter estes campos
            ***/
            $table->increments('id');
            $table->integer('id_tipo_processo');
            $table->foreign('id_tipo_processo')->references('id')->on('tipo_processos');
            $table->integer('id_especie');
            $table->foreign('id_especie')->references('id')->on('especies');
            $table->string('nb');            
            $table->string('nome');            
            $table->date('dt_der');
            $table->date('dt_dhb');
            $table->integer('id_procurador');
            $table->foreign('id_procurador')->references('id')->on('procuradores');
            $table->text('status')->nullable();
            $table->boolean('exigencia')->nullable();          
            $table->boolean('exigencia_cumprida')->nullable();          
            $table->boolean('ppp')->nullable();
            $table->boolean('rural')->nullable();
            $table->boolean('saiu_aps')->nullable();          
            
            //processos da portaria 04 devera ter
            //estes campos
            $table->string('end_rua')->nullable();            
            $table->string('end_numero')->nullable();
            $table->string('end_bairro')->nullable();
            $table->string('end_cidade')->nullable();
            $table->string('end_uf')->nullable();                                                
            $table->string('end_cep')->nullable();
            $table->integer('p04status_id')->nullable();
            $table->foreign('p04status_id')->references('id')->on('p04status');
            $table->date('dt_nascimento')->nullable();
            $table->date('dt_ddb')->nullable();
            $table->boolean('prioridade')->nullable();
            $table->boolean('pode_cessar_adm')->nullable();            
            $table->date('dt_pode_cessar_adm')->nullable();
            $table->boolean('tr_julgado')->nullable();
            $table->date('dt_permite_rev')->nullable();
            $table->date('dt_convocacao')->nullable();
            $table->string('codigo_ar')->nullable();
            $table->date('dt_ciencia')->nullable();
            $table->date('dt_pericia')->nullable();
            $table->time('hora_pericia')->nullable();
            $table->integer('id_medico')->nullable();            
            $table->integer('p04concpericia_id')->nullable();
            $table->foreign('p04concpericia_id')->references('id')->on('p04concpericia');
            $table->date('dt_dcb')->nullable();
            $table->text('observacoes_p04')->nullable();
            
            /**
            processos do mob devem ter estes campos
            */
            $table->string('origem')->nullable();
            $table->string('local')->nullable();
            $table->char('cmd_sipps',9)->nullable();
            $table->integer('mobstatus_id')->nullable();            
            $table->foreign('mobstatus_id')->references('id')->on('mobstatus');
            $table->string('resumo')->nullable();
            $table->date('dt_ult_prov')->nullable();
            $table->string('resumo_ult_prov')->nullable();
            $table->date('dt_ciencia_prox_tarefa')->nullable();
            $table->integer('prazo_nova_prov')->nullable();
            $table->string('despacho_proxima_tarefa')->nullable();
            $table->boolean('digitalizado')->nullable();
            $table->date('dt_digitalizado')->nullable();
            $table->boolean('apenso')->nullable();
            $table->string('nb_apenso')->nullable();
            $table->boolean('sicau')->nullable();
            $table->boolean('sicalc')->nullable();
            $table->boolean('siafi')->nullable();
            $table->string('siafi_txt')->nullable();
            $table->boolean('cadin')->nullable();
            $table->string('cadin_txt')->nullable();
            $table->boolean('demanda_sobrestada')->nullable();
            $table->string('sobrestado_motivo')->nullable();
            $table->date('dt_sobrestado')->nullable();
            $table->integer('sobrestado_prazo')->nullable();
            $table->boolean('edital')->nullable();
            $table->date('dt_edital')->nullable();
            $table->boolean('quitada')->nullable();
            $table->string('quitada_obs')->nullable();
            $table->boolean('parcelado')->nullable();
            $table->integer('qtde_parcelas')->nullable();
            $table->string('parcelado_obs')->nullable();
            $table->date('dt_parcelamento')->nullable();
            $table->date('dt_quitacao_1a_guia')->nullable();
            $table->boolean('demanda_concluida')->nullable();
            
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
        Schema::drop('processos');
    }
}
