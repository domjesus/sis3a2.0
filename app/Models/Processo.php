<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    private $id_tipo_processo;
    private $id_especie;
    private $nb;
    private $nome;
    private $dt_der;
    private $dt_dhb;
    private $id_procurador;
    private $status;
    private $exigencia;
    private $exigencia_cumprida;
    private $ppp;
    private $rural;
    private $saiu_aps;

    private $end_rua;
    private $end_numero;
    private $end_bairro;
    private $end_cidade;
    private $end_uf;
    private $end_cep;
    private $id_status_p04;
    private $dt_nascimento;
    private $dt_ddb;
    private $prioridade;
	private $pode_cessar_adm;
	private $dt_pode_cessar_adm;
	private $tr_julgado;
	private $dt_permite_rev;
	private $dt_convocacao;
	private $codigo_ar;
	private $dt_ciencia;
	private $dt_pericia;
	private $hora_pericia;
	private $id_medico;
	private $id_conclusao_pericia;
	private $dt_dcb;
	private $observacoes_p04;

    private $origem;
    private $local;
    private $cmd_sipps;
    private $mobstatus_id;
    private $resumo;
    private $dt_ult_prov;
    private $resumo_ult_prov;
    private $dt_ciencia_prox_tarefa;
    private $prazo_nova_prov;
    private $despacho_proxima_tarefa;
    private $digitalizado;
    private $dt_digitalizado;
    private $apenso;
    private $nb_apenso;
    private $sicau;
    private $siafi;
    private $siafi_txt;
    private $cadin;
    private $cadin_txt;
    private $demanda_sobrestada;
    private $sobrestamento_motivo;
    private $dt_sobrestamento;
    private $sobrestamento_prazo;
    private $edital;
    private $dt_edital;
    private $quitada;
    private $quitada_obs;
    private $parcelado;
    private $qtde_parcelas;
    private $parcelado_obs;
    private $dt_parcelamento;
    private $dt_quitacao_1a_guia;
    private $demanda_concluisa;


    
    private $id_user;
    private $id_ol;
    private $ativo;

    public function __construct(){
        //$this->ol_id = session('ol_id');
        //$this->user_id = session('user_id');
        //$this->ativo = 1;
    }

    public function user(){

        return $this->hasOne('sis3a_oficial\Models\User','id','id_user');
    }

    public function ol(){

        return $this->hasOne('sis3a_oficial\Models\Ol','id','id_ol');
    }

    public function tipo_processo(){
     return $this->hasOne('sis3a_oficial\Models\Tipo_processo','id','id_tipo_processo');   
    }

    public function especie(){
     return $this->hasOne('sis3a_oficial\Models\Especie','id','id_especie');   
    }

    public function procurador(){

        return $this->hasOne('sis3a_oficial\Models\Procurador','id','id_procurador');
    }

}
