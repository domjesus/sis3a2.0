<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    private $nome;
    private $id_comunicado_tipo;
    private $dt_comunicado;
    private $destino;
    private $id_ol;
    private $id_user;
    private $ativo;

    public function user(){
      return $this->hasOne('sis3a_oficial\Models\User','id','id_user');
    }

    public function ol(){
      return $this->hasOne('sis3a_oficial\Models\User','id','id_ol');
    }
    public function comunicado_tipo(){
      return $this->hasOne('sis3a_oficial\Models\comunicadostipos','id','id_comunicado_tipo');
    }

}
