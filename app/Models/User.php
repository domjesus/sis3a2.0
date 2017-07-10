<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private $cpf;
    private $matricula;
    private $nome;
    private $nivel_acesso;
    private $id_ol;
    private $id_cargo;
    private $ativo;
 	
 	public function processo(){
 		return $this->hasMany('sis3a_oficial\Models\Processo');
 	}

 	public function nivel(){
      return $this->hasOne('sis3a_oficial\Models\Nivel_Acesso','id','nivel_acesso');
    }

    public function ol(){

        return $this->hasOne('sis3a_oficial\Models\Ol','id','id_ol');
    }

    public function cargo(){

        return $this->hasOne('sis3a_oficial\Models\Cargo','id','id_cargo');
    }

}
