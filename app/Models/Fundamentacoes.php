<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Fundamentacoes extends Model
{
    protected $table = 'fundamentacoes';
    private $nome;
    private $txt_fundamentacao;
    private $abrangencia;
    private $despacho;

    private $id_ol;
    private $id_user;
    private $ativo;

    public function user(){
      return $this->hasOne('sis3a_oficial\Models\User','id','id_user');
    }

    public function ol(){
      return $this->hasOne('sis3a_oficial\Models\User','id','id_ol');
    }
    
}
