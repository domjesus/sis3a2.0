<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Ol extends Model
{
    private $numero;
    private $nome;
    private $sigla;
    private $endereco;

    public function users(){
 		return $this->hasMany('sis3a_oficial\Models\User','id','id_ol');
 	}

}
