<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    private $id_processo;
    private $id_procurador;
    private $id_user;
    private $id_ol;
    private $ativo;
    private $dt_carga;


    public function procurador(){

        return $this->hasOne('sis3a_oficial\Models\Procurador','id','id_procurador');
    }

    public function processo(){
    	return $this->hasOne('sis3a_oficial\Models\Processo','id','id_processo');
    }

    public function ol(){
      return $this->hasOne('sis3a_oficial\Models\Ol','id','id_ol');
    }
    
    public function user(){
      return $this->hasOne('sis3a_oficial\Models\User','id','id_user');
    }


}
