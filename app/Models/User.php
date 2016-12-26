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
 	
 	public function processo(){
 		return $this->hasMany('app\Models\Processo');
 	}   
}
