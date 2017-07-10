<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class ComunicadoTipo extends Model
{
	protected $table = "comunicadostipos";
    private $nome;
    private $dt_comunicado;
    private $id_user;
    private $id_ol;
    private $ativo;

    public function tipo(){
      return $this->belongsTo('sis3a_oficial\Models\Comunicado','id','id_comunicado_tipo');
    }
}
