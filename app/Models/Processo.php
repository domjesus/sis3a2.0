<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    private $id_tipo;
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
    
    private $user_id;
    private $ol_id;
    private $ativo;

    public function user(){

        return $this->hasOne('sis3a_oficial\Models\User','id','user_id');
    }
}
