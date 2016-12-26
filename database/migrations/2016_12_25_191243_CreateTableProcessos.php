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
            $table->integer('id_especie');
            $table->string('nb');            
            $table->string('nome');            
            $table->date('dt_der');
            $table->date('dt_dhb');
            $table->integer('id_procurador');
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
            $table->integer('id_status_p04')->nullable();
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
            $table->integer('id_conclusao_pericia')->nullable();
            $table->date('dt_dcb')->nullable();
            $table->text('observacoes_p04')->nullable();
            
            /**
            processos do mob devem ter estes campos
            */
            $table->string('origem')->nullable();
            $table->string('local')->nullable();
            $table->char('cmd_sipps',9)->nullable();
            $table->integer('id_status_mob')->nullable();            
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
            $table->boolean('siafi')->nullable();
            $table->string('siafi_txt')->nullable();
            $table->boolean('cadin')->nullable();
            $table->string('cadin_txt')->nullable();
            $table->boolean('demanda_sobrestada')->nullable();
            $table->string('sobrestamento_motivo')->nullable();
            $table->date('dt_sobrestamento')->nullable();
            $table->integer('sobrestamento_prazo')->nullable();
            $table->boolean('edital')->nullable();
            $table->date('dt_edital')->nullable();
            $table->boolean('quitada')->nullable();
            $table->string('quitada_obs')->nullable();
            $table->boolean('parcelado')->nullable();
            $table->integer('qtde_parcelas')->nullable();
            $table->string('parcelado_obs')->nullable();
            $table->date('dt_parcelamento')->nullable();
            $table->date('dt_quitacao_1a_guia')->nullable();
            $table->boolean('demanda_concluisa')->nullable();
            
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('ol_id');
            $table->foreign('ol_id')->references('id')->on('ols');
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
