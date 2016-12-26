<?php

namespace sis3a_oficial\Models;

use Illuminate\Database\Eloquent\Model;

class Procurador extends Model
{
    protected $table = "procuradores";
    private $nome;
    private $oab;
    private $nit;
    private $escritorio;
    private $telefone;
    private $celular;
    private $email;
    private $id_ol;
    private $id_servidor;
    private $ativo;
}
